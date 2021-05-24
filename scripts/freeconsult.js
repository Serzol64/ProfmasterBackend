$(document).ready(function () {
    $('#rec308189190 .tn-elem[data-elem-id="1619273197872"], #rec308189190 .tn-elem[data-elem-id="1619273074469"]').click(StartSend);
    $('form#form308189190').submit(FCSend);
});

const StartSend = (e, t) => {
    $('form#form308189190').trigger('submit');
}
const FCSend = (e,t) => {
    let res = null;
    const queryList = JSON.stringify({customer: $('.t-input').eq(0).val(), phone: $('.t-input').eq(1).val()});
    let point = $('.t-input'),
        query = {queryData: queryList};

    console.log("Ready:" + $('form#form308189190').attr('method'));
    $.ajax({
        type: $('form#form308189190').attr('method'),
        url: "http://f0544597.xsph.ru/aplex/profmasterLanding/freeconsultation.php",
        dataType: 'json',
        data: query,
        beforeSend: function () {
            point.prop('disabled','');
        },
        success: function (data) {
            res = JSON.parse(data);

            if (res[0].result == "OkForm") {
                autoNotification(0);
                point.val('');
                point.removeProp('disabled');
            }

            console.log("Result:" + data);
        },
        error: function (data) {
            autoNotification(1);
            point.removeProp('disabled');

            console.log("Error:" + data);
        }
    });

    e.preventDefault();

}
