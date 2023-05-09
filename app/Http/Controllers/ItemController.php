<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index(Request $request)
    {
        // 商品一覧取得
        $keyword = $request->input('keyword');

        $query = Item::query();

        if(!empty($keyword)) {
            $query->where('name','LIKE',"%{$keyword}%")
                ->orwhere('price','LIKE',"%{$keyword}%");
        }

        $items = $query->get();

        return view('item.index', compact('items','keyword'));
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
                'buy_day' => 'required',
                'shop' => 'required',
            ],
                [
                    'name.required' => '名前を入力してください。',
                    'buy_day.required' => '収穫日を入力してください。',
                    'shop.required' => '生産地を入力してください。',
                ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'count' => $request->count,
                'price' => $request->price,
                'buy_day' => $request->buy_day,
                'shop' => $request->shop,
            ]);

            return redirect('/users/item/' . Auth::user()->id);
        }

        return view('item.add');
    }

    // 商品編集画面の表示
    public function edit(Request $request){

        $items = Item::where('id','=',$request->id)->first();

        return view('item.edit')->with([
            'item' => $items
        ]);
    }

        // 編集を保存して一覧画面へ
        public function update(Request $request){
            $items = Item::where('id','=',$request->id)->first();
        
            $items->name = $request->name;
            //$items->user_id = Auth::user()->id;
            $items->name = $request->name;
            $items->count = $request->count;
            $items->price = $request->price;
            $items->buy_day = $request->buy_day;
            $items->shop = $request->shop;
            $items->save();
    
            return redirect('/users/item/' . Auth::user()->id);
        }
    
        // データを削除する
        public function delete(Request $request){
    
            $items = Item::where('id','=',$request->id)->first();
            $items->delete();
    
            return redirect('/users/item/'. Auth::user()->id);
        }
}