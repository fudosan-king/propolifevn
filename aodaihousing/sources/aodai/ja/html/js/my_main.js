var is_chrome = !!window.chrome && !is_opera;
var is_explorer = /*@cc_on!@*/ false || !!document.documentMode;
var isEdge = !is_explorer && !!window.StyleMedia;
var is_firefox = typeof window.InstallTrigger !== 'undefined';
var is_safari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
var is_opera = !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;

function searchBy(houseOrOffice) { $('#opt').val(houseOrOffice); var txtSearch = ''; var txtSort = ''; var lblMin = ''; var lblMax = ''; var cboAreaName = ''; var cboSize = ''; var cboRentSelect = ''; if (houseOrOffice == 'house') { var cboLayOut = $('input[name="cboLayOut"]').val(); var cboType = $('input[name="cboType"]').val(); var cboCondo = $('input[name="cboCondo"]').val(); var cboService_aprtment = $('input[name="cboService_aprtment"]').val(); if (!cboLayOut) { cboLayOut = ''; } if (!cboType) { cboType = ''; } if (!cboCondo) { cboCondo = ''; } if (!cboService_aprtment) { cboService_aprtment = ''; } } if (houseOrOffice == 'office') { var cboSizeRentSelect = $('input[name="cboSizeRentSelect"]').val(); var cboChairSelect = $('input[name="cboChairSelect"]').val(); if (!cboSizeRentSelect) { cboSizeRentSelect = ''; } if (!cboChairSelect) { cboChairSelect = ''; } } var url = '?' + 'opt=' + houseOrOffice + '&txtSearch=' + txtSearch + '&txtSort=' + txtSort + '&lblMin=' + lblMin + '&lblMax=' + lblMax + '&cboAreaName=' + cboAreaName + '&cboSize=' + cboSize + '&cboRentSelect=' + cboRentSelect; if (houseOrOffice == 'house') { url += '&cboLayOut=' + cboLayOut;
        url += '&cboType=' + cboType;
        url += '&cboCondo=' + cboCondo;
        url += '&cboService_aprtment=' + cboService_aprtment; } if (houseOrOffice == 'office') { url += '&cboSizeRentSelect=' + cboSizeRentSelect;
        url += '&cboChairSelect=' + cboChairSelect; } var pathname = window.location.pathname; var arr_pathname = pathname.split('/'); var hostname = window.location.hostname; var arr_pathname_first = arr_pathname[3]; var arr_pathname_second = arr_pathname[4]; var is_product = false; var get_language = arr_pathname[2]; if (arr_pathname_first == 'detail' || arr_pathname_second == 'detail') { if (get_language === 'vn') { if (is_product) { pathname = '/' + get_language + '/search/list_data'; } else { pathname = '/' + arr_pathname[1] + '/' + get_language + '/search/list_data'; } } else { if (is_product) { pathname = '/search/list_data'; } else { pathname = '/' + arr_pathname[1] + '/search/list_data'; } } } else if (arr_pathname_first == "最新賃貸物件" || arr_pathname_second == "最新賃貸物件" || arr_pathname_first == "2区アパートメント特集" || arr_pathname_second == "2区アパートメント特集" || arr_pathname_first == "ホーチミン3区サービスアパート特集" || arr_pathname_second == "ホーチミン3区サービスアパート特集" || arr_pathname_first == "フーミーフン7区アパート" || arr_pathname_second == "フーミーフン7区アパート" || arr_pathname_first == "ホーチミン単身向け450USD以下アパート特集" || arr_pathname_second == "ホーチミン単身向け450USD以下アパート特集" || arr_pathname_first == "%E6%9C%80%E6%96%B0%E8%B3%83%E8%B2%B8%E7%89%A9%E4%BB%B6" || arr_pathname_second == "%E6%9C%80%E6%96%B0%E8%B3%83%E8%B2%B8%E7%89%A9%E4%BB%B6" || arr_pathname_first == "2%E5%8C%BA%E3%82%A2%E3%83%91%E3%83%BC%E3%83%88%E3%83%A1%E3%83%B3%E3%83%88%E7%89%B9%E9%9B%86" || arr_pathname_second == "2%E5%8C%BA%E3%82%A2%E3%83%91%E3%83%BC%E3%83%88%E3%83%A1%E3%83%B3%E3%83%88%E7%89%B9%E9%9B%86" || arr_pathname_first == "%E3%83%9B%E3%83%BC%E3%83%81%E3%83%9F%E3%83%B33%E5%8C%BA%E3%82%B5%E3%83%BC%E3%83%93%E3%82%B9%E3%82%A2%E3%83%91%E3%83%BC%E3%83%88%E7%89%B9%E9%9B%86" || arr_pathname_second == "%E3%83%9B%E3%83%BC%E3%83%81%E3%83%9F%E3%83%B33%E5%8C%BA%E3%82%B5%E3%83%BC%E3%83%93%E3%82%B9%E3%82%A2%E3%83%91%E3%83%BC%E3%83%88%E7%89%B9%E9%9B%86" || arr_pathname_first == "%E3%83%95%E3%83%BC%E3%83%9F%E3%83%BC%E3%83%95%E3%83%B37%E5%8C%BA%E3%82%A2%E3%83%91%E3%83%BC%E3%83%88" || arr_pathname_second == "%E3%83%95%E3%83%BC%E3%83%9F%E3%83%BC%E3%83%95%E3%83%B37%E5%8C%BA%E3%82%A2%E3%83%91%E3%83%BC%E3%83%88" || arr_pathname_first == "%E3%83%9B%E3%83%BC%E3%83%81%E3%83%9F%E3%83%B3%E5%8D%98%E8%BA%AB%E5%90%91%E3%81%91450USD%E4%BB%A5%E4%B8%8B%E3%82%A2%E3%83%91%E3%83%BC%E3%83%88%E7%89%B9%E9%9B%86" || arr_pathname_second == "%E3%83%9B%E3%83%BC%E3%83%81%E3%83%9F%E3%83%B3%E5%8D%98%E8%BA%AB%E5%90%91%E3%81%91450USD%E4%BB%A5%E4%B8%8B%E3%82%A2%E3%83%91%E3%83%BC%E3%83%88%E7%89%B9%E9%9B%86") { if (get_language === 'vn') { if (is_product) { pathname = '/' + get_language + '/'; } else { pathname = '/' + arr_pathname[1] + '/' + get_language + '/'; } } else { if (is_product) { pathname = '/'; } else { pathname = '/' + arr_pathname[1]; } } } else { if (houseOrOffice == 'house') { pathname = pathname.replace('offices', 'houses'); } else if (houseOrOffice == 'office') { pathname = pathname.replace('houses', 'offices'); } } window.location.href = window.location.origin + pathname + url; }

function resetSearchForm() { $('#areadf').text('エリア');
    $('#layoutdf').text('住居タイプ');
    $('#typedf').text('間取り');
    $('#sizedf').text('面積');
    $('#apartmentdf').text('特集マンション名から探す');
    $('#servicedf').text('特集サービスアパート名から探す');
    $('#condodf').text('特集マンション名から探す');
    $('#sizeRentdf').text('㎡単価（USD/㎡）');
    $('#chairtdf').text('席数');
    $('#rentdf').text('賃料');
    $("input:text").val("");
    $("input:hidden").each(function() { if (($(this).val() === 'office') || (($(this).val() === 'house'))) {} else { $(this).val(''); } }); } $("#contactModal").on("hidden.bs.modal", function(e) {
    var src = $(".iframeContact").attr("src")
    $(".iframeContact").attr("src", src);
});

$(document).ready(function() {
        $("#summitCondo").click(function () {
            $('#servicedf').text('特集サービスアパート名から探す');
            $('#cboService').val('');
            $("#myform").submit();
        });
        $("#summitService").click(function () {
            $('#condodf').text('特集マンション名から探す');
            $('#cboCondo').val('');
            $("#myform").submit();
        });
});