<div class="news-wrapp">
    <h4 class="news-title"><?=$item->title?></h4>
    <div class="date-post"><span>投稿日:</span><span class="date"><?=date("Y", strtotime($item->created))?>年<?=date("m", strtotime($item->created))?>月<?=date("d", strtotime($item->created))?>日</span></div>
    <div class="detail-news">
        <?=$item->content?>
    </div>
</div>
<style type="text/css">
.main-left .content-search{
    display: none;
}
</style>