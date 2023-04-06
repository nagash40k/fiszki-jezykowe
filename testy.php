


<?php


require_once('Classes/Fiszki.php');


$angielski = new Fiszki(1);
$hiszpanski = new Fiszki(2);

echo 'angielski: <br/>';
echo 'ilosc slow: '.$angielski->getWordsCount();
echo '<br/>';
$randNr = $angielski->rollRandomWord();
echo 'randomNr: '.$randNr;
echo '<br/>';
echo 'randomWord: '.var_dump($angielski->getWord());



echo '<br/>';echo '<br/>';

echo 'hiszpanski: <br/>';
echo 'ilosc slow: '.$hiszpanski->getWordsCount();
echo '<br/>';
echo 'random: '.$hiszpanski->rollRandomWord();


?>


<br/><br/>
<a href="index.php">Index</a>

