<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar ps ps--active-y ps--scrolling-y">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Trang chủ</li>
                <li>
                    <a href="{{route('slat')}}">
                        <i class="metismenu-icon pe-7s-home"></i>
                        Thông tin
                    </a>
                </li>
                @if(session('role') == 'admin')
                    <li>
                        <a href="/statistic">
                            <i class="metismenu-icon pe-7s-graph3"></i>
                            Thống kê
                        </a>
                    </li>
                @endif
                @if(session('role') == 'admin' || session('role') == 'expert' ||session('role') == 'lecturer')
                <li class="app-sidebar__heading">Quản trị hệ thống</li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-note2"></i>
                        Quản lý bài đăng
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-collapse">
                        @if(session('role') == 'admin')
                        <li>
                            <a href="/list-post">
                                <i class="metismenu-icon"></i>
                                Danh sách bài đăng
                            </a>
                        </li>
                        @endif
                        <li>
                            <a href="/list-post-pending">
                                <i class="metismenu-icon"></i>
                                Danh sách bài chờ duyệt
                            </a>
                        </li>
                        <li>
                            <a href="/create-post">
                                <i class="metismenu-icon"></i>
                                Đăng bài mới
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @if(session('role') == 'admin' ||session('role') == 'lecturer')
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-users"></i>
                        Quản lý thành viên
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-collapse">
                        @if(session('role') == 'admin')
                        <li>
                            <a href="/list-expert">
                                <i class="metismenu-icon"></i>
                                Danh sách chuyên gia
                            </a>
                        </li>
                        <li>
                            <a href="/list-lecturer">
                                <i class="metismenu-icon"></i>
                                Danh sách giảng viên
                            </a>
                        </li>
                        @endif
                        <li>
                            <a href="/list-student">
                                <i class="metismenu-icon"></i>
                                Danh sách sinh viên
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @if(session('role') == 'admin' ||session('role') == 'expert')
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-server"></i>
                        Quản trị cơ sở tri thức
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-collapse">
                        <li>
                            <a href="/list-event">
                                <i class="metismenu-icon"></i>
                                Danh sách sự kiện
                            </a>
                        </li>
                        <li>
                            <a href="list-rule">
                                <i class="metismenu-icon"></i>
                                Danh sách luật suy diễn
                            </a>
                        </li>
                        @if(session('role') == 'expert')
                        <li>
                            <a href="list-rule-pending">
                                <i class="metismenu-icon"></i>
                                Danh sách luật suy diễn chờ duyệt
                            </a>
                        </li>
                        @endif
                        <li>
                            <a href="list-question-subject">
                                <i class="metismenu-icon"></i>
                                Quản trị câu hỏi cho danh mục
                            </a>
                        </li>
                        @if(session('role') == 'expert')
                        <li>
                            <a href="list-subject">
                                <i class="metismenu-icon"></i>
                                Danh sách các môn học
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif
                @if(session('role') == 'lecturer' ||session('role') == 'student')
                <li class="app-sidebar__heading">Thông tin các lớp học</li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-study"></i>
                        Thông tin lớp học
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-collapse">
                        <li>
                            <a href="/class?code=123456">
                                <i class="metismenu-icon"></i>
                                Văn hóa kinh doanh
                            </a>
                        </li>
                        <li>
                            <a href="/?code=123457">
                                <i class="metismenu-icon"></i>
                                Quản trị kinh doanh
                            </a>
                        </li>
                        <li>
                            <a href="/class?code=123458">
                                <i class="metismenu-icon"></i>
                                Hệ điều hành
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-chat"></i>
                        Nhóm chat
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-collapse">
                        <li>
                            <a href="/class-chat?code=123456">
                                <i class="metismenu-icon"></i>
                                Văn hóa kinh doanh
                            </a>
                        </li>
                        <li>
                            <a href="/class-chat?code=123457">
                                <i class="metismenu-icon"></i>
                                Quản trị kinh doanh
                            </a>
                        </li>
                        <li>
                            <a href="/class-chat?code=123458">
                                <i class="metismenu-icon"></i>
                                Hệ điều hành
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @if(session('role') == 'lecturer' || session('role') == 'student'|| session('role') == 'expert')
                <li class="app-sidebar__heading">Chức năng</li>
                @if(session('role') == 'lecturer')
                <li>
                    <a href="forms-controls.html">
                        <i class="metismenu-icon pe-7s-help1">
                        </i>Đánh giá bài giảng
                    </a>
                </li>
                <li>
                    <a href="forms-controls.html">
                        <i class="metismenu-icon pe-7s-help1">
                        </i>Bài giảng được đánh giá
                    </a>
                </li>
                <li>
                    <a href="forms-controls.html">
                        <i class="metismenu-icon pe-7s-help1">
                        </i>Tư vấn học tập
                    </a>
                </li>
                @endif
                @if(session('role') == 'student')
                <li>
                    <a href="/send-question">
                        <i class="metismenu-icon pe-7s-help1">
                        </i>Gửi câu hỏi
                    </a>
                </li>
                @endif
                <li>
                    <a href="/note">
                        <i class="metismenu-icon pe-7s-note">
                        </i>Ghi chú
                    </a>
                </li>
                @endif
                <li class="app-sidebar__heading">Quản lý thông tin cá nhân</li>
                <li>
                    <a href="/info">
                        <i class="metismenu-icon pe-7s-user"></i>
                        Thông tin cá nhân
                    </a>
                </li>
                <li>
                    <a href="/change-pass">
                        <i class="metismenu-icon pe-7s-key"></i>
                        Đổi mật khẩu
                    </a>
                </li>
            </ul>
        </div>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 662px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 415px;"></div>
        </div>
    </div>
</div>