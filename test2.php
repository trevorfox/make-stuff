<?php include "header.php";
  $title = "Test";
  $desc = "This is only a test.";
  echo writeMetaData($title, $desc , "Today");
 ?>
<!-- THIS IS WHERE THE MAGIC HAPPENS -->
    <?php 
    $frame = htmlspecialchars($_GET["frames"]);
    ?>
    <div class="container">
      <iframe width="95%" height="99%" src="/inner.php?in=1<?php if ($frame > 0){ $frame--; echo "&frames=" .$frame;} ?>"></iframe>
      <h1><?php echo abs(10 - $frame) . " ";?> Recursion!</h1>
        
      <br>
      <p>Here begins a journey of many days. Just for record...</p>
      <p id="time"></p>
      <p><?php echo $url?></p>

    </div> <!-- /container -->

<!-- END MAGIC -->
<?php include "footer.php"; ?>
