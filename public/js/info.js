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
        $(avatar).next('.avatar-update').attr('hidden', 'true');
        $(avatar).children('img').attr('src', src);
    } else {
        $(avatar).next('.avatar-update').removeAttr('hidden');
        $(avatar).children('img').attr('src', URL.createObjectURL($(this)[0]['files'][0]));
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

$(document).on('click', '.email-save', function(event) {
    var email_detail = $(this).parent('.info-detail');
    var email = $(email_detail).children('.email-update').val();

    $.ajax({
        url: '/updateEmail',
        type: 'POST',
        dataType: 'json',
        data: {
            email: email
        },
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success: function(res){
            if (res.status) {
                toastr.success(res.message);
                $(email_detail).children('.email-text').text(email);
                $(email_detail).children('.email-text').removeAttr('hidden');
                $(email_detail).children('.email-update').attr('hidden', 'true');
                $(email_detail).children('.email-edit').removeAttr('hidden');
                $(this).attr('hidden', 'true');
            } else {
                toastr.error(res.message);
            }
        }
    })
    
    
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
            } else {
                toastr.error('Update avatar error!!!');
            }
        }
    })
});
