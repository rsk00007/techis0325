@extends('adminlte::page')

@section('title', 'わたしのつぶやき')

@section('content_header')
    <h1>私のつぶやき</h1>
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
                <form method="POST" action="/users/add">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="producer">名前</label>
                            <input type="text" class="form-control" id="producer" name="producer" placeholder="名前" value="{{$user->producer}}">
                        </div>
                        <div class="form-group">
                            <label for="area_1">今日の予定</label>
                            <input type="text" class="form-control" id="area_1" name="area_1" placeholder="主な生産地" value="{{$user->area_1}}">
                        </div>
                        <div class="form-group">
                            <label for="comment">お願いごと</label>
                            <textarea name="comment" class="form-control">{{$user->comment}}</textarea>
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