  <!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Somewhere between here and nowhere</title>
  <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
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
  </head>
  <body>
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Trevor Fox | On the Web... on the Web</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling-->
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">All the Things <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">This</a></li>
            <li><a href="#">Is</a></li>
            <li><a href="#">Coming Soon</a></li>
            <li class="divider"></li>
            <li><a href="http://trevorfox.com">trevorfox.com</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </nav>
<!-- THIS IS WHERE THE MAGIC HAPPENS -->

    <?php 
    $frame = htmlspecialchars($_GET["frames"]) || 0;
    $frame = $frame > 10 ? 10 : $frame;
    if ($frame > 0){ 
      $frame--;
    } 
    ?>
    <div class="container">
      <iframe class="embed-responsive-item" width="95%" height="480px" src="/inner.php?in=1<?php if ($frame > 0){echo "&frames=" .$frame;} ?>"></iframe>
      <br>
      <p>Here begins a journey of many days. Just for record...</p>

    </div> <!-- /container -->

<!-- END MAGIC -->
  </body>
</html>
