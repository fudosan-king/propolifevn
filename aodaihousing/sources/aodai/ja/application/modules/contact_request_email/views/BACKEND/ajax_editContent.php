<?php
    $option_rent_or_buy =array(
        1 => '賃貸 （Rent）',
        2 => '売買 （Buy/Sell）'
    )
?>

<div class="table">
	<div class="head_table">
        <div class="head_title_edit">
            Manager Request Mail
        </div>
    </div>
	<div class="clearAll"></div>
    <div class="body">
        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">物件種別:</td>
                    <td class="right_text_field">
                        <?php
                            if ($property_type && is_array($property_type) && count($property_type) > 0) {
                                $display_property_type = '';
                                foreach ($property_type as $k => $item) {
                                    if ($k != 0 && $k != count($property_type)) {
                                        $display_property_type .= '<br>';
                                    }
                                    $display_property_type .= $item->name_jp;
                                }
                                echo $display_property_type;
                            }
                        ?>
                    </td>
                </tr>
            </table>
        </div>

        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">希望エリアとご希望:</td>
                    <td class="right_text_field">
                        <?php
                            if (isset($result->location)) {
                                echo helper_special_character($result->location);
                            }
                        ?>
                    </td>
                </tr>
            </table>
        </div>

        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">希望間取り:</td>
                    <td class="right_text_field">
                        <?php
                            if ($floor_plans && is_array($floor_plans) && count($floor_plans) > 0) {
                                $display_floor_plans = '';
                                foreach ($floor_plans as $k => $item) {
                                    if ($k != 0 && $k != count($floor_plans)) {
                                        $display_floor_plans .= '<br>';
                                    }
                                    $display_floor_plans .= $item->name_jp;
                                }
                                echo $display_floor_plans;
                            }
                        ?>
                    </td>
                </tr>
            </table>
        </div>

        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">面積:</td>
                    <td class="right_text_field">
                        <?php
                            if (isset($result->space_size)) {
                                echo $result->space_size . ' ㎡以上';
                            }
                        ?>
                    </td>
                </tr>
            </table>
        </div>

        <?php
            $option_exchenge = array(
                1 =>'日本円',
                2 =>'現地通貨'
            )
        ?>

        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">ご予算上限:</td>
                    <td class="right_text_field">
                        <?php
                            if (isset($result->exchenge_flg)) {
                                if (($result->exchenge_flg == '2') && (isset($result->united_budget))) {
                                    echo $result->united_budget;
                                    echo 'USD';
                                }

                                if (($result->exchenge_flg == '1') && isset($result->japan_budget)) {
                                    echo $result->japan_budget;
                                    echo '万円（Ten Thousand Yen）';
                                }
                            }
                        ?>
                    </td>
                </tr>
            </table>
        </div>

        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">希望時期:</td>
                    <td class="right_text_field">
                        <?php
                            $move_in_date = '';
                            
                            if ($result->move_in_date_month) {
                                $move_in_date .= $result->move_in_date_month . ' 月頃';
                            }
                            echo $move_in_date;
                        ?>
                    </td>
                </tr>
            </table>
        </div>

        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">契約形態:</td>
                    <td class="right_text_field">
                        <?php
                            if ($result->contract_personal && $result->contract_personal == 1) {
                                echo '個人での契約' . '<br>';
                            }

                            if ($result->contract_company && $result->contract_company == 1) {
                                echo '法人での契約';
                            }
                        ?>
                    </td>
                </tr>
            </table>
        </div>

        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">会社名:</td>
                    <td class="right_text_field">
                        <?php
                            if (isset($result->client_company_name)) {
                                echo helper_special_character($result->client_company_name);
                            }
                        ?>
                    </td>
                </tr>
            </table>
        </div>


        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">お名前:</td>
                    <td class="right_text_field">
                        <?php 
                            if (isset($result->client_name)) {
                                echo helper_special_character($result->client_name);
                            }
                        ?>
                    </td>
                </tr>
            </table>
        </div>

        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">メールアドレス欄:</td>
                    <td class="right_text_field">
                        <?php
                            if (isset($result->client_email)) {
                                echo $result->client_email;
                            }
                        ?>
                    </td>
                </tr>
            </table>
        </div>

        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">電話番号欄:</td>
                    <td class="right_text_field">
                        <?php
                            if (isset($result->client_phone)) {
                                echo $result->client_phone;
                            }
                        ?>
                    </td>
                </tr>
            </table>
        </div>

        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">Time Created:</td>
                    <td class="right_text_field">
                        <?php echo date("Y-m-d H:i:s", strtotime($result->created)); ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>

</div>

<style type="text/css">
    .body {
        padding: 12px 14px;
    }
    .list .legend {
        padding-bottom: 4px;
        font-weight: bold;
    }
    .list {
        padding: 5px 0;
    }
</style>