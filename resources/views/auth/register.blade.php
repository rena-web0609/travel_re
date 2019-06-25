@extends('layout')

@section('content')
    <div class="container">
        <div class="bg-msk">
                    <div class="panel-heading"><h1>会員登録</h1></div>
                    <div class="panel-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $message)
                                    <p>{{ $message }}</p>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">メールアドレス</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
                            </div>
                            <div class="form-group">
                                <label for="name">ユーザー名</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
                            </div>
                            <div class="form-group">
                                <label for="password">パスワード</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">パスワード（確認）</label>
                                <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
                            </div>
                            <div class="text-right">
                                <input type="submit" value="登録" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
        </div>
    </div>
@endsection
