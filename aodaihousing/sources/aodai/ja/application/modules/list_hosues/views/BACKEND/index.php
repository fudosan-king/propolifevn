<input type="hidden" value="<?= $this->session->userdata('start') ?>" id="start" />
<input type="hidden" value="<?= $default_func ?>" id="func_sort" />
<input type="hidden" value="<?= $default_sort ?>" id="type_sort" />
<div id="indexView" class="table">
    <div class="head_table">
        <!--<div class="web-mail">
           <a class="iframe" href="<?= PATH_URL ?>admincp/houses/popup">web mail</a>
           <div class="language-w">
               <a href='<?php echo change_lang(''); ?>' class="japanese">Japanese</a>
               <a href='<?php echo change_lang('vn'); ?>' class="vietnamese">Vietnamese</a>
           </div>
       </div>-->
        <div class="head_title_table"><?= $module ?></div>
        <div class="head_search">
            <div class="head_search_title fontface" style="margin-top: 9px">Search | </div>
            <div class="head_search_title">From Price:</div>
            <div class="head_search_input">

                <input onkeypress="return enterSearch(event)" class="validate[custom[onlyNumberSp]]" width="100%" value="" type="text" name="price_from" id="price_from" />
            </div>
            <div class="head_search_title">To Price:</div>
            <div class="head_search_input">

                <input onkeypress="return enterSearch(event)" class="validate[custom[onlyNumberSp]]" width="100%" value="" type="text" name="price_to" id="price_to" />
            </div>
            <div class="head_search_title">From Date:</div>
            <div class="head_search_input"><input onkeypress="return enterSearch(event)" id="caledar_from" type="text" /></div>
            <div class="head_search_title">To:</div>
            <div class="head_search_input"><input onkeypress="return enterSearch(event)" id="caledar_to" type="text" /></div>
            <div class="head_search_title">建物名:</div>
            <div class="head_search_input"><input style="width: 100px !important;" onkeypress="return enterSearch(event)" id="title" class="input_last" type="text" value="" /></div>
            <div class="head_search_title">Content:</div>
            <div class="head_search_input"><input style="width: 100px !important;" onkeypress="return enterSearch(event)" id="search_content" onclick="if (this.value == 'type here...') {
                        this.value = ''
                    }" onblur="if (this.value == '') {
                                this.value = 'type here...'
                            }" class="input_last" type="text" value="type here..." /></div>
            <div class="midNav" style="margin-left: 10px; margin-top: 8px">
                <ul>
                    <li style="margin-right: -5px;"><a onclick="searchContent(0)" href="#">
                            <span class="search" style="padding: 17px 25px 3px ! important;"></span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clearAll"></div>

    <div id="ajax_loadContent"><img class="loading" alt="Ajax Loader" src="<?= PATH_URL . 'static/images/admin/ajax-loader.gif' ?>" /></div>
</div>
<script>
    $(".iframe1").fancybox({
        'width': '790px',
        'autoScale': false,
        'transitionIn': 'none',
        'transitionOut': 'none',
        'type': 'iframe',
        'closeBtn': true
    });

</script>