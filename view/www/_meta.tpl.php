		<?php 
        define('__ASSETS_JS__', '/assets/js');
        define('__ASSETS_CSS__', '/assets/css');
        ?>
        <!--script language="javascript" src="<?php echo(__ASSETS_JS__); ?>/MLC/MLC.MJax.js"></script-->
		<!--link rel="stylesheet" type="text/css" href="<?php echo(__ASSETS_CSS__); ?>/bootstrap.css"-->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />

        <script src="<?php echo __ASSETS_JS__; ?>/jquery.dropotron-1.3.js"></script>
        
            <link rel="stylesheet" href="<?php echo __ASSETS_CSS__; ?>/bootstrap.css" />
            <link rel="stylesheet" href="<?php echo __ASSETS_CSS__; ?>/added-styles.css" />
       <!--  </noscript> -->

        <?php $asset = '/assets'; ?>
        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="<?php //echo MLCApplication::GetAssetUrl('/fonts/formata/stylesheet.css'); 
        echo $asset . "/fonts/formata/stylesheet.css"; ?>">
        <link rel="stylesheet" type="text/css" href="<?php //echo MLCApplication::GetAssetUrl('/fonts/league_gothic/stylesheet.css');
        echo $asset . "/fonts/league_gothic/stylesheet.css"; ?>">

