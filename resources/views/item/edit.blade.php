@extends('adminlte::page')

@section('title', '商品編集')

@section('content_header')
    <h1>商品編集</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
                <form method="POST" action="/items/update">
                @csrf
                <input type="hidden" name="id" value="{{$item->id}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$item->name}}">
                        </div>

                        <div class="form-group">
                            <label for="count">1袋あたりの個数</label>
                            <input type="number" min=1 class="form-control" id="count" name="count" value="{{$item->count}}">
                        </div>

                        <div class="form-group">
                            <label for="price">販売価格</label>
                            <input type="number" min=0 step=10 class="form-control" id="price" name="price" value="{{$item->price}}">

                        <div class="form-group">
                            <label for="hervest_day">購入日</label>
                            <input type="date" class="form-control" id="hervest_day" name="hervest_day" value="{{$item->hervest_day}}">

                        <div class="form-group">
                            <label for="area">購入場所</label>
                            <input type="area" class="form-control" id="area" name="area" value="{{$item->area}}">
                        </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">更新</button>
                    </div>
                </form>
                <form onsubmit="return confirm('本当に削除しますか？')" class="card-footer" action="/items/delete" method="get">
                @csrf
                    <button type="submit" class="btn btn-secondary">削除</button>
                    <input type="hidden" name="id" value="{{$item->id}}">
                </form>
                </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop