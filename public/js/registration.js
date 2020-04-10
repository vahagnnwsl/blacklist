var juridicalUnAllowInputs = [

    'full_name',
    'ie_name',
    'passport',
    'psrnie',
];

var individualUnAllowInputs = [
    'full_name',
    'company_name',
    'passport',
    'psrn',
];
var naturalUnAllowInputs = [
    'ie_name',
    'company_name',
    'psrn',
    'psrnie',
    'document',
    'brand',
    'contact_person_position',
];
$('.con').hide();

$("[name='type']").change(function () {
    var array = [];
    $('.con').show();
    if (Number($(this).val()) === 1) {
        array = juridicalUnAllowInputs;
    } else if (Number($(this).val()) === 2) {
        array = naturalUnAllowInputs;
    } else {
        array = individualUnAllowInputs;
    }

    $.each($('.con'), function (index, el) {
        $(el).find('input').attr('required','required');
        $(el).find('input').removeAttr('disabled');
    });

    $.each(array, function (index, value) {
        $('#' + value ).hide();
        $('#' + value).find('input').removeAttr('required');
        $('#' + value).find('input').attr('disabled','disabled');

    });

});

