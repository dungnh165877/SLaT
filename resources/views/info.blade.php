@extends('layouts.index')
@section('title', 'Thông tin cá nhân')
<link rel="stylesheet" href="css/info.css">
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
                                    <img src="https://www.imagesjunction.com/images/img/nancy_momoland_images.jpg" alt="" class="image-user">
                                    <div class="update-image">
                                        <input type="file" name="avatar" id="input-update" class="input-update" accept="image/gif, image/jpeg, image/jpg, image/png" />
                                        <label for="input-update">
                                            <span class="hover-update">
                                                <i class="metismenu-icon pe-7s-camera"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="position-relative form-group">
                                        <h5 class="card-title">Username</h5>
                                        <div class="info-detail">20166827</div>
                                    </div>
                                    <div class="position-relative form-group">
                                        <h5 class="card-title">Email</h5>
                                        <div class="info-detail">tien.dd166827@sis.hust.edu.vn</div>
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
                                    <label for="exampleEmail" class="">Fullname</label>
                                    <input name="email" id="exampleEmail" placeholder="with a placeholder" type="email" class="form-control">
                                </div>
                                <div class="position-relative form-group">
                                    <label for="examplePassword" class="">Class</label>
                                    <input name="password" id="examplePassword" placeholder="password placeholder" type="password" class="form-control">
                                </div>
                                <div class="position-relative form-group"><label for="exampleCustomSelect" class="">Major</label><select type="select" id="exampleCustomSelect" name="customSelect" class="custom-select">
                                        <option value="">Select</option>
                                        <option>Value 1</option>
                                        <option>Value 2</option>
                                        <option>Value 3</option>
                                        <option>Value 4</option>
                                        <option>Value 5</option>
                                    </select></div>
                                <div class="position-relative form-group">
                                    <label for="exampleCustomSelect" class="">Radios</label>
                                    <div class="position-relative form-group">
                                        <div>
                                            <div class="custom-radio custom-control">
                                                <input type="radio" id="exampleCustomRadio" name="customRadio" class="custom-control-input"><label class="custom-control-label" for="exampleCustomRadio">Name</label>
                                            </div>
                                            <div class="custom-radio custom-control">
                                                <input type="radio" id="exampleCustomRadio2" name="customRadio" class="custom-control-input"><label class="custom-control-label" for="exampleCustomRadio2">Nữ</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button class="mt-1 btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection