<script type="text/javascript" src="<?=PATH_URL.'static/'?>plugin/elfinder/js/elfinder.min.js"></script>
<script type="text/javascript" src="<?=PATH_URL.'static/'?>plugin/elfinder/js/i18n/elfinder.ru.js"></script>

<script type="text/javascript" charset="utf-8">
$().ready(function() {
	var elf = $('#elfinder').elfinder({
		url : root +'static/plugin/elfinder/php/connector.php'  // connector URL (REQUIRED)
		// lang: 'ru',             // language (OPTIONAL)
	}).elfinder('instance');
});
</script>
<div class="content_table">
	<div id="elfinder"></div>
</div>
<style type="text/css">
.elfinder-dialog {
    position: absolute !important;
}
</style>