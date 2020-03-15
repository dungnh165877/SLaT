@extends('layouts.index')
@section('title', 'Thông tin cá nhân')
@section('css')
    @parent
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="css/info.css">
@endsection

@section('content')
    @parent
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-user icon-gradient bg-sunny-morning"></i>
                </div>
                <div>Thông tin cá nhân
                    <div class="page-title-subheading"> Thông tin của chính bạn. Vui lòng điền đủ thông tin</div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-content">
        <div>
            @if (session('info-error'))
                <div class="alert alert-danger text-center">
                    {{ session('info-error') }}
                </div>
            @endif
        </div>
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="row">
                <div class="col-sm-5 col-md-4 col-lg-3">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <form>
                                <div class="avatar-user">
                                    <img src="images/avatars/{{ session('user')->avatar }}" alt="" class="image-user" data-img="images/avatars/{{ session('user')->avatar }}">
                                    <div class="update-image">
                                        <input type="file" name="file-avatar" id="input-update" class="input-update" accept="image/gif, image/jpeg, image/jpg, image/png" />
                                        <label for="input-update">
                                            <span class="hover-update">
                                                <i class="metismenu-icon pe-7s-camera"></i>
                                            </span>
                                        </label>
                                        <div class="avatar-update" hidden="true">
                                            <button class="mt-1 btn btn-success btn-avatar-update"><i class="fas fa-save"></i></button>
                                        </div>
                                        <div class="avatar-cancel" hidden="true">
                                            <button class="mt-1 btn btn-danger btn-avatar-cancel"><i class="fas fa-undo-alt"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="fullName text-center">{{ session('user')->fullname }}</div>
                                <div class="card-body card-info">
                                    <div class="position-relative form-group">
                                        <i class="fas fa-user-circle float-left mr-2"></i>
                                        <h6>{{ session('user')->username }}</h6>
                                    </div>
                                    <div class="position-relative form-group">
                                        <i class="fas fa-envelope float-left mr-2"></i>
                                        <h6 data-toggle="tooltip" title="{{ session('user')->email }}">{{ session('user')->email }}</h6>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <form class="form-material">
                                <div class="position-relative form-group">
                                    <h5 class="card-title">Họ và tên</h5>
                                    <input name="fullname" id="fullName" data-data="{{ session('user')->fullname }}" placeholder="Tên đầy đủ" type="text" class="form-control" value="{{ session('user')->fullname }}">
                                </div>
                                <div class="position-relative form-group">
                                    <h5 class="card-title">Lớp</h5>
                                    <input name="class" id="class" data-data="{{ session('user')->class }}" placeholder="Lớp" type="text" class="form-control" value="{{ session('user')->class }}">
                                </div>
                                <div class="position-relative form-group">
                                    <h5 class="card-title">Khoa/Viện</h5>

                                    <select type="select" name="major" class="custom-select custom-major form-control" data-data="{{ session('user')->major_id }}">
                                        <option value="00" {{ session('user')->major_id == '' ? 'selected' : '' }} >Khoa/Viện</option>
                                        @foreach ($majors as $major)
                                            <option value="{{ $major->id }}" {{ session('user')->major_id == $major->id ? 'selected' : '' }}>{{ $major->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="position-relative form-group">
                                    <h5 class="card-title">Ngày sinh</h5>
                                    <input name="birthday" id="birthday" data-data="{{ session('user')->birthday }}" type="text" class="form-control" value="{{ session('user')->birthday }}">
                                </div>
                                <div class="position-relative form-group">
                                    <h5 class="card-title">Giới tính</h5>
                                    <div class="position-relative form-group form-sex" data-data="{{ session('user')->sex }}">
                                        <div>
                                            <div class="custom-radio custom-control">
                                                <input type="radio" id="exampleCustomRadio" name="customSex" class="custom-control-input" {{ session('user')->sex == 'Nam' ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="exampleCustomRadio">Nam</label>
                                            </div>
                                            <div class="custom-radio custom-control">
                                                <input type="radio" id="exampleCustomRadio2" name="customSex" class="custom-control-input" {{ session('user')->sex == 'Nữ' ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="exampleCustomRadio2">Nữ</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button class="mt-1 btn btn-primary btn-update-info" disabled>Cập nhật thông tin</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
    @parent
    <script type="text/javascript" src="js/info.js"></script>
@endsection