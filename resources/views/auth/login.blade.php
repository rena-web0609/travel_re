@extends('layout')

@section('content')
    <div class="container">
                    <div class="bg-mask">
                    <div class="panel-heading"><h1>ログイン</h1></div>
                    <div class="panel-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $message)
                                    <p>{{ $message }}</p>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">メールアドレス</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
                            </div>
                            <div class="form-group">
                                <label for="password">パスワード</label>
                                <input type="password" class="form-control" id="password" name="password" />
                            </div>
                            <div class="text-right">
                                <input type="submit" value="ログイン" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                    </div>
    </div>
@endsection
