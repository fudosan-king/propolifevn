<input type="hidden" value="<?= $start ?>" id="start" />
<div class="content_table">
    <table cellspacing="0" cellpadding="0" border="0" width="100%">
        <tr>
            <th class="th_no_cursor" width="40">No.</th>
            <th class="th_no_cursor" width="31"><input type="checkbox" class="custom_chk" id="selectAllItems" onclick="selectAllItems_popup(<?= count($result) ?>)" /></th>
            <th class="th_left" onclick="sort('name_jp')"><div id="title" class="sort icon_no_sort">建物名（日本語読み）</div></th>
        <th class="th_left" onclick="sort('images_thumb')"><div id="title" class="sort icon_no_sort">サムネイル写真</div></th>
        <th width="70" onclick="sort('status')"><div id="status" class="sort icon_no_sort">Status</div></th>
        <th width="70"><div class="sort icon_no_sort">Delete</div></th>     
        <th class="th_last" width="100" onclick="sort('update')"><div id="created" class="sort icon_sort_asc">Updated</div></th>
        </tr>
        <?php
        if ($result) {
            $i = 0;
            foreach ($result as $k => $v) {
                ?>
                <tr class="item_row<?= $i ?> <?php ($k % 2 == 0) ? print 'row1' : print 'row2' ?>">
                    <td class="td_center"><?= $k + 1 + $start ?></td>
                    <td class="td_no_padd"><input type="checkbox" class="custom_chk" id="item<?= $i ?>" onclick="selectItem_popup(<?= $i ?>,<?= $v->id ?>)" value="<?= $v->id ?>" /></td>
                    <td class="th_left td_action">
                        <a href="<?= PATH_URL . 'admincp/' . $module . '/update/' . $v->id ?>"><?= vcp_printf($v->name_jp, 'jp') ?></a>
                    </td>
                    <td class="td_center"><a href="<?= PATH_URL . 'admincp/' . $module . '/update/' . $v->id ?>"><img width="150" src="<?= PATH_URL_IMAGES ?>static/uploads/houses/<?= $v->images_thumb; ?>" /></a></td>
                    <td class="td_center" id="loadStatusID_<?= $v->id ?>"><a href="javascript:void(0)" onclick="updateStatus(<?= $v->id ?>,<?= $v->status ?>, '<?= $module ?>')"><img alt="Checked item" src="<?= PATH_URL_IMAGES . 'static/images/admin/icons/' ?><?php ($v->status == 0) ? print 'uncheck_16x16.png' : print 'check_16x16.png' ?>" /></a></td>

                    <td class="td_center">
                        <img class="delete" onclick="deleteItem(<?= $v->id ?>)" alt="Delete item" src="<?= PATH_URL_IMAGES . 'static/images/admin/icons/icon_delete.png' ?>" />
                    </td>
                    <?php
                    $date_current = $v->update == '' ? $v->created : $v->update;
                    ?>
                    <td class="th_last td_center"><?= date('Y-m-d', strtotime($v->created)) ?></td>
                </tr>
                <?php $i++;
            }
        } else { ?>
            <tr class="row1">
                <td class="th_last td_center" colspan="50" style="font-size: 20px; padding: 50px 0">No data</td>
            </tr>
<?php } ?>
    </table>
</div>

<?php if ($result) { ?>
    <div class="footer_table">
        <div class="item_per_page">Items per page:</div>
        <div class="select_per_page">
            <select id="per_page" onchange="searchContent(<?= $start ?>, this.value)">
                <option <?php ($per_page == 10) ? print 'selected="selected"' : print '' ?> value="10">10</option>
                <option <?php ($per_page == 25) ? print 'selected="selected"' : print '' ?> value="25">25</option>
                <option <?php ($per_page == 50) ? print 'selected="selected"' : print '' ?> value="50">50</option>
                <option <?php ($per_page == 100) ? print 'selected="selected"' : print '' ?> value="100">100</option>
            </select>
        </div>

        <div class="pagination"><?= $this->adminpagination->create_links(); ?></div>
    </div>
    <div class="clearAll"></div>
<?php } ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('.th_left').parent().css("cursor", "pointer")
        $('.th_left').click(function() {
            var checkbox = $(this).parent().find("input");
            console.log(checkbox);
            checkbox.trigger( "click" );
        });
    });
</script>