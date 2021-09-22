function notificationList() {
    $('.notification-list').empty();
    var token = $('#csrfToken1').val();
    var baseUrl = $('#baseUrl').val();
    var notificationUrl = baseUrl+"/admin/notifications/list"
    $.ajax({
        type:'POST',
        url: notificationUrl,
        data: {
            _token: token,
        },
        success:function(data) {
            if(data.length > 0) {
                $('.notification-list').html(data);
            } else {
                $('.notification-list').html(`<span style="padding: 123px;"> No Notifications </span>`);
            }
        }
    });

}
notificationList();
setInterval(notificationList, 10000);