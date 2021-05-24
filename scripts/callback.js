
$(document).ready(function () {
    $('#rec308189190 .tn-elem[data-elem-id="1619273074425"]').click(CallBackOpen);
});

const CallBackOpen = (e, t) => {
    jivo_api.open({ start : 'call'});
}

