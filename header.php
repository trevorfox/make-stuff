<?php
//image must be at least 280x150px
function writeMetaData($title, $description, $publishDate,
$siteName="Trevor Fox | On The Web, on the Web", 
$twitterName="@realtrevorfaux",
$fbId="3230765",
$image="http://trevorfox.com/wp-content/uploads/2015/07/TREVOR_FOX_LOGO.png",
$class="Make Stuff X Do Stuff",
$modifiedDate="" ) {
  $url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
  $head = <<<HTML
  <!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{$title}</title>
  <meta name="description" content="{$description}">
  <meta name="author" content="Trevor Fox">
  <!-- Schema.org markup for Google+ -->
  <meta itemprop="name" content="{$siteName}">
  <meta itemprop="description" content="{$description}">
  <meta itemprop="image" content="{$image}">
  <!-- Twitter Card data -->
  <meta name="twitter:card" content="{$image}">
  <meta name="twitter:site" content="{$siteName}">
  <meta name="twitter:title" content="{$title}">
  <meta name="twitter:description" content="{$description}">
  <meta name="twitter:creator" content="{$twitterName}">
  <meta name="twitter:image:src" content="{$image}">
  <!-- Open Graph data -->
  <meta property="og:title" content="{$title}">
  <meta property="og:type" content="article">
  <meta property="og:url" content="{$url}">
  <meta property="og:image" content="{$image}">
  <meta property="og:description" content="{$description}">
  <meta property="og:site_name" content="{$siteName}">
  <meta property="article:published_time" content="{$publishDate}">
  <meta property="article:modified_time" content="{$modifiedDate}">
  <meta property="article:section" content="{$class}">
  <meta property="article:tag" content="{$class}">
  <meta property="fb:admins" content="{$fbId}">
  <!-- Le styles -->
  <link href="./css/bootstrap.min.css" rel="stylesheet">
  <link href="./css/bootstrap-navbar.css" rel="stylesheet">
  <style>
    body {
      padding-top: 60px;
    }
  </style>
  <link href="./css/bootstrap-responsive.css" rel="stylesheet">
  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
  <script src="../assets/js/html5shiv.js"></script>
  <![endif]-->
  <script src="./js/jquery.js"></script>
  <script>
  dataLayer = [{
    'url': '{$url}',
    'name': '{$siteName}',
    'title': '{$title}',
    'description': '{$description}',
    'publishDate': '{$publishDate}',
    'class': '{$class}',
    'modifiedDate': '{$modifiedDate}'
  }]
  </script>
  </head>
HTML;
return $head . "\r\n" .file_get_contents( "./navbar.php");
}
?>
