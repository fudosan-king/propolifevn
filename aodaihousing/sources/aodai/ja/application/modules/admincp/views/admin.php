<?php foreach ($admin as $tt) {?>
    <tr>
        <td><?php echo $tt['username']?></td>
        <td><?php echo $tt['password']?></td>
    </tr>
<?php } ?>
<?php echo vcp_printf($tt->title, current_lang_())?>
