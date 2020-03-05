@extends('layouts.index')
@section('title', 'Trang chủ')
@section('content')
    @parent


    <div class="alert alert-danger">
        {{ session('user') }}
    </div>

    <h1>Trang chu</h1>

@endsection