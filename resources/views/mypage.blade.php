@extends('layout')

@section('content')
    <div class="container">
                    <div class="panel-heading">
                        <h1>登録プラン一覧</h1>
                    </div>
        <div class="back">
            <a href={{ route('plans.index') }}>＞一覧に戻る</a>
        </div>
                    <div class="text-center">
                        <div class="list-group">
                                @foreach ($plans as $plan)
                                    <div class="list-group-item">
                                        <a href={{ route('plans.show', ['plan' => $plan->id ]) }}>
                                            {{ $plan->title }}<br>
                                            <img src="{{ asset('/storage/pic/'.$plan->image) }}">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
    </div>
@endsection
