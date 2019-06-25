@extends('layout')

@section('content')
    <div class="container">
                    <div class="panel-heading">
                        <form action={{ route('plans.index') }} method="get">
                            <label for="season">季節</label>
                            {{ Form::select('season_id', $seasonId, null, ['class' => 'form-control', 'placeholder' => '選択してください', old('season_id')]) }}
                            <br>
                            <label for="address">都道府県</label>
                            {{ Form::select('address_id', $addressId, null, ['class' => 'form-control', 'placeholder' => '選択してください', old('address_id')]) }}
                            <br>
                            <input type="submit" value="検索">
                        </form>
                    </div>
                    <div class="text-center">
                        <div class="list-group">
                        @foreach ($plans as $plan)
                                <div class="list-group-item">
                                    <a href={{ route('plans.show', ['plan' => $plan->id ]) }}>
                                        {{ $plan->title }}<br>
                                        <img alt="" src="{{ asset('/storage/pic/'.$plan->image) }}">
                                    </a>
                                </div>
                        @endforeach
                        </div>
                    </div>
    </div>
@endsection
