<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\User;

class UserController extends Controller
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
     * 生産者一覧
     */
    public function index()
    {
        // 生産者一覧取得
        $users = \DB::table('users')->get();

        return view('user.index', compact('users'));
    }

    /**
     * 生産者登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'producer' => 'required|max:100',
            ],
                [
                    'producer.required' => '名前を入力してください。'
                ]);

            // 生産者登録
            $user = User::where('id','=',Auth::id())->first();
    
            $user->producer = $request->producer;
            $user->area_1 = $request->area_1;
            $user->area_2 = $request->area_2;
            $user->area_3 = $request->area_3;
            $user->area_4 = $request->area_4;
            $user->comment = $request->comment;
            $user->save();

            return redirect('/users');
        }
        $user = $request->user();
        return view('user.add',[ 'user' => $user ]);

    }

    public function item(Request $request){

        $items = Item::where('user_id','=',$request->user_id)->first();

        return view('user.item')->with([
            'item' => $items
        ]);
    }
}