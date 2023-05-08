@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>商品登録</h1>
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
                <form method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="名前">
                        </div>

                        <div class="form-group">
                            <label for="count">1袋あたりの個数</label>
                            <input type="number" min=1 class="form-control" id="count" name="count" value="1">
                        </div>

                        <div class="form-group">
                            <label for="price">販売価格</label>
                            <input type="number" min=0 step=10 class="form-control" id="price" name="price" value=100>
                        </div>

                        <div class="form-group">
                            <label for="hervest_day">購入日</label>
                            <input type="date" class="form-control" id="hervest_day" name="hervest_day" value="<?php echo date('Y-m-j');?>">
                        </div>

                        <div class="form-group">
                            <label for="area">購入場所</label>
                            <input type="area" class="form-control" id="area" name="area" placeholder="">
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop