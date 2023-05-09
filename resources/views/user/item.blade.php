@extends('adminlte::page')

@section('title', '冷蔵庫管理')

@section('content_header')
    <h1>冷蔵庫管理</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">冷蔵庫の中</h3>
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
                                <th>購入日</th>
                                <th>購入場所</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td><a href="{{url('/items/edit/'.$item->id)}}">{{ $item->name }}{{$item->count }}個</a></td>
                                    <td>{{ $item->price }}円</td>
                                    <td>{{ $item->buy_day }}</td>
                                    <td>{{ $item->shop}}</td>
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