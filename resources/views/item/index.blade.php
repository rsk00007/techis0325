@extends('adminlte::page')

@section('title', '購入履歴')

@section('content_header')
    <h1>購入履歴</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
        <div class="card">
            <form action="{{route('search.index')}}" method="GET">
                <div class="card-body">
                    <div class="form-group">
                        <label for="search">検索</label>
                        <div class="input-group">
                            <input type="search" class="form-control" id="search" name="keyword" placeholder="キーワード検索" value="@if (isset($keyword)) {{ $keyword }} @endif">
                            <button type="submit" class="btn btn-primary">検索</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="card">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品一覧</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>名前</th>
                                <th>販売価格</th>
                                <th>購入日</th>
                                <th>購入場所</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->name }}{{$item->count }}個</td>
                                    <td>{{ $item->price }}円</td>
                                    <td>{{ $item->buy_day }}</td>
                                    <td>{{ $item->shop }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop