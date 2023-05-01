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
    public function index()
    {
        // 商品一覧取得
        $items = Item::orderBy('id')->get();

        return view('item.index', compact('items'));
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
            ],
                [
                    'name.required' => '名前を入力してください。'
                ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'count' => $request->count,
                'price' => $request->price,
                'hervest_day' => $request->hervest_day,
                'area' => $request->area,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }

    public function edit(Request $request){

        $items = Item::where('id','=',$request->id)->first();

        return view('item.edit')->with([
            'item' => $items
        ]);
    }
}
