<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demos.creative-tim.com/light-bootstrap-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Aug 2022 22:33:56 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.html">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?= isset($title) ? $title : 'Eshop Admin :: Operations HQ' ?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <meta name="keywords" content="dashboard">
    <meta name="description"  content="Forget about boring dashboards, get a bootstrap 4 admin template designed to be simple and beautiful.">
    <meta itemprop="name" content="Light Bootstrap Dashboard PRO by Creative Tim">
    <meta itemprop="description" content="Forget about boring dashboards, get a bootstrap 4 admin template designed to be simple and beautiful.">
    <meta itemprop="image" content="../../../s3.amazonaws.com/creativetim_bucket/products/34/original/opt_lbd_pro_thumbnail.jpg">

    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Light Bootstrap Dashboard PRO by Creative Tim">
    <meta name="twitter:description" content="Forget about boring dashboards, get a bootstrap 4 admin template designed to be simple and beautiful.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="../../../s3.amazonaws.com/creativetim_bucket/products/34/original/opt_lbd_pro_thumbnail.jpg">
    <meta name="twitter:data1" content="Light Bootstrap Dashboard PRO by Creative Tim">
    <meta name="twitter:label1" content="Product Type">
    <meta name="twitter:data2" content="$39">
    <meta name="twitter:label2" content="Price">

    <meta property="og:title" content="Light Bootstrap Dashboard PRO by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="dashboard.html" />
    <meta property="og:image"
        content="../../../s3.amazonaws.com/creativetim_bucket/products/34/original/opt_lbd_pro_thumbnail.jpg" />
    <meta property="og:description"
        content="Forget about boring dashboards, get a bootstrap 4 admin template designed to be simple and beautiful." />
    <meta property="og:site_name" content="Creative Tim" />

    <link rel="stylesheet" href="<?=ASSET.BCKND."css/googlefonts.css"?>" />
    <link rel="stylesheet" href="<?=ASSET.BCKND."css/font-awesome.min.css"?>" />
    <link rel="stylesheet" href="<?=ASSET.BCKND."css/bootstrap-icons.css"?>" />

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <link href="<?=ASSET.BCKND."css/bootstrap.min.css"?>" rel="stylesheet" />
    <link href="<?=ASSET.BCKND."css/light-bootstrap-dashboard790f.css?v=2.0.1"?>" rel="stylesheet" />

    <link href="<?=ASSET.BCKND."css/demo.css"?>" rel="stylesheet" />

    <!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NKDMSK6');</script> -->

</head>

<body>
    <div class="preload">
        <img src="<?=ASSET.BCKND."img/preload.gif"?>" alt="">
    </div>

    <!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
            style="display:block;visibility:visible;"></iframe></noscript> -->

    <div class="wrapper">
        <?php $this->view('includes/sidebar',BCKND,$data)?>
            <div class="main-panel">
                <?php $this->view('includes/navbar',BCKND)?>