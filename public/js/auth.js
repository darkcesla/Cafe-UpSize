$("body").on("contextmenu", "img", function (e) {
    return false;
});
$("img").attr("draggable", false);
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
function auth_content(obj) {
    $("#page_login").hide();
    $("#page_forgot").hide();
    $("#" + obj).show();
}
function content_auth(obj, title) {
    $("#title_auth").html(title);
    $("#main_auth").hide();
    $("#mail_login").hide();
    $("#phone_login").hide();
    $("#register_page").hide();
    $("#forgot_page").hide();
    $("#" + obj).show();
}
$("#form_login").on("keydown", "input", function (event) {
    if (event.which == 13) {
        event.preventDefault();
        var $this = $(event.target);
        var index = parseFloat($this.attr("data-login"));
        var val = $($this).val();
        if (val == 1) {
            $('[data-login="' + (index + 1).toString() + '"]').focus();
        } else {
            $("#tombol_login").trigger("click");
        }
    }
});
$("#email").focus();
function handle_post(tombol, form, url, method) {
    $(tombol).submit(function () {
        return false;
    });
    let data = $(form).serialize();
    $.ajax({
        type: method,
        url: url,
        data: data,
        dataType: "json",
        beforeSend: function () {
            $(tombol).prop("disabled", true);
            $(tombol).attr("data-kt-indicator", "on");
        },
        success: function (result) {
            if (result.status == "success") {
                Swal.fire({
                    text: result.message,
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, Mengerti!",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    },
                }).then(function () {
                    if (result.redirect == "reload") {
                        location.reload();
                    } else {
                        window.location.href = result.redirect;
                    }
                });
                captcha_reload();
            } else {
                Swal.fire({
                    text: result.message,
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, Mengerti!",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    },
                });
                captcha_reload();
            }
            $(tombol).prop("disabled", false);
            $(tombol).removeAttr("data-kt-indicator");
        },
    });
}

function handle_forgot(tombol, form, url, method) {
    $(tombol).submit(function () {
        return false;
    });
    let data = $(form).serialize();
    $.ajax({
        type: method,
        url: url,
        data: data,
        dataType: "json",
        beforeSend: function () {
            $(tombol).prop("disabled", true);
            $(tombol).attr("data-kt-indicator", "on");
        },
        success: function (result) {
            if (result.status == "success") {
                Swal.fire({
                    text: result.message,
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, Mengerti!",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    },
                }).then(function () {
                    $(form)[0].reset();
                    window.location.href = result.redirect;
                });
            } else {
                Swal.fire({
                    text: result.message,
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, Mengerti!",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    },
                });
            }
            captcha_reload();
            $(tombol).prop("disabled", false);
            $(tombol).removeAttr("data-kt-indicator");
        },
    });
}

function captcha_reload() {
    const url = $("#reload").data("url");
    $.ajax({
        url: url,
        type: "GET",
        success: function (response) {
            $("#captcha").html(response.captcha);
        },
    });
}

$("#reload").on("click", function () {
    const url = $(this).data("url");
    $.ajax({
        url: url,
        method: "GET",
        success: function (response) {
            $(".captcha span").html(response.captcha);
        },
    });
});
function main_content(obj) {
    $("#content_list").hide();
    $("#content_input").hide();
    $("#content_detail").hide();
    $("#" + obj).show();
}
function load_list(page) {
    $.get(
        "?page=" + page,
        $("#content_filter").serialize(),
        function (result) {
            $("#list_result").html(result);
            main_content("content_list");
        },
        "html"
    );
}
