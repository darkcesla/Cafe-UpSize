// $("body").on("contextmenu", "img", (e) => {return false});
// var audio = document.getElementById("audio");
// $('img').attr('draggable', false);
// $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
// $(document).ready(() => { $(window).keydown((event) => { (event.keyCode == 13) ? event.preventDefault() : false }) });
// let page, split;
// $(window).on('hashchange',() => (window.location.hash) ? [page = window.location.hash.replace('#', '') , (page == Number.NaN || page <= 0) ? false : load_list(page)] : false);
// const main_content = (obj) => {$("#content_list").hide(), $("#content_input").hide(), $("#" + obj).show()};
// const load_list = (page) => {$.get('?page=' + page, $('#content_filter').serialize(), (result) => { $('#list_result').html(result), main_content('content_list')}, "html")};
// $(document).ready(() => $(document).on('click', '.paginasi', (event) => [page = event.target.attributes[1].value, split = page.split('page=')[1], event.preventDefault() , load_list(split)]));
// const load_input = (url) => { $.get(url, {}, (result) => { $('#content_input').html(result), main_content('content_input')}, "html")};
// const handle_open_modal = (url, modal,content) => $.ajax({ type: "POST", url: url, success: (html) => { $(modal).modal('show'), $(content).html(html)}, error: () => { $(content).html('<h3>Ajax Bermasalah !!!</h3>')}});
// const handle_save = (tombol,form,url,method) => [$(tombol).submit(() => { return false}), data = $(form).serialize(), $(tombol).prop("disabled", true), $.ajax({type: method, url: url,data: data,dataType: 'json',beforeSend:() => {},success: (response) => {(response.status == "success") ? success_toastr(response.message) && $(form)[0].reset() && $(tombol).prop("disabled", false) (response.redirect == "input") ? load_input(response.route) : (response.redirect == "reload") ?? location.reload() : setTimeout(() => {load_list(1)},2000)}})];
// const handle_upload = (tombol,form,url,method) => { $(document).one('submit', form, (e) => {[e.preventDefault(), data = new FormData(document.getElementById(e.target.id)), data.append('_method',method), $(tombol).prop("disabled", true), $.ajax({type:'POST', url:url,data: data,enctype: 'multipart/form-data',cache: false,contentType: false,resetForm: true,processData: false,dataType: 'json',beforeSend: () => {},success: (response) => {(response.status == "success") ? [success_toastr(response.message), $(form)[0].reset(), load_list(1), $("#customModal").modal('hide')] : [error_toastr(response.message) , setTimeout(() => { $(tombol).prop("disabled", false)}, 2000)]}})]})};
// const handle_confirm = (title, confirm_title, deny_title, method, route) => Swal.fire({ title: title, showDenyButton: true, showCancelButton: false, confirmButtonText: confirm_title, denyButtonText: deny_title}).then((result) => { (result.isConfirmed) ? [id = [], $(':checkbox:checked').each((i) => {id[i] = $(this).val()}) (id.length === 0) ? Swal.fire('Please Select atleast one checkbox', '', 'info') : $.ajax({type: method,url: route,data: {id: id},dataType: 'json',success: (response) => { (response.redirect == "cart") ? load_cart(localStorage.getItem("route_cart")) : (response.redirect == "reload") ?? location.reload() ,load_list(1), Swal.fire(response.message, '', response.status)}})] : Swal.fire('Konfirmasi dibatalkan', '', 'info')});
$("body").on("contextmenu", "img", function (e) {
    return false;
});
var audio = document.getElementById("audio");
$('img').attr('draggable', false);
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
    $(window).keydown(function (event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            load_list(1);
        }
    });
});
let page;
$(window).on('hashchange', function () {
    if (window.location.hash) {
        page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        } else {
            load_list(page);
        }
    }
});
$(document).ready(function () {
    $(document).on('click', '.paginasi', function (event) {
        event.preventDefault();
        $('.paginasi').removeClass('active');
        $(this).parent('.paginasi').addClass('active');
        // var myurl = $(this).attr('href');
        page = $(this).attr('halaman').split('page=')[1];
        load_list(page);
    });
});

function main_content(obj) {
    $("#content_list").hide();
    $("#content_input").hide();
    $("#content_detail").hide();
    $("#" + obj).show();
}

function load_data(url) {
    $.get(url, function (data) {
        $('#list_result').html(data);
        main_content('content_list');
    }, "html");
}

function load_list(page) {
    $.get('?page=' + page, $('#content_filter').serialize(), function (result) {
        $('#list_result').html(result);
        main_content('content_list');
    }, "html");
}

function load_input(url) {
    $.get(url, {}, function (result) {
        $('#content_input').html(result);
        main_content('content_input');
    }, "html");
}

function load_detail(url) {
    $.get(url, {}, function (result) {
        $('#content_detail').html(result);
        main_content('content_detail');
    }, "html");
}



function handle_open_drawer(url, content, method) {
    $.ajax({
        type: method,
        url: url,
        success: function (html) {
            $(content).html(html);
        },
        error: function () {
            $(content).html('<h3>Ajax Bermasalah !!!</h3>')
        },
    });
}

function handle_save(tombol, form, url, method) {
    $(tombol).submit(function () {
        return false;
    });
    let data = $(form).serialize();
    $(tombol).prop("disabled", true);
    $.ajax({
        type: method,
        url: url,
        data: data,
        dataType: 'json',
        beforeSend: function () {
            $(tombol).prop("disabled", true);
            $(tombol).attr("data-kt-indicator", "on");
        },
        success: function (response) {
            if (response.status == "success") {
                success_toastr(response.message);
                $(form)[0].reset();
                $(tombol).prop("disabled", false);
                load_list(1);
            } else {
                error_toastr(response.message);
                setTimeout(function () {
                    $(tombol).prop("disabled", false);
                }, 2000);
            }
        },
    });
}

function handle_save_modal(tombol, form, url, method, modal) {
    $(tombol).submit(function () {
        return false;
    });
    let data = $(form).serialize();

    $.ajax({
        type: method,
        url: url,
        data: data,
        dataType: 'json',
        beforeSend: function () {
            $(tombol).prop("disabled", true);
            $(tombol).attr("data-kt-indicator", "on");
        },
        success: function (response) {
            if (response.status == "success") {
                Swal.fire({
                    text: response.message,
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, Mengerti!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
                $(form)[0].reset();
                load_list(1);
                setTimeout(function () {
                    $(modal).modal('hide');
                    $(tombol).prop("disabled", false);
                    $(tombol).removeAttr("data-kt-indicator");
                }, 2000);
            } else {
                Swal.fire({
                    text: response.message,
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, Mengerti!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
                setTimeout(function () {
                    $(tombol).prop("disabled", false);
                    $(tombol).removeAttr("data-kt-indicator");
                }, 2000);
            }
        },
    });
}

function handle_confirm(title, confirm_title, deny_title, method, route) {
    Swal.fire({
        title: title,
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: confirm_title,
        denyButtonText: deny_title,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: method,
                url: route,
                dataType: 'json',
                success: function (response) {
                    if (response.redirect == "cart") {
                        load_cart(localStorage.getItem("route_cart"));
                    } else if (response.redirect == "reload") {
                        location.reload();
                    } else {
                        load_list(1);
                    }
                    Swal.fire(response.message, '', response.status)
                }
            });
        } else if (result.isDenied) {
            Swal.fire('Konfirmasi dibatalkan', '', 'info')
        }
    });
}

function handle_confirm_checked(title, confirm_title, deny_title, method, route) {
    Swal.fire({
        title: title,
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: confirm_title,
        denyButtonText: deny_title,
    }).then((result) => {
        if (result.isConfirmed) {
            var id = [];
            $('input[name="id[]"]:checkbox:checked').each(function (i) {
                id[i] = $(this).val();
            });
            if (id.length === 0) {
                Swal.fire('Please Select atleast one checkbox', '', 'info')
            } else {
                $.ajax({
                    type: method,
                    url: route,
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function (response) {
                        load_list(1);
                        Swal.fire(response.message, '', response.status)
                    }
                });
            }
        } else if (result.isDenied) {
            Swal.fire('Konfirmasi dibatalkan', '', 'info')
        }
    });
}

function handle_upload(tombol, form, url, method) {
    $(document).one('submit', form, function (e) {
        let data = new FormData(this);
        data.append('_method', method);
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            resetForm: true,
            processData: false,
            dataType: 'json',
            beforeSend: function () {
                $(tombol).prop("disabled", true);
                $(tombol).attr("data-kt-indicator", "on");
            },
            success: function (response) {
                if (response.status == "error") {
                    Swal.fire({
                        text: response.message,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        },
                    });
                } else {
                    Swal.fire({
                        text: response.message,
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        },
                    }).then(function (result) {
                        if (result.isConfirmed) {
                            $(form)[0].reset();
                        window.location.href = response.redirect;
                        }
                    });
                }
            },
        });
        return false;
    });
}

function send_chat(tombol, form, url, method) {
    $(document).one('submit', form, function (e) {
        let data = new FormData(this);
        data.append('_method', method);
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            resetForm: true,
            processData: false,
            dataType: 'json',
            beforeSend: function () {

            },
            success: function (response) {
                if (response.status == "success") {
                    $(form)[0].reset();
                    load_list(1);
                } else {
                    error_toastr(response.message);
                    setTimeout(function () {
                        $(tombol).prop("disabled", false);
                    }, 2000);
                }
            },
        });
        return false;
    });
}

function handle_download(tombol, url) {
    $(tombol).prop("disabled", true);   
    $(tombol).attr("data-kt-indicator", "on");
    $.get(url, function (result) {
        if (result.status == "success") {
            // $(download).attr({target: '_blank', href  : result.url, 'download' : result.url});
            // var href = $('.cssbuttongo').attr('href');
            window.open(result.url, '_blank');
            window.open(result.url1, '_blank');
            window.open(result.url2, '_blank');
            Swal.fire({
                text: result.message,
                icon: "success",
                buttonsStyling: !1,
                confirmButtonText: "Ok, Mengerti!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            }).then(function () {
                load_list(1);
            });
        } else {
            Swal.fire({
                text: result.message,
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "Ok, Mengerti!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
        }
        $(tombol).prop("disabled", false);
        $(tombol).removeAttr("data-kt-indicator");
    }, "json");
}

function handle_create(tombol, form, url, method) {
    $(document).one('submit', form, function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Apakah anda yakin?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Ya',
            denyButtonText: 'Tidak',
        }).then((result) => {
            if (result.isConfirmed) {
                var formData = new FormData($(form)[0]);
                $.ajax({
                    url: url,
                    type: method,
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $(tombol).prop("disabled", true);
                        $(tombol).attr("data-kt-indicator", "on");
                    },
                    success: function (response) {
                        if (response.status == 'success') {
                            Swal.fire({
                                title: 'Success',
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'Ok',
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                            }).then((result) => {
                                if (result.value) {
                                    $('#result').removeClass('d-none');
                                    $('#pilih').text(response.output);
                                    $('#tombol').addClass('d-none');
                                    $('#input').addClass('d-none');
                                }
                            });
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: response.message,
                                icon: 'error',
                                confirmButtonText: 'Ok',
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                            });
                        }
                        $(tombol).prop("disabled", false);
                        $(tombol).attr("data-kt-indicator", "off");
                    },
                });
            } else if (result.isDenied) {
                Swal.fire('Konfirmasi dibatalkan', '', 'info')
            }
        });
    });
}
