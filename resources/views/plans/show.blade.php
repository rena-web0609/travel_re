@extends('layout')

@section('content')
    <div class="container">
       <div>
           <div class="back"><a href={{ route('plans.index') }}>＞一覧に戻る</a></div>
           <div>
                    @if(Auth::id() === $plan->user_id)
                    <ul class="menu">
                        <li><a href={{ route('plans.edit', ['plan' => $plan->id]) }}>プラン編集</a></li>
                        <form action={{ route('plans.destroy', [$plan->id]) }} id="form_{{ $plan->id }}" method="POST">
                            @method("DELETE")
                            @csrf
                            <li><a href="#" data-id="{{ $plan->id }}" class="btn btn-danger btn-sm" onclick="deletePost(this);">削除</a></li>
                        </form>

                    </ul>
                    @endif
           </div>
                    <div class="panel-heading">
                        <h1>プラン詳細</h1>
                    </div>
                    <div class="panel">
                        <div class="text-center">
                            <div>
                                <div class="list-group-item">
                                    <h1>{{ $plan->title }}</h1>
                                    <img alt="" class="top-img" src="{{ asset('/storage/pic/'.$plan->image) }}">
                                    <table>
                                        <tr><th>季節</th><th>{{ $season->season }}</th></tr>
                                        <tr><th>都道府県</th><th>{{ $address->address }}</th></tr>
                                        <tr><th>予算</th><th>{{ $plan->price }}円</th></tr>
                                        <tr><th>交通手段</th><th>{{ $plan->access }}</th></tr>
                                        <tr><th>詳細</th><th>{{ $plan->content }}</th></tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
       </div>
    </div>
    <script>
        function deletePost(e) {
            'use strict';

            if (confirm('本当に削除していいですか?')) {
                document.getElementById('form_' + e.dataset.id).submit();
            }
        }
    </script>
@endsection
