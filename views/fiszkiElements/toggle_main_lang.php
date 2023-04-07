<?php

switch($main_lang){
    case 1 : {
       //echo 'angliski';
        $main_flag = 'assets/img/flag_england.png';
        $second_flag = 'assets/img/flag_poland.png';
        $main_flag_attributes = '?lang=1&main=1';
        $second_flag_attributes = '?lang=1&main=3';
        break;
    } 
    case 2 : {
       // echo 'hiszpns';
        $main_flag = 'assets/img/flag_spain.png';
        $second_flag = 'assets/img/flag_poland.png';
        break;
    }
    case 3 : {
        //echo 'polski';
        $main_flag = 'assets/img/flag_poland.png';
        $second_flag = 'assets/img/flag_england.png';
        $second_flag_attributes = '?lang=1&main=1';
        $main_flag_attributes = '?lang=1&main=3';
        break;
    }
}




?>

<div class="position-relative" style="height: 120px;">
  
<!--Second-->
<a href="index.php<?=$second_flag_attributes.'&word='.$word_id?>" class="position-absolute top-50 start-50" target="_sef">
    <img src="<?=$second_flag?>" class="flag-sm rounded border-top border-left"/>
</a>
<!--Main-->
<a href="index.php<?=$main_flag_attributes.'&word='.$word_id?>" class="position-absolute bottom-50 end-50" target="_sef">
    <img src="<?=$main_flag?>" class="flag-sm rounded border-bottom border-right"/>
</a>

</div>
<!--
<a href="index.php?lang=1" target="_sef">
    <img src="assets/img/flag_england.png" class="flag btn btn-primary"/>
</a>
<a href="index.php?lang=2" target="_sef">
    <img src="assets/img/flag_spain.png" class="flag btn btn-primary"/>
</a>

test

 <div class="position-absolute top-50 start-50">c</div>
  <div class="position-absolute bottom-50 end-50">d</div>


-->