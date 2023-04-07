<?php

    include('views/theme/head.php');

    include('views/theme/navbar.php');

    include('inc/defines.php');
    require_once('Classes/WordEditor.php');
    
?>


<main>
<?php

if ( !isset($_GET['lang']) ){
    include('views/theme/choose_lang.php');
    //die();
} else {
    $lang_id = $_GET['lang'];
}

$jezyk = new WordEditor($lang_id);

$page = 1;
$pagination = 10;

include('views/wordEditor/word_list_head.php');

$wordList = $jezyk->getWordList($page, $pagination, SORT_DEFAULT);

$lp = 0;
foreach($wordList as $word){

    $wordId = $word['id'];
    $wordName = $word['word'];
    $wordPronunciation = $word['pronunciation'];

    $lp++;
    $descriptions = $jezyk->getDescriptions($wordId);
    
    include('views/wordEditor/word_list_element.php');


}


include('views/wordEditor/word_list_footer.php');



echo '<pre>';
var_dump($jezyk->getWordList($page, $pagination, SORT_DEFAULT));
echo '</pre>';
      

 ?>
</main>


<?php
    unset($jezyk);
    include('views/theme/footer.php');
?>