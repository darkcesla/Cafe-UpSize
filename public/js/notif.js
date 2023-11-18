function counter_notif(url) {
    $.ajax({
        type: "GET",
        url: url,
        dataType: 'json',
        success: function (response) {
            if (response.total > 0) {
                $('#top-notification-number').html(response.total);
            } else {
                $('#top-notification-number').html(0);
            }
        }
    });
}

function load_notif(url) {
    $.ajax({
        type: "GET",
        url: url,
        dataType: 'json',
        success: function (response) {
            $('#notification_items').html(response.notifications);
            $('#top-notification-number').html(response.total ?? 0);
        },
    });
}
