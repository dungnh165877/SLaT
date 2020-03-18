@extends('layouts.index')
@section('title', 'Danh sách sự kiện')
@section('css')
@parent
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="css/list-event.css">
@endsection
@section('content')
@parent
<form class="form-material">
	<div class="alert alert-danger">
		<h6 class="alert-heading">Chú ý!</h6><hr>
		<span> <i class="fas fa-ban"></i> Các tên sự kiện không được trùng nhau</span><br>
		<span> <i class="fas fa-ban"></i> Sự kiện tích cực phải đặt tên bắt đầu bằng chữ cái 'b'</span> <br>
		<span> <i class="fas fa-ban"></i> Sự kiện tiêu cực phải đặt tên bắt đầu bằng chữ cái 'c'</span>
	</div>
	<div class="position-relative form-group">
	    <h5 class="card-title">Name</h5>
	    <input name="name" placeholder="Tên sự kiện" type="text" class="form-control">
	</div>
	<div class="position-relative form-group">
	    <h5 class="card-title">Content</h5>
	    <textarea class="form-control" rows="5" placeholder="Nội dung sự kiện" autocomplete='off'></textarea>
	</div>
</form>
@endsection

@section('script')
@parent
<script type="text/javascript" src="js/list-event.js"></script>
@endsection

