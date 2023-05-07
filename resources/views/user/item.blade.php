@extends('adminlte::page')

@section('title', '商品管理')

@section('content_header')
    <h1>商品管理</h1>
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
                    <h3 class="card-title">商品管理</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>名前</th>
                                <th>販売価格</th>
                                <th>収穫日</th>
                                <th>生産地</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td><a href="{{url('/items/edit/'.$item->id)}}">{{ $item->name }}{{$item->count }}個</a></td>
                                    <td>{{ $item->price }}円</td>
                                    <td>{{ $item->hervest_day }}</td>
                                    <td>{{ $item->area }}</td>
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