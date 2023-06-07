<?php

  include('views/theme/head.php');

  include('views/theme/navbar.php');

  include('inc/defines.php');

echo 'test remote repository';
?>




<main>

  <?php

  if ( !isset($_GET['lang']) ){
    include('views/theme/choose_lang.php');
  } else {
    $lang_id = $_GET['lang'];

    if ( !isset($_GET['main']) ){
      $main_lang = $lang_id;
    } else {
      $main_lang =  $_GET['main'];
    }

    include('views/fiszkiElements/carousel.php');
    include('views/fiszkiElements/controls.php');
  }

  

  ?>
<?php
      unset($angielski);
    ?>
</main>


<?php
  include('views/theme/footer.php');
?>