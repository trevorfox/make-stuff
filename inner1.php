<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="canonical" href="http://trevorfox.com/recursive-iframes" />
  <title>Somewhere between here and nowhere</title>
  <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
  <!-- Le styles -->
  <link href="./css/bootstrap.min.css" rel="stylesheet">
  <link href="./css/bootstrap-navbar.css" rel="stylesheet">
  <link href="./css/game.css" rel="stylesheet">
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
<style>
  .vcenter {
      display: inline-block;
      vertical-align: middle;
      float: none;
  }
</style>
<div class="container">
<?php
  $frame = isset($_GET["frames"]) ? htmlspecialchars($_GET["frames"]) : 0;
  $total = isset($_GET["count"]) ? htmlspecialchars($_GET["count"]) : $frame;
  $count = $total - $frame + 1;
  $frame = $frame > 10 ? 10 : $frame;

  if ($frame > 0){
    $frame--;
    echo "<iframe class='embed-responsive-item center-block' width='90%' height='480px' src='/inner1.php?frames=$frame&count=$total'></iframe>";
  } else {
    //echo "<img width='50%' class='img-responsive center-block' src='/img/ss_count.png'>";
  }
?>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-4 vcenter">
      <div class="pull-right">
        <img  class="img-responsive" src="/img/ss_count.png">
      </div>
    </div>
    <div class="col-sm-4 vcenter">
      <div>
        <h4>
        <?php 
        if ($count - 1 > 0){
          echo $count . " recursion!";
        } else {
          echo "How many recursions do you vant?";
        }
        ?>
        </h4>
      </div>
      <div class="input-group">
        <input type="text" class="form-control" id="recursions" placeholder="How many recursions?">
        <span class="input-group-btn">
          <button class="btn btn-default" id="recButton" type="button">Recurse!</button>
        </span>
      </div><!-- /input-group -->
    </div><!-- /center col -->
    </div>
    <div class="col-sm-4 vcenter"></div>
  </div>
</div>
<script type="text/javascript">
  document.getElementById("recButton").onclick = function(){
    var rCount = document.getElementById("recursions").value
    window.location.assign(window.location.pathname + "?frames=" + rCount + "&count=" + rCount);
}
</script>      
<!-- END MAGIC -->
  </body>
</html>



