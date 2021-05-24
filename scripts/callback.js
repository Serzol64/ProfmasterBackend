const lb = $('#callback-lightbox');

const autoNotification = (type) => {
    switch (type) {
        case 0:
            $('.backcall').removeClass('nf-close');

            window.setTimeout(function () {
                $('.backcall').addClass('nf-close');
            },8000);
        break;
        case 1:
            $('.feedback').removeClass('nf-close');

            window.setTimeout(function () {
                $('.feedback').addClass('nf-close');
            },10000);
        break;
        
    }
}

$(document).ready(function () {
    $('#rec308189190 .tn-elem[data-elem-id="1619273074425"]').click(CallBackOpen);
    $('#callback-lightbox > .lb-h .lb_close').click(CallBackClose);
    $('#callback-lightbox > .lb main form').submit(CBFSend);
});

const CallBackOpen = (e, t) => {
    lb.removeClass("lb_closed");
}
const CallBackClose = (e, t) => {
    lb.addClass("lb_closed");
}
const CBFSend = (e,t) => {
    let res = null;
    let points = [
        $('#callback-lightbox > .lb-h .lb_close'),
        $('#callback-lightbox > .lb main form div input, #callback-lightbox > .lb main form div button'),
        $('#callback-lightbox > .lb main form div input')
    ],
        query = {phone: $('phone').val()};

    $.ajax({
        type: "POST",
        url: "http://f0544597.xsph.ru/aplex/profmasterLanding/backcall.php",
        dataType: 'json',
        data: query,
        beforeSend: function () {
            points[1].prop('disabled','');
        },
        success: function (data) {
            res = $.parseJSON(data);

            if (res.result === "OkSend") {
                autoNotification(0);
                points[0].trigger('click');
                points[2].val('');
                points[1].removeProp('disabled');

            }
        },
        error: function () {
            autoNotification(1);
            points[0].trigger('click');
            points[1].removeProp('disabled');
        }
    });

    return false;

}

