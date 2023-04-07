<?php
if ( !isset($_POST['action']) ) {
    echo 'ERROR: Nie podano akcji';
    die();
}
$action = $_POST['action'];
$lang_id = $_POST['langId'];

include('../Classes/WordEditor.php');
$wordEditor = new WordEditor($lang_id);

if ( $action == 'word-edit' ){

    $wordId = $_POST['wordId'];
    $word = $_POST['word'];
    $pronunciation = $_POST['pronunciation'];


    $wordEditor->editWord($wordId, $word, $pronunciation);


    echo true;


    $response = [

        'wordId' => $wordId,
        'word' => $word,
        'pronunciation' => $pronunciation

    ];

    //return $response;

}




























?>
