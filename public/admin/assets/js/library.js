/*
author : stately web
website: https://www.statelyweb.co.uk
email: m.fahim@statelyweb.com
===================================
 */

var token = $('meta[name="csrf-token"]').attr('content');
$(document).ready(function () {
    $('.userDelete').click(function (e) {
        e.preventDefault();
        var clickedItem = $(this);
        var id = clickedItem.data('id');
        $('#confirmDelete').data('id', id);
        $('#deleteModal').modal('show');
    });
    $('#confirmDelete').click(function () {
        var id = $(this).data('id');
        var deleteUrl = 'user_delete';
        var deleteData = {
            _token: token,
            id: id
        };
        ajaxDeleteRequest(deleteUrl, deleteData, function (response) {
            if (response.success) {
                var tr = $('.userDelete[data-id="' + id + '"]').closest('tr');
                tr.css('background', 'red');
                tr.fadeOut(1000, function () {
                    tr.remove();
                });
            } else {
                alert(response);
            }
        });
        $('#deleteModal').modal('hide');
    });
    $('.user_reset').click(function (e) {
        e.preventDefault();
        var clickedItem = $(this);
        var id = clickedItem.data('id');
        $('#sendOTP').data('id', id);
        $('#resetPassword').modal('show');
    });
    $('#sendOTP').click(function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        $('#loader_otp').removeClass('d-none');
        $('#otp_btn_no').attr('disabled',true);
        $(this).attr('disabled',true);
        var sendOtpUrl = 'sendReset_otp';
        var sendOtp = {
            _token: token,
            id: id
        };
        $.ajax({
            type: "post",
            url: sendOtpUrl,
            data:sendOtp,
            success: function (response) {
                if(response == 'success'){
                    $('#resetPassword').modal('hide');
                    location.reload();
                }
            }
        });
    });
    $('.user_status').click(function (e) {
        var clickedItem = $(this);
        var id = $(this).data('id');
        var url = 'user_status';
        var data ={
            _token:token,
            id:id
        };
        ajaxStatusRequest(url,data, function(response){
            if (response.success ==0) {
                clickedItem.css('background', '#808080');
                clickedItem.html('<i class="fas fa-random mr-1"></i> Disabled');
            } else if(response.success ==1){
                clickedItem.css('background', '#28a745');
                clickedItem.html('<i class="fas fa-random mr-1"></i> Enabled');
            } else {
                alert(response);
            }
        });

    });
    $('.roleDelete').click(function (e) {
        e.preventDefault();
        var clickedItem = $(this);
        var id = clickedItem.data('id');
        $('#roleConfirmDelete').data('id', id);
        $('#deleteModal').modal('show');
    });
    $('#roleConfirmDelete').click(function () {
        var id = $(this).data('id');
        var deleteUrl = 'role_delete';
        var deleteData = {
            _token: token,
            id: id
        };
        ajaxDeleteRequest(deleteUrl, deleteData, function (response) {
            if (response.success) {
                var tr = $('.roleDelete[data-id="' + id + '"]').closest('tr');
                tr.css('background', 'red');
                tr.fadeOut(1000, function () {
                    tr.remove();
                });
            } else {
                alert(response);
            }
        });
        $('#deleteModal').modal('hide');
    });
    $('.departmentDelete').click(function (e) {
        e.preventDefault();
        var clickedItem = $(this);
        var id = clickedItem.data('id');
        $('#confirmDeleteLocation').data('id', id);
        $('#deleteModal').modal('show');
    });
    $('#confirmDeleteLocation').click(function () {
        var id = $(this).data('id');
        var route = $(this).data('route');
        alert(route);
        // var deleteUrl = route;
        var deleteData = {
            _token: token,
            id: id
        };
        ajaxDeleteRequest(deleteUrl, deleteData, function (response) {
            if (response.success) {
                var tr = $('.locationDelete[data-id="' + id + '"]').closest('tr');
                tr.css('background', 'red');
                tr.fadeOut(1000, function () {
                    tr.remove();
                });
            } else {
                alert(response);
            }
        });
        $('#deleteModal').modal('hide');
    });
    $('.location_status').click(function (e) {
        var clickedItem = $(this);
        var id = $(this).data('id');
        var url = 'location_status';
        var data ={
            _token:token,
            id:id
        };
        ajaxStatusRequest(url,data, function(response){
            if (response.success ==0) {
                clickedItem.css('background', '#808080');
                clickedItem.html('<i class="fas fa-random mr-1"></i> Disabled');
            } else if(response.success ==1){
                clickedItem.css('background', '#28a745');
                clickedItem.html('<i class="fas fa-random mr-1"></i> Enabled');
            } else {
                alert(response);
            }
        });

    });
    $('.communityDelete').click(function (e) {
        e.preventDefault();
        var clickedItem = $(this);
        var id = clickedItem.data('id');
        $('#confirmDeleteCommunity').data('id', id);
        $('#deleteModal').modal('show');
    });
    $('#confirmDeleteCommunity').click(function () {
        var id = $(this).data('id');
        var deleteUrl = 'community_delete';
        var deleteData = {
            _token: token,
            id: id
        };
        ajaxDeleteRequest(deleteUrl, deleteData, function (response) {
            if (response.success) {
                var tr = $('.communityDelete[data-id="' + id + '"]').closest('tr');
                tr.css('background', 'red');
                tr.fadeOut(1000, function () {
                    tr.remove();
                });
            } else {
                alert(response);
            }
        });
        $('#deleteModal').modal('hide');
    });
});
function ajaxDeleteRequest(url,data,successCallback)   {
    $.ajax({
        type: "post",
        url: url,
        data: data,
        success: successCallback,
    });
}
// status update
function ajaxStatusRequest(url,data,successCallback){
    $.ajax({
        type: "post",
        url: url,
        data: data,
        success: successCallback,
    });
}
