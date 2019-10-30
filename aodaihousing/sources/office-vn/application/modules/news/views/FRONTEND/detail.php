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
                // Fix link search list data in details news
                $path_need_replace = PATH_URL . '/' . current_lang();
                $domain_https = 'https://';
                $array_item_need_replace = array(
                    'www.aodaihousing.com/'                 => $path_need_replace,
                    'http://'                               => $domain_https,
                    'https://www.'                          => $domain_https,
                    'https://aodaihousing.com/jp/'          => $path_need_replace,
                    'https://aodaihousing.com/'             => $path_need_replace,
                    'https://aodaihousing.com'              => $path_need_replace,
                    'www.aodaihousing.com/'                 => $path_need_replace,
                    PATH_URL.'/'                            => $path_need_replace,
                    'search?opt=house&catid'                => 'houses/house_detail_by_condition_all?catid',
                    'https://demo.aodaihousing.com/'        => $path_need_replace,
                    'https://aodaihousing.com/ja//'         => $path_need_replace,
                    'https://aodaihousing.com/ja/ja/'       => $path_need_replace,
                    'https://renewal.aodaihousing.com/'     => $path_need_replace,
                    PATH_URL.'ja/'                          => PATH_URL,
                    PATH_URL.'/ja/'                         => PATH_URL,
                    PATH_URL.'static'                       => PATH_URL_IMAGES . 'static',
                    '/ja/search/list_data?opt='             => 'search?opt=',
                    '/search/list_data?opt='                => '/search?opt=',
                    '&cboAreaName='                         => '&areas=',
                    '&cboLayOut='                           => '&type=',
                    '&cboRentSelect='                       => '&rent=',
                    '&cboType='                             => '&layout=',
                    '&cboSize='                             => '&size=',
                    '&amp;cboAreaName='                     => '&amp;areas=',
                    '&amp;cboLayOut='                       => '&amp;type=',
                    '&amp;cboRentSelect='                   => '&amp;rent=',
                    '&amp;cboType='                         => '&amp;layout=',
                    '&amp;cboSize='                         => '&amp;size=',
                    PATH_URL . 'ja/building/'               => 'https://aodaihousing.com/ja/building/',
                    PATH_URL . 'building/'                  => 'https://aodaihousing.com/ja/building/',
                    PATH_URL . 'page/'                      => 'https://aodaihousing.com/ja/page/',
                    PATH_URL . 'ja/page/'                   => 'https://aodaihousing.com/ja/page/',
                    PATH_URL . '/page/'                     => 'https://aodaihousing.com/ja/page/',
                );

                $rebuild_title = vcp_printf($item->title, current_lang_());
                $rebuild_content = vcp_printf($item->content, current_lang_());
                foreach ($array_item_need_replace as $key_replace => $item_replace) {
                    $rebuild_title = str_replace($key_replace, $item_replace, $rebuild_title);
                    $rebuild_content = str_replace($key_replace, $item_replace, $rebuild_content);
                }
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