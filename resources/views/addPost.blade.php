@extends('layouts.index')
@section('title', 'Thêm bài mới')
@section('css')
    @parent

    <link rel="stylesheet" href="css/add-post.css">
@endsection
@section('content')
    @parent
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-user icon-gradient bg-sunny-morning"></i>
                </div>
                <div>Thêm bài mới</div>
            </div>
        </div>
    </div>
    <div class="tab-content">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form class="form-material">
                    <div class="position-relative form-group">
                        <h5 class="card-title">Tiêu đề</h5>
                        <input name="title" placeholder="Title" type="text" class="form-control" >
                        <h5 class="card-title">Nội dung</h5>
                        <div class="post-content">summernote 1</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @parent
    <script type="text/javascript" src="js/add-post.js"></script>
@endsection