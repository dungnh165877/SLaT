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
                <div class="col-md-6">
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
                                    </div>
                                </div>
                                <div class="avatar-update" hidden="true">
                                    <button class="mt-1 btn btn-primary btn-avatar-update">Update</button>
                                </div>
                                <div class="card-body">
                                    <div class="position-relative form-group">
                                        <h5 class="card-title">Username</h5>
                                        <div class="info-detail">{{ session('user')->username }}</div>
                                    </div>
                                    <div class="position-relative form-group">
                                        <h5 class="card-title">Email</h5>
                                        <div class="info-detail">
                                            <span class="email-text">{{ session('user')->email }}</span>
                                            <input type="text" value="tien.dd166827@sis.hust.edu.vn" class="email-update" hidden="true">
                                            <i class="fas fa-pen float-right email-edit"></i>
                                            <i class="fas fa-save float-right email-save" hidden="true"></i>
                                        </div>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <form class="">
                                <div class="position-relative form-group">
                                    <h5 class="card-title">Họ và tên</h5>
                                    <input name="fullname" id="fullName" placeholder="Tên đầy đủ" type="text" class="form-control" value="{{ session('user')->fullname }}">
                                </div>
                                <div class="position-relative form-group">
                                    <h5 class="card-title">Lớp</h5>
                                    <input name="class" id="class" placeholder="Lớp" type="text" class="form-control" value="{{ session('user')->class }}">
                                </div>
                                <div class="position-relative form-group">
                                    <h5 class="card-title">Khoa/Viện</h5>
                                    <select type="select" name="major" class="custom-select custom-major">
                                        <option value="">Khoa/Viện</option>
                                        <option value="01">Văn phòng các chương trình quốc tế</option>
                                        <option value="02">Viện Công nghệ Sinh học và công nghệ Thực phẩm</option>
                                        <option value="03">Viện Công nghệ Thông tin và Truyền thông</option>
                                        <option value="04">Viện Cơ khí</option>
                                        <option value="05">Viện Cơ khí Động lực</option>
                                        <option value="06">Viện Dệt may - Da giầy và Thời trang</option>
                                        <option value="07">Viện Đào tạo liên tục</option>
                                        <option value="08">Viện Điện</option>
                                        <option value="09">Viện Điện tử - Viễn thông</option>
                                        <option value="10">Viện Kinh tế & Quản lý</option>
                                        <option value="11">Viện Kỹ thuật Hoá học</option>
                                        <option value="12">Viện Khoa học và Công nghệ Môi trường</option>
                                        <option value="13">Viện Khoa học và Công nghệ Nhiệt Lạnh</option>
                                        <option value="14">Viện Khoa học và Kỹ thuật Vật liệu</option>
                                        <option value="15">Viện Ngoại ngữ</option>
                                        <option value="16">Viện Sư phạm Kỹ thuật</option>
                                        <option value="17">Viện Toán ứng dụng và Tin học</option>
                                        <option value="18">Viện Vật lý kỹ thuật</option>
                                    </select>
                                </div>
                                <div class="position-relative form-group">
                                    <h5 class="card-title">Ngày sinh</h5>
                                    <input name="birthday" id="birthday" type="text" class="form-control" value="{{ session('user')->birthday }}">
                                </div>
                                <div class="position-relative form-group">
                                    <h5 class="card-title">Giới tính</h5>
                                    <div class="position-relative form-group">
                                        <div>
                                            <div class="custom-radio custom-control">
                                                <input type="radio" id="exampleCustomRadio" name="customRadio" class="custom-control-input"><label class="custom-control-label" for="exampleCustomRadio">Nam</label>
                                            </div>
                                            <div class="custom-radio custom-control">
                                                <input type="radio" id="exampleCustomRadio2" name="customRadio" class="custom-control-input"><label class="custom-control-label" for="exampleCustomRadio2">Nữ</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button class="mt-1 btn btn-primary">Cập nhật thông tin</button>
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