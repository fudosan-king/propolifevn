<div class="news-wrapp list">
            
    <div class="navi">
    <?php if(!empty($nextRecord)): ?>
        <span><a href="<?=PATH_URL. 'news/' . $nextRecord->id.'/'.vcp_printf($nextRecord->title, 'jp');?>">&lsaquo;&lsaquo;前へ </a></span>
    <?php endif; ?>
    
    <?php if(!empty($prevRecord)): ?>
        <span><a href="<?=PATH_URL. 'news/' . $prevRecord->id.'/'.vcp_printf($prevRecord->title, 'jp');?>">次へ&rsaquo;&rsaquo; </a></span>
    <?php endif; ?>
    </div>
    <div  class="h1-title"><h1>ホーチミン最大級の賃貸不動産会社┃ベトナム進出支援┃アオザイハウジング</h1></div>
    
    <?php if(!empty($item)): ?>
        <?php
            if(isset($item) && $item != false) {
                $domain_www              = 'www.aodaihousing.com/';
                $domain_http             = 'http://';
                $domain_https_www        = 'https://www.';
                $domain_https            = 'https://';
                $domain_replace          = 'https://aodaihousing.com';
                $domain_need_replace_new = PATH_URL.'/';
                $domain_need_replace     = 'https://aodaihousing.com/';
                $domain_jp_need_replace  = 'https://aodaihousing.com/jp/';
                $path_need_replace       = PATH_URL;
                $path_need_images        = PATH_URL_IMAGES . 'static';
                $domain_detail_cate_old  = 'search?opt=house&catid';
                $domain_detail_cate_new  = 'houses/house_detail_by_condition_all?catid';
                $domain_demo             = 'https://demo.aodaihousing.com/';
                $domain_ja               = 'https://aodaihousing.com/ja/ja/';
                $domain_ja_slash         = 'https://aodaihousing.com/ja//';
                $domain_renewal          = 'https://renewal.aodaihousing.com/';
                $domain_ja_ja            = PATH_URL.'ja/';
                $domain_images           = PATH_URL.'static';
                if (current_lang()== 'vn') {
                    $path_need_replace .= '/' . current_lang();
                }

                // Replace link in title
                $rebuild_title = vcp_printf($item->title, current_lang_());
                $rebuild_title = str_replace($domain_http, $domain_https, $rebuild_title);
                $rebuild_title = str_replace($domain_https_www, $domain_https, $rebuild_title);
                $rebuild_title = str_replace($domain_jp_need_replace, $path_need_replace, $rebuild_title);
                $rebuild_title = str_replace($domain_need_replace, $path_need_replace, $rebuild_title);
                $rebuild_title = str_replace($domain_replace, $path_need_replace,$rebuild_title);
                $rebuild_title = str_replace($domain_www, $path_need_replace, $rebuild_title);
                $rebuild_title = str_replace($domain_need_replace_new, $path_need_replace,$rebuild_title);
                $rebuild_title = str_replace($domain_detail_cate_old, $domain_detail_cate_new,$rebuild_title);
                $rebuild_title = str_replace($domain_demo,$path_need_replace,$rebuild_title);
                $rebuild_title = str_replace($domain_ja_slash,$path_need_replace,$rebuild_title);
                $rebuild_title = str_replace($domain_ja,$path_need_replace,$rebuild_title);
                $rebuild_title = str_replace($domain_renewal,$path_need_replace,$rebuild_title);
                $rebuild_title = str_replace($domain_ja_ja,$path_need_replace,$rebuild_title);
                $rebuild_title = str_replace($domain_images,$path_need_images,$rebuild_title);
                
                // Replace link in description
                $rebuild_content = vcp_printf($item->content, current_lang_());
                $rebuild_content = str_replace($domain_http, $domain_https, $rebuild_content);
                $rebuild_content = str_replace($domain_https_www, $domain_https, $rebuild_content);
                $rebuild_content = str_replace($domain_jp_need_replace, $path_need_replace, $rebuild_content);
                $rebuild_content = str_replace($domain_need_replace, $path_need_replace, $rebuild_content);
                $rebuild_content = str_replace($domain_replace, $path_need_replace, $rebuild_content);
                $rebuild_content = str_replace($domain_www, $path_need_replace, $rebuild_content);
                $rebuild_content = str_replace($domain_need_replace_new, $path_need_replace, $rebuild_content);
                $rebuild_content = str_replace($domain_detail_cate_old, $domain_detail_cate_new, $rebuild_content);
                $rebuild_content = str_replace($domain_demo,$path_need_replace,$rebuild_content);
                $rebuild_content = str_replace($domain_ja_slash,$path_need_replace,$rebuild_content);
                $rebuild_content = str_replace($domain_ja,$path_need_replace,$rebuild_content);
                $rebuild_content = str_replace($domain_renewal,$path_need_replace,$rebuild_content);
                $rebuild_content = str_replace($domain_ja_ja,$path_need_replace,$rebuild_content);
                $rebuild_content = str_replace($domain_images,$path_need_images,$rebuild_content);
            }
        ?>

        <h4 class="news-title">
            <?php echo $rebuild_title;?>
        </h4>
        
        <div class="date-post">
            <span>投稿日:</span>
            <span class="date">
                <?=date("Y", strtotime($item->created))?>年<?=date("m", strtotime($item->created))?>月<?=date("d", strtotime($item->created))?>日
            </span>
        </div>
        
        <div class="detail-news">
            <?php echo $rebuild_content; ?>
        </div>
    
    <?php endif; ?>
</div>