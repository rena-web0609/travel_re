@extends('layout')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-offset-3 col-md-6">
                <nav class="panel panel-default">
                    <div class="panel-heading">プランを編集する</div>
                    <div class="panel-body">

                        <form action={{ route('plans.update', ['plan' => $plan->id]) }} method="POST" enctype="multipart/form-data" >
                            @method("PUT")
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
                                <input type="text" class="form-control" name="title" value="{{ old('title', $plan->title) }}" >
                                <label for="season">季節</label>
                                <input type="text" class="form-control" name="season" value="{{ old('season',$plan->season) }}" >
                                <label for="address">都道府県</label>
                                <input type="text" class="form-control" name="address" value="{{ old('address',$plan->address) }}" >
                                <label for="price">金額</label>
                                <input type="text" class="form-control" name="price" value="{{ old('price',$plan->price) }}" >
                                <label for="access">アクセス</label>
                                <input type="text" class="form-control" name="access" value="{{ old('access',$plan->access) }}" >
                                <label for="content">詳細</label>
                                <input type="text" class="form-control" name="content" value="{{ old('content',$plan->content) }}" >
                                <label for="image">画像</label>
                                <input type="file" class="form-control" name="p_image" value="{{ url('$filePath') }}" >
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">編集</button>
                            </div>
                        </form>

                    </div>
                </nav>
            </div>
        </div>
    </div>
@endsection

