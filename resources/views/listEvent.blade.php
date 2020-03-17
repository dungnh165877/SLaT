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
        <div class="card-body">
            <table class="mb-0 table table-hover table-list-event">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="15%">Tên sự kiện</th>
                        <th width="65%">Nội dung</th>
                        <th width="5%">
                            <button class="btn btn-danger btn-delete-events" disabled>Delete</button>
                        </th>
                        <th width="10%" class="col-search">
                            <i class="pe-7s-search toggle-search" data-toggle="tooltip" title="toggle search"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="row-search">
                        <th width="5%">*</th>
                        <td width="15%">
                            <input type="text" class="form-control input-sm">
                        </td>
                        <td width="65%">
                            <input type="text" class="form-control input-sm">
                        </td>
                        <td width="5%" class="text-center">
                            <input class="styled-checkbox checkbox-all" id="styled-checkbox-all" type="checkbox" value="value1">
                            <label for="styled-checkbox-all"></label>
                        </td>
                        <td width="10%">
                            <i class="fas fa-eraser clear-filter" data-toggle="tooltip" title="clear filter"></i>
                        </td>
                    </tr>
                    @foreach ($events as $event)
                    <tr style="cursor: pointer;" class="row-content">
                        <th width="5%">{{ $loop->iteration }}</th>
                        <td width="15%">{{ $event->name }}</td>
                        <td width="60%">{{ $event->content }}</td>
                        <td width="5%" class="text-center td-checkbox">
                            <input class="styled-checkbox event-checkbox" id="{{ 'styled-checkbox-' . $loop->iteration }}" type="checkbox" value="value1">
                            <label for="{{ 'styled-checkbox-' . $loop->iteration }}" class="label-checkbox"></label>
                        </td>
                        <td width="10%">
                            <i class="fas fa-pencil-alt"></i>
                            <i class="fas fa-trash-alt"></i>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            <nav class="mt-3">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection

@section('script')
@parent
<script type="text/javascript" src="js/list-event.js"></script>
@endsection