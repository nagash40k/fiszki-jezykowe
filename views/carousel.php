<?php

require_once('Classes/Fiszki.php');
$angielski = new Fiszki($lang_id);
if ( isset($_GET['word']) ){
    $word_id = $_GET['word'];
} else {
    $word_id = $angielski->rollRandomWord();
}
$word = $angielski->getWord($word_id);

$fiszka = [];
if ( $word['lang1_id'] == $main_lang ){
    $fiszka['foreign_word'] = $word['lang1_word'];
    $fiszka['foreign_desc'] = $angielski->getDescription($word['lang1_word_id']);
    $fiszka['foreign_pronunciation'] = $word['lang1_word_id_pronunciation'];
    $fiszka['national_word'] = $word['lang2_word'];
    $fiszka['national_desc'] = $angielski->getDescription($word['lang2_word_id']);
    $fiszka['national_pronunciation'] = $word['lang2_word_id_pronunciation'];
} else {
    $fiszka['foreign_word'] = $word['lang2_word'];
    $fiszka['foreign_desc'] =$angielski->getDescription($word['lang2_word_id']);
    $fiszka['foreign_pronunciation'] = $word['lang2_word_id_pronunciation'];
    $fiszka['national_word'] = $word['lang1_word'];
    $fiszka['national_desc'] = $angielski->getDescription($word['lang1_word_id']);
    $fiszka['national_pronunciation'] = $word['lang1_word_id_pronunciation'];
}


include('views/toggle_main_lang.php');
?>



<section  class="py-2 text-center container">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">


                <div class="carousel-caption d-md-block">
                    <h1><?=$fiszka['foreign_word']; ?></h1>
                    <?php
                        if ( $fiszka['foreign_pronunciation'] ) {
                            echo "<p>[{$fiszka['foreign_pronunciation']}]</p>";
                        }
                    ?>
                    

                    <?php  
                        if ( $fiszka['foreign_desc'] ) {
                            include('description_accordeon.php'); 
                        }
                    
                    ?>

                </div>
                </div>
                <div class="carousel-item">
                
                <div class="carousel-caption d-md-block">
                    <h1><?=$fiszka['national_word']; ?></h1>
                    <p><?=$fiszka['national_desc']; ?></p>
                </div>
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>