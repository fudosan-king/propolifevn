<div class="info-apartment slideInUp">
    <div class="container">

        <!-- ビンホームズ,vinhomes特集 -->
        <div class="set-slider-block">
            <div class="set-slider-title">
                <h3 class="heading-title">ゴールデンリバーとセントラルパーク　サービスレジデンス
                </h3>
                <div class="button-arrival pull-right">
                    <a href="houses/ビンホームズ,vinhomes特集" class="btn-view-more">もっと見る</a>
                </div>
            </div>
            
            <?php
            $this->view('list_info_apartment', array(
                'list' => $list_vin_home,
                'limit_content' => $limit_content,
                'string_limit_content' => $string_limit_content,
                'itemLayOut'=>$itemLayOut,
                'images_houses'=>$images_houses
            ));
            ?>
        </div>

        <!-- フーミーフン7区アパート -->
        <div class="set-slider-block">
            <div class="set-slider-title">
                <h3 class="heading-title">フーミーフン7区アパート   
                </h3>
                <div class="button-arrival pull-right">
                    <a href="houses/フーミーフン7区アパート" class="btn-view-more">もっと見る</a>
                </div>
            </div>
            <?php
            $this->view('list_info_apartment', array(
                'list' => $list_dist_7,
                'limit_content' => $limit_content,
                'string_limit_content' => $string_limit_content,
                'itemLayOut'=>$itemLayOut,
                'images_houses'=>$images_houses
            ));
            ?>
        </div>

        <!-- 割安アパートメント (2区アパートメント特集) -->
        <div class="set-slider-block">
            <div class="set-slider-title">
                <h3 class="heading-title">2区アパートメント特集 
                </h3>
                <div class="button-arrival pull-right">
                    <a href="houses/2区アパートメント特集" class="btn-view-more">もっと見る</a>
                </div>
            </div>
            
            <?php
                $this->view('list_info_apartment', array(
                    'list' => $list_dist_2,
                    'limit_content' => $limit_content,
                    'string_limit_content' => $string_limit_content,
                    'itemLayOut'=>$itemLayOut,
                    'images_houses'=>$images_houses
                ));
            ?>
        </div>
        
        <!-- ホーチミン単身向け450USD以下アパート特集 -->
        <div class="set-slider-block">
            <div class="set-slider-title">
                <h3 class="heading-title">ホーチミン単身向け450USD以下アパート特集
                </h3>
                <div class="button-arrival pull-right">
                    <a href="houses/ホーチミン単身向け450USD以下アパート特集" class="btn-view-more btn-modify">もっと見る</a>
                </div>
            </div>

            <?php
                $this->view('list_info_apartment', array(
                    'list' => $list_apartment_under_450_usd,
                    'limit_content' => $limit_content,
                    'string_limit_content' => $string_limit_content,
                    'itemLayOut'=>$itemLayOut,
                    'images_houses'=>$images_houses
                ));
            ?>
        </div>

    </div>
    <!-- container -->
</div>