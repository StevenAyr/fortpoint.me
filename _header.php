<?php
function current_url(){
  $current = null;
  preg_match('/\w+\.php/', $_SERVER['SCRIPT_NAME'], $current);
  return $current[0];
}

function current_nav($url){
  $current_url = current_url();
  $href = "href=\"$url\"";

  if ($current_url == $url)
    $href .= 'class="active"';

  return $href;
}

$current_url = current_url();

if ($current_url === 'index.php')
  $current_url = 'home';

$body_class = explode('.', $current_url);
$body_class = $body_class[0];
?>
<!DOCTYPE html>
<!--[if lte IE 8]>     <html class="no-js bad-ie"><![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Fort Point Legal | <?php echo ucwords($current_url); ?></title>
  <meta name="description" content="Fort Point Legal represents the open source, internet startup and entrepreneur communities.  We take pride in partnering with clients providing cost effective legal solutions.">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
  <link rel="shortcut icon" href="img/favicon.ico">
  <link rel="canonical" href="index.html">
  <script type="text/javascript" src="http://use.typekit.net/fzi0ttf.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
  <!--[if lte IE 8]><script src="/js/respond.min.js"></script><![endif]-->
</head>

<body class="page-<?php echo $body_class ?>">

<header class="site-header">
  <a href="./">
    <h1 class="site-title">Fort Point Legal</h1>
  </a>
  <nav class="site-nav">
    <header class="mobile-nav-header">
      <label for="show-menu-mobile">Menu</label>
    </header>
    <input type="checkbox" id="show-menu-mobile">
    <ul>
      <li><a <?php echo current_nav('clients') ?>>Clients</a></li>
      <li><a <?php echo current_nav('story') ?>>Story</a></li>
      <li><a <?php echo current_nav('team') ?>>Team</a></li>
      <li><a <?php echo current_nav('connect') ?>>Connect</a></li>
    </ul>
  </nav>
</header>

<div class="main-content">