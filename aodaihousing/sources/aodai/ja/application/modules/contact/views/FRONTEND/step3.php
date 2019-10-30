<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link defer rel="stylesheet" href="<?=PATH_URL.'static/css/'?>reset.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link defer rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" type="text/css">
    <link defer rel="stylesheet" href="<?=PATH_URL.'static/css/'?>style.css" type="text/css">
    <link defer rel="stylesheet" href="<?=PATH_URL;?>static/css/contact.css" />
    <link defer href="<?=PATH_URL?>static/images/favicon.png" type="image/x-icon" rel="icon" />
    <link defer href="<?=PATH_URL?>static/images/favicon.png" type="image/x-icon" rel="shortcut icon" />
    <link defer rel="stylesheet" href="<?php echo PATH_URL . 'static/css/'?>main-responsive.css" type="text/css">
    <style type="text/css">
    /* html, body{
        min-width: 700px;
    } */
    </style>
    
    <?php if($type_popup != '1'){?>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/tidusvn05/aodai-cdn@1.7/js/jquery-3.3.1.min.js"></script>
    <?php }?>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-69563739-4', 'auto');
        ga('send', 'pageview');
    </script>

    <!-- Google Tag Manager -->
    <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-KRT7X7"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KRT7X7');
        dataLayer.push({'event': 'inquiry-complete'});</script>
    <!-- End Google Tag Manager -->

</head>

<body>
    <div id="contact" class="<?php if($type_popup == '1'){ echo 'contact_tow';}?>">
        <?php
        // File store under folder application/views/FRONTEND/breadcums.php
        if($type_popup == '1'){
            echo $this->load->view('FRONTEND/breadcums');
        }
        ?>
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel"><?php echo lang('WEBからの お問い合わせ') ?></h4>
        </div>
        <div class="modal-body">
            <p><?php echo lang("contact_result_1") ?></p>
            <p><?php echo lang('contact_result_2'); ?></p>
            <p><?php echo lang('contact_result_3'); ?></p>
            <p><?php echo lang('contact_result_4'); ?></p>
        </div>
    </div>
</body>