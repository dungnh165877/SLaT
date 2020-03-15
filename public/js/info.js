$(document).ready(function() {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    $('input[name="birthday"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'),10),
        locale: {
            format: 'DD/MM/YYYY'
        }
    }, function(start, end, label) {
        var years = moment().diff(start, 'years');
    });
});

$(document).on('change', '#input-update', function(event) {
    var avatar = $(this).parent('.update-image').parent('.avatar-user');

    var src = $(avatar).children('img').data('img');
    
    if ($(this).val().length == 0) {
        $(avatar).find('.avatar-update').attr('hidden', 'true');
        $(avatar).children('img').attr('src', src);
    } else {
        $(avatar).children('img').attr('src', URL.createObjectURL($(this)[0]['files'][0]));
        $(avatar).find('.avatar-update').removeAttr('hidden');
        $(avatar).find('.avatar-cancel').removeAttr('hidden');
    }
});

$(document).on('click', '.email-edit', function(event) {
    var email_detail = $(this).parent('.info-detail');
    var email = $(email_detail).children('.email-text').text();
    $(email_detail).children('.email-update').val(email);
    $(email_detail).children('.email-text').attr('hidden', 'true');
    $(email_detail).children('.email-update').removeAttr('hidden');
    $(email_detail).children('.email-save').removeAttr('hidden');
    $(this).attr('hidden', 'true');
});

$(document).on('keyup', '#fullName', function(event) {
    var fullname_before = $(this).data('data');
    if (fullname_before != $(this).val()){
        $('.btn-update-info').removeAttr('disabled');
    } else {
        $('.btn-update-info').attr('disabled', 'true');
    }
});

$(document).on('keyup', '#class', function(event) {
    var class_before = $(this).data('data');
    if (class_before != $(this).val()){
        $('.btn-update-info').removeAttr('disabled');
    } else {
        $('.btn-update-info').attr('disabled', 'true');
    }
});

$(document).on('change', '.custom-major', function(event) {
    var major_before = $(this).data('data');
    if (major_before != $(this).val()){
        $('.btn-update-info').removeAttr('disabled');
    } else {
        $('.btn-update-info').attr('disabled', 'true');
    }
});

$(document).on('change', '#birthday', function(event) {
    var birthday_before = $(this).data('data');
    if (birthday_before != $(this).val()){
        $('.btn-update-info').removeAttr('disabled');
    } else {
        $('.btn-update-info').attr('disabled', 'true');
    }
});

$(document).on('change', '.custom-control-input', function(event) {
    var sex_before = $('.form-sex').data('data');
    var sex_after = $($("input[name='customSex']:checked")[0]).next('.custom-control-label').text();
    if (sex_before != sex_after){
        $('.btn-update-info').removeAttr('disabled');
    } else {
        $('.btn-update-info').attr('disabled', 'true');
    }
});

$(document).on('click', '.btn-update-info', function(event) {
    event.preventDefault();
    var fullName = $("#fullName").val();
    var clasS = $("#class").val();
    var major = $(".custom-major").val();
    var birthday = $("#birthday").val();
    var sex = $($("input[name='customSex']:checked")[0]).next('.custom-control-label').text();

    $.ajax({
        url: '/updateInfo',
        type: 'POST',
        dataType: 'json',
        data: {
            fullName: fullName,
            class: clasS,
            major: major,
            birthday: birthday,
            sex: sex
        },
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json',
        success: function(res){
            if (res.status) {
                toastr.success(res.message);
                $('.btn-update-info').attr('disabled', 'true');
                $("#fullName").data('data', fullName);
                $("#class").data('data', clasS);
                $(".custom-majorr").data('data', major);
                $("#birthday").data('data', birthday);
                $(".form-sex").data('data', sex);
            } else {
                toastr.error(res.message);
                window.location = '/info';
            }

        }
    });
    
});

$(document).on('click', '.btn-avatar-update', function(event) {
    event.preventDefault();
    var formData = new FormData();
    formData.append('image', $('.input-update').prop('files')[0]);
    $.ajax({
        url: '/updateAvt',
        type: 'POST',
        data: formData,
        dataType: 'json',
        contentType: false,
        processData: false,
        cache: false,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success: function(res){
            if (res.status) {
                toastr.success(res.message);
                $(".avatar-update").attr('hidden', 'true');
                $(".avatar-cancel").attr('hidden', 'true');
            } else {
                toastr.error('Update avatar error!!!');
            }
        }
    })
});

$(document).on('click', '.btn-avatar-cancel', function(event) {
    event.preventDefault();
    var avatar = $(this).parent('.avatar-cancel').parent('.update-image').parent('.avatar-user');

    var src = $(avatar).children('img').data('img');
    $(avatar).children('img').attr('src', src);
    $(".avatar-update").attr('hidden', 'true');
    $(".avatar-cancel").attr('hidden', 'true');
});
