@extends('layout')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
    @endsection

@section('content')
    <div class="container">
        <div class="bg-mask">
                    <div class="panel-heading"><h1>プランを作成する</h1></div>
                    <div class="panel-body">
                        <form action={{ route('plans.store') }} method="post" enctype="multipart/form-data" >
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="title">プラン名</label>
                                <input type="text" class="form-control" name="title" id="title" >
                                <label for="season">季節</label>
                                {{ Form::select('season_id', $seasonId, null, ['class' => 'form-control', 'placeholder' => '選択してください']) }}
                                <br>
                                <label for="address">都道府県</label>
                                {{ Form::select('address_id', $addressId, null, ['class' => 'form-control' , 'placeholder' => '選択してください']) }}
                                <br>
                                <label for="price">金額</label>
                                <input type="text" class="form-control" name="price">
                                <label for="access">アクセス</label>
                                <input type="text" class="form-control" name="access">
                                <label for="content">詳細</label>
                                <input type="text" class="form-control" name="content">
                                <label for="image">画像</label>
                                <input type="file" class="form-control" name="image">
                                <input type="submit" value="作成" class="text-right">
                            </div>
                        </form>
                    </div>
        </div>
    </div>
@endsection
