<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
</head>
<body>
    <?php
        $option_exchenge = array(
            1 => '日本円',
            2 => '現地通貨'
        );
        
        $option_client_type = array(
            1 => '企業のご担当者様',
            2 => '海外赴任のご本人様',
            3 => 'その他'
        );

        $style_tr_first = 'padding: 15px 10px 15px 10px;';
        $style_tr = 'padding: 15px 10px 15px 10px; border-top: 1px solid #d5d5d5;';
        $style_td_first = 'width: 150px;';
        $style_td_second = '';
    ?>

    <table cellspacing="0" cellpadding="0" border="0" width="100%">
        <tr style='<?php echo $style_tr; ?>'>
            <td style='<?php echo $style_tr . $style_td_first; ?>'>物件種別</td>
            <td style='<?php echo $style_tr . $style_td_second; ?>'>
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

        <tr style='<?php echo $style_tr; ?>'>
            <td style='<?php echo $style_tr . $style_td_first; ?>'>希望エリアとご希望</td>
            <td style='<?php echo $style_tr . $style_td_second; ?>'>
                <?php
                    if (isset($location)) {
                        echo $location;
                    }
                ?>
            </td>
        </tr>

        <tr style='<?php echo $style_tr; ?>'>
            <td style='<?php echo $style_tr . $style_td_first; ?>'>希望間取り</td>
            <td style='<?php echo $style_tr . $style_td_second; ?>'>
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

        <tr style='<?php echo $style_tr; ?>'>
            <td style='<?php echo $style_tr . $style_td_first; ?>'>面積</td>
            <td style='<?php echo $style_tr . $style_td_second; ?>'>
                <?php
                    if (isset($space_size)) {
                        echo $space_size . ' ㎡以上';
                    }
                ?>
            </td>
        </tr>

        <tr style='<?php echo $style_tr; ?>'>
            <td style='<?php echo $style_tr . $style_td_first; ?>'>ご予算上限</td>
            <td style='<?php echo $style_tr . $style_td_second; ?>'>
                <?php
                    if (isset($exchenge_flg)) {
                        if (($exchenge_flg == '2') && (isset($united_budget))) {
                            echo  $united_budget . ' USD';
                        }
                        
                        if (($exchenge_flg == '1') && (isset($japan_budget))) {
                            echo '上限（Upper Limit）' . $japan_budget . ' 万円（Ten Thousand Yen）';
                        }
                    }
                ?>
            </td>
        </tr>

        <tr style='<?php echo $style_tr; ?>'>
            <td style='<?php echo $style_tr . $style_td_first; ?>'>希望時期</td>
            <td style='<?php echo $style_tr . $style_td_second; ?>'>
                <?php
                    $move_in_date = '';
                    
                    if ($move_in_date_month) {
                        $move_in_date .= $move_in_date_month . '月頃';
                    }
                    echo $move_in_date;
                ?>
            </td>
        </tr>

        <tr style='<?php echo $style_tr; ?>'>
            <td style='<?php echo $style_tr . $style_td_first; ?>'>契約形態</td>
            <td style='<?php echo $style_tr . $style_td_second; ?>'>
                <?php
                    if ($contract_personal && $contract_personal == 1) {
                        echo '個人での契約' . '<br>';
                    }

                    if ($contract_company && $contract_company == 1) {
                        echo '法人での契約';
                    }
                ?>
            </td>
        </tr>

        <tr style='<?php echo $style_tr; ?>'>
            <td style='<?php echo $style_tr . $style_td_first; ?>'>会社名</td>
            <td style='<?php echo $style_tr . $style_td_second; ?>'>
                <?php
                    if (isset($client_company_name)) {
                        echo $client_company_name;
                    }
                ?>
            </td>
        </tr>

        <tr style='<?php echo $style_tr; ?>'>
            <td style='<?php echo $style_tr . $style_td_first; ?>'>お名前</td>
            <td style='<?php echo $style_tr . $style_td_second; ?>'>
                <?php 
                    if (isset($client_name)) {
                        echo $client_name;
                    }
                ?>
            </td>
        </tr>

        <tr style='<?php echo $style_tr; ?>'>
            <td style='<?php echo $style_tr . $style_td_first; ?>'>メールアドレス欄</td>
            <td style='<?php echo $style_tr . $style_td_second; ?>'>
                <?php
                    if (isset($client_email)) {
                        echo $client_email;
                    }
                ?>
            </td>
        </tr>

        <tr style='<?php echo $style_tr; ?>'>
            <td style='<?php echo $style_tr . $style_td_first; ?>'>電話番号欄</td>
            <td style='<?php echo $style_tr . $style_td_second; ?>'>
                <?php
                    if (isset($client_phone)) {
                        echo $client_phone;
                    }
                ?>
            </td>
        </tr>
    </table>
</body>
</html>