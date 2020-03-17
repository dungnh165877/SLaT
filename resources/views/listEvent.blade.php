@extends('layouts.index')
@section('title', 'Danh sách sự kiện')
@section('css')
@parent
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="css/list-event.css">
@endsection
@section('content')
@parent
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-news-paper icon-gradient bg-sunny-morning"></i>
            </div>
            <div>Danh sách sự kiện
                <div class="page-title-subheading">Lưu trữ các sự kiện dùng cho suy diễn</div>
            </div>
        </div>
    </div>
</div>
<div class="tab-content">
    <div class="main-card mb-3 card">
        <div class="card-body table-event">
            @include('fetchEvent')
        </div>
    </div>
</div>
@endsection

@section('script')
@parent
<script type="text/javascript" src="js/list-event.js"></script>
@endsection