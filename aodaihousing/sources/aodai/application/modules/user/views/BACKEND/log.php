<script type="text/javascript">
function searchContent(start,per_page){
}
</script>
<?php if($logs):?>
<div class="table" id="indexView">
	<div class="head_table">
		<div class="head_title_table">Thống kê: <?php echo $user->username;?></div>
    </div>
    <div class="clearAll"></div>
    
    <div class="content_table">
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <thead>
                <tr>
                    <td>Code</td>
                    <td>Valid</td>
                    <td>Time</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($logs as $row):?>
                <tr>
                    <td><?php echo $row->code;?></td>
                    <td style="text-align: center;"><img src="<?php echo PATH_URL_IMAGES.'static/images/admin/icons/'?><?php ($row->status==0) ? print 'uncheck_16x16.png' : print 'check_16x16.png' ?>" /></td>
                    <td><?php echo $row->created;?></td>
                </tr>
                <?php endforeach;?>
                
            </tbody>
        </table>
    </div>
</div>
<?php endif; ?>
<br /><br />