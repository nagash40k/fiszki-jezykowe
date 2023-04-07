<?php

require_once 'Fiszki.php';

class WordEditor extends Fiszki {

    public function __construct(int $langId){
        $this->langId = $langId;
        $this->countWords();
    }

    public function getWordList(int $page, int $pagination, string $sortCol, string $sortType = 'ASC'){
        // $page - numer strony
        // $pagination - ilość słów na stronę 
        $firstWord = 0;  // pierwsze słowo na stronę
        if ( $page > 1 ) {
            $firstWord = $page * $pagination -1;   
        }

        $sql = "SELECT 
                    *
                FROM
                    `words`
                WHERE 
                    `id_lang` = {$this->langId}
                ORDER BY
                    $sortCol $sortType
                LIMIT 
                    $firstWord, $pagination
        ;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute();
        $result = $stmt->fetchAll();



        return $result;
    }

    public function getDescriptions($wordId){
        $sql = "SELECT 
                *
                FROM
                    `descriptions`
                INNER JOIN
                    `sources`
                    ON
                        `sources`.`id` = `descriptions`.`source_id`
                WHERE 
                    `id_word` = $wordId
            ;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute();
        $result = $stmt->fetchAll();



        return $result;

    }










}