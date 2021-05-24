$(document).ready(function () {
    $('#rec308189190 .tn-elem[data-elem-id="1619273197872"], #rec308189190 .tn-elem[data-elem-id="1619273074469"]').click(StartSend);
    $('form#form308189190').submit(FCSend);
});

const StartSend = (e, t) => {
    $('form#form308189190').trigger('submit');
}
const FCSend = (e,t) => {
    

    e.preventDefault();

}
