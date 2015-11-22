<?php include "header.php";
  $title = "Day 1 of Many";
  $desc = "This is what I made on the first day plus a lot of meta data about it.";
  echo writeMetaData($title, $desc , "Today");
 ?>
<!-- THIS IS WHERE THE MAGIC HAPPENS -->

    <script>
      var nowish = new Date()
      jQuery(document).ready(function(){
          jQuery("#time").text("The time is now: " + nowish);
      });

    </script>

    <div class="container">
      <h1>Make Stuff Do Stuff</h1>
      <br>
      <p>Here begins a journey of many days. Just for record...</p>
      <p id="time"></p>
      <p><?php echo $url?></p>

    </div> <!-- /container -->

<!-- END MAGIC -->
<?php include "footer.php"; ?>
