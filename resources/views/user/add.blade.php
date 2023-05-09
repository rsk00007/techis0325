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
                            <label for="nickname">名前</label>
                            <input type="text" class="form-control" id="nickname" name="nickname" placeholder="名前" value="{{$user->nickname}}">
                        </div>
                        <div class="form-group">
                            <label for="schedule">今日の予定</label>
                            <input type="text" class="form-control" id="schedule" name="schedule" placeholder="今日の予定" value="{{$user->schedule}}">
                        </div>
                        <div class="form-group">
                            <label for="comment">ひとこと</label>
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