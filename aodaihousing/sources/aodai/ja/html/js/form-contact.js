/*
 * 2016/12/01 write:909151
 * class : 
 * required 入力チェック
 * required-peir peirがどれか一つでも入力されていればtrue
 * 
 * phone 電話番号のみtrue
 * email メールアドレスのみtrue
 */
etc_check = {
    'client_type': {
        'required_1': {
            'value': 3,
            'target': 'client_type_etc_text'
        },
        'required_2': {
            'value': 1,
            'target': 'client_company_name'
        }
    }
};

function submit_check() {
    if (check_required().length == 0) {
        // $('#mail_form').submit();
        return true;
    } else {
        return false;
        // sweetAlert("入力内容に誤りがあります", "色つきの必須項目をすべて入力してください", "error");
    }
}

function check_required() {
    var val_list = [];
    val_list = val_list.concat(check_validates('.required'));
    val_list = val_list.concat(check_validates('.required-peir'));
    // parents_heightlight(val_list);
    return val_list;
}

function check_validates(classes) {
    spliter = classes.split('-')[1];
    if (spliter != 'peir') {
        spliter = 'one';
    }
    validate = [];
    targeter = [];
    $(classes).each(function (cn, obj) {
        name = $(this).attr('name');
        if ($.inArray(name, targeter) == -1) {
            targeter.push(name);
        }
    });
    validate = validate_make[spliter](targeter);

    return validate;
}

validate_make = new Array;
validate_make.one = function (check_list) {
    var list = [];
    $.each(check_list, function (i, val) {
        var chval = check(val);
        (chval) ? list.push(chval) : false;
    });
    return list
};
validate_make.peir = function (check_list) {
    var list = [];
    var peir_list = [];
    $.each(check_list, function (i, val) {
        var chval = check(val);
        (chval) ? list.push(chval) : false;
    });
    if (list.length > 1) {
        peir_list = [
            array = [
                list[0][0],
                list[1][0]
            ]
        ];
    }
    return peir_list;
};
function check(name) {
    var list = [];
    switch ($('*[name="' + name + '"]').attr('type')) {
        case 'checkbox':
            if ($("input[name='" + name + "']:checked").length <= 0) {
                list.push(name);
            }
            break;
        case 'radio':
            if ($("input[name='" + name + "']:checked").length != 1) {
                list.push(name);
            }
            break;
        case 'text':
            if (text_check(name)) {
                list.push(name);
            }
            break;
        case 'email':
            if (email_check(name)) {
                list.push(name);
            }
            break;
        case 'phone':
            if (tel_check(name)) {
                list.push(name);
            }
            break;
        default :
            if ($("*[name='" + name + "']").val().length == 0) {
                list.push(name);
            }
            break;
    }
    if (name in etc_check) {
        var chval = $('*[name="' + name + '"]:checked').val();
        $.each(etc_check[name], function (con, obj) {
            if (chval == obj.value) {
                if (text_check(obj.target)) {
                    list.push(obj.target);
                }
            }
        });
    }
    return ($.isEmptyObject(list)) ? undefined : list;
}

/* write function */

function parents_heightlight(light) {
    $.each($('input , textarea'), function () {
        $(this).removeClass('highlight');
        $(this).parents('td').removeClass('highlight');
    });
    $.each(light, function (i, obj) {
        $('*[name = "' + obj[0] + '"]').addClass('highlight');
        $('*[name = "' + obj[0] + '"]').parents('td').addClass('highlight');
    });
}

function nextspan_write(obj, text) {
    obj.after('<span class = "errtext">' + text + ' </span>');
    return true;
}

/* write function */

/* check function */

function text_check(name) {
    if ($("input[name='" + name + "']").val().length == 0) {
        return name;
    }
    return false;
}
function email_check(name) {
    if (($("input[name='" + name + "']").val().length == 0)) {
        return name;
    }
    if (!$("input[name='" + name + "']").val().match(/^[a-zA-Z0-9!$&amp;*.=^`|~#%'+\/?_{}-]+@([a-zA-Z0-9_-]+\.)+[a-zA-Z]{2,4}$/)) {
        return name;
    }
    return false;
}

function tel_check(name) {
    if ($("input[name='" + name + "']").val().length == 0) {
        return name;
    }
    if ($("input[name='" + name + "']").val().match(/^[-09]*$/) !== null) {
        return name;
    }

    if(($("input[name='" + name + "']").val().match(/^[-09]*$/) === null) && ($("input[name='client_email']").val().length !== 0) &&(!$("input[name='client_email']").val().match(/^[a-zA-Z0-9!$&amp;*.=^`|~#%'+\/?_{}-]+@([a-zA-Z0-9_-]+\.)+[a-zA-Z]{2,4}$/))){
        return name;
    }
    return false;
}

/* check function  */

$(function () {
    check_required();

    $('span.errtext').remove();

    $('input ,textarea').on('change keyup', function () {
        check_required();
        $('span.errtext').remove();
    });

    $('input[type="number"]').on('keyup', function (e) {
        m = String.fromCharCode(event.keyCode);
        if (m != 'Backspace') {
            return false;
        }
        return true;
    });
    $('input[type="tel"]').on('keydown', function (e) {
        m = event.key;
        if (isNaN(m)) {
            if (m != 'Backspace') {
                return false;
            }
        }
        return true;
    });

});

function validateNumber() {
    $(".request-number").keydown(function (e) {
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 return;
        }
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
};

$(function (){
    validateNumber();
});


/* -------------------------------------------
 * @namespace
 ------------------------------------------- */
var KAIGAI_STARTS_ADMIN = KAIGAI_STARTS_ADMIN || {};


/* -------------------------------------------
 * @constructor
 ------------------------------------------- */
KAIGAI_STARTS_ADMIN.Util = function () {
    this.$win = $(window);
    this.$doc = $(document);
    this.ua = navigator.userAgent.toLowerCase();
    this.SMART_UA = ['iphone', 'ipad', 'android', 'windows phone'];
    this.pagePath = location.pathname.replace('index.html', '');
    this.pageW = 1140;
    this.breakPoint1 = 640;
    this.breakPoint2 = 767;
    this.responsive = false;
};

/* -------------------------------------------
 * @init
 ------------------------------------------- */
$(function () {
    tgl_budget($('input[name="exchenge_flg"]:checked').val());

    $('input[name="exchenge_flg"]').on('change', function () {
        tgl_budget($('input[name="exchenge_flg"]:checked').val());
    });
});

function tgl_budget($val) {
    if ($val == 1) {
        $('.united_budget').hide();
        $('.united_budget').find('input').prop('disabled', true);

        $('.japan_budget').show();
        $('.japan_budget').find('input').prop('disabled', false);
    } else {
        $('.japan_budget').hide();
        $('.japan_budget').find('input').prop('disabled', true);

        $('.united_budget').show();
        $('.united_budget').find('input').prop('disabled', false);
    }
}


