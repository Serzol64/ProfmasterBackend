$(document).ready(function () {
    $('#rec308189190 .tn-elem[data-elem-id="1619273197872"], #rec308189190 .tn-elem[data-elem-id="1619273074469"]').click(StartSend);
    $('form#form308189190').submit(FCSend);
});

const StartSend = (e, t) => {
    $('form#form308189190').trigger('submit');
}
const FCSend = (e,t) => {
    let res = null;
    const queryList = JSON.stringify({customer : $('.t-input').eq(0).val(), phone: $('.t-input').eq(1).val()});
    let point = $('.t-input'),
        query ="queryData=" + queryList;

    $.ajax({
        type: "POST",
        url: "http://f0544597.xsph.ru/aplex/profmasterLanding/freeconsultation.php",
        dataType: 'json',
        data: query,
        beforeSend: function () {
            point.prop('disabled','');
        },
        success: function (data) {
            res = $.parseJSON(data);

            if (res.result == "OkForm") {
                autoNotification(0);
                point.val('');
                point.removeProp('disabled');

            }
        },
        error: function () {
            autoNotification(1);
            point.removeProp('disabled');
        }
    });

    return false;

}
