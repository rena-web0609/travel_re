@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-offset-3 col-md-6">
                <nav class="panel panel-default">
                    @if(Auth::id() === $plan->user_id)
                    <ul>
                       <li style="list-style: none"><a href={{ route('plans.edit', ['plan' => $plan->id]) }}>プラン編集</a></li>
                    </ul>
                    @endif
                    <div class="panel-heading">
                        プラン詳細
                    </div>
                    <div class="panel-body">
                        <div class="text-center">
                            <div>
                                <div class="list-group-item">
                                    <h1>{{ $plan->title }}</h1>
                                    <img class="main-img" src={{ $plan->image }}>
                                    <table>
                                        <tr><th>季節</th><th>{{ $plan->season }}</th></tr>
                                        <tr><th>予算</th><th>{{ $plan->price }}</th></tr>
                                        <tr><th>交通手段</th><th>{{ $plan->access }}</th></tr>
                                        <tr><th>詳細</th><th>{{ $plan->content }}</th></tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endsection
