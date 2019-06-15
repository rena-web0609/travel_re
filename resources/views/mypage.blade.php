@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-offset-3 col-md-6">
                <nav class="panel panel-default">
                    <div class="panel-heading">
                        登録プラン一覧
                    </div>
                    <div class="panel-body">
                        <div class="text-center">
                            <div>
                                @foreach ($plans as $plan)
                                    <div class="list-group-item">
                                        <a href={{ route('plans.show', ['plan' => $plan->id ]) }}>
                                            {{ $plan->title }}<br>
                                            <img src={{ $plan->image }}>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endsection
