@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-4">
                <nav class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        <a href={{ route('plans.create') }} class="btn-block">
                            プラン作成
                        </a>
                    </div>
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
                </nav>
            </div>
        </div>
    </div>
@endsection
