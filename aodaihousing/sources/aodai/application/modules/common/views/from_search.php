<form name="search" method="get" action="<?=create_url()?>search">
    <input placeholder="物件検索キーワード" value="<?php if(isset($s))echo $s; ?>" name="s" class="input-s">
                            <input type="hidden" name="opt" value="office" />
                    <input type="submit" value="send" class="send-s">
                </form>