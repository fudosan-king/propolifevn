<div class="news-wrapp news-wrapp-mobile">
    <?php if($item->tag_h1 != ""): ?>
        <?php if(strstr($item->tag_h1, 'none')): ?>
            <div style="display: none;"  class="h1-title"><h1><?=$item->tag_h1; ?></h1></div>
        <?php else: ?>
            <div  class="h1-title"><h1><?=$item->tag_h1; ?></h1></div>
        <?php endif; ?>
    <?php endif; ?>
    
    <h4 class="news-title"><?=vcp_printf($item->title, current_lang_()); ?></h4>
    <div class="detail-news">
        <?php
            if ($this->uri->segment(2)=='ベトナム ホーチミン 内装工事 オフィス店舗デザイン・設計施工' || $this->uri->segment(2)=='オフィス店舗デザイン・設計施工の流れ') {
                echo $this->load->view('FRONTEND/parallax_device');
            } else if ($this->uri->segment(2)=='html_parallax2') {
                echo $this->load->view('FRONTEND/parallax_device2');
            } else {
                $domain_replace             = 'http://aodaihousing.com/';
                $domain_replace1            = 'https://aodaihousing.com';
                $domain_replace2            = PATH_URL . '/';
                $domain_replace3            = PATH_URL . 'static';
                $domain_need_replace_new    = PATH_URL;
                $domain_need_replace_images = PATH_URL_IMAGES . 'static';
                $item_new                   = vcp_printf($item->content, current_lang_());
                $item_new                   = str_replace($domain_replace, $domain_need_replace_new, $item_new);
                $item_new                   = str_replace($domain_replace1, $domain_need_replace_new, $item_new);
                $item_new                   = str_replace($domain_replace2, $domain_need_replace_new, $item_new);
                $item_new                   = str_replace($domain_replace3, $domain_need_replace_images, $item_new);
                if(isset($id) && $id == 266){
                    $item_new = '';
                }
                echo $item_new;
            }
        ?>
    </div>
</div>
<style type="text/css">
.main-left .content-search{
    display: none;
}
</style>
