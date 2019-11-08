<div class="container">
	<div class="news-wrapp">
	    <div class="navi">
		    <?php if(isset($nextRecord) && $nextRecord != false): ?>
		        <span>
		        	<a href="<?=PATH_URL. 'news/' . $nextRecord->id.'/'.vcp_printf($nextRecord->title, 'jp');?>">
		        		&lsaquo;&lsaquo; 前へ
		        	</a>
		        </span>
		    <?php endif; ?>
		    
		    <?php if(isset($prevRecord) && $prevRecord != false): ?>
		        <span>
		        	<a href="<?=PATH_URL. 'news/' . $prevRecord->id.'/'.vcp_printf($prevRecord->title, 'jp');?>">
		        		次へ &rsaquo;&rsaquo;
		        	</a>
		        </span>
		    <?php endif; ?>
	    </div><!-- end .navi -->
	    
	    <div class="h1-title">
	    	<h4 class='red-heading-title'>
	    		ホーチミン最大級の賃貸不動産会社┃ベトナム進出支援┃アオザイハウジング
	    	</h4>
	    </div><!-- end .h1-title -->
	    <div class="bt-solid"></div><!-- end .bt-solid -->
	   
	    <?php if(isset($item) && $item != false): ?>
            <?php
				$domain_www              = 'www.aodaihousing.com/';
				$domain_https_www        = 'https://www.';
				$domain_https            = 'https://';
				$domain_replace          = 'https://aodaihousing.com';
				$domain_need_replace_new = PATH_URL.'/';
				$domain_need_replace     = 'https://aodaihousing.com/';
				$domain_jp_need_replace  = 'https://aodaihousing.com/jp/';
				$path_need_replace       = PATH_URL;
				$domain_detail_cate_old  = 'search?opt=house&catid';
				$domain_detail_cate_new  = 'houses/house_detail_by_condition_all?catid';
				$domain_demo             = 'https://demo.aodaihousing.com/';
				$domain_ja               = 'https://aodaihousing.com/ja/ja/';
				$domain_ja_slash         = 'https://aodaihousing.com/ja//';
				$domain_renewal          = 'https://renewal.aodaihousing.com/';
				$domain_ja_ja            = PATH_URL.'ja/';
                if (current_lang()== 'vn') {
                    $path_need_replace .= '/' . current_lang();
                }

	            // Replace link in title
	            $rebuild_title = vcp_printf($item->title, current_lang_());
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
	            
	            // Replace link in description
	            $rebuild_content = vcp_printf($item->content, current_lang_());
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
            ?>
		    <h3 class="content-blue">
		    	<?php echo $rebuild_title; ?>
	    	</h3><!-- end .content-blue -->

		    <div class="news-date">
		    	<span>投稿日:</span>
		    	<span class="date">
		    		<?=date("Y", strtotime($item->created))?>年
		    		<?=date("m", strtotime($item->created))?>月
		    		<?=date("d", strtotime($item->created))?>日
		    	</span>
		    </div><!-- end .news-date -->

		    <div class="detail-news">
		        <?php echo $rebuild_content; ?>

		        <!-- Contact us button -->
		        <?php 
		            // File store under folder application/views/FRONTEND/information_contact_us.php
		            echo $this->load->view('FRONTEND/information_contact_us');
		        ?>
		    </div><!-- end .detail-news -->
	    <?php endif; ?>
	</div><!-- end .news-wrapp -->
</div><!-- end .container -->