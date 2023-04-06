<?php

define('T_TABLE_NAME',      'time_table');  // nazwa tabeli
define('T_TABLE_ID',        'id');
define('T_TABLE_OBJ_ID',    'object_id');
define('T_TABLE_USER_ID',    'user_id');
define('T_TABLE_T_START',   'time_start');
define('T_TABLE_T_END',     'time_end');



require_once 'Dbh.php';

class Fiszki extends Dbh {

    public $langId = 0;
    private $wordsCount = 0;

    public function __construct(int $langId){
        $this->langId = $langId;

        $this->countWords();
    }

    public function rollRandomWord(){
        return rand(1, $this->wordsCount);
    }

    public function getWord(){
        $wordNo = $this->rollRandomWord() - 1;
        $sql = "SELECT 
                    `lang1`.`id_lang` as `lang1_id`,
                    `lang1`.`word` as `lang1_word`,
                    `lang1`.`description` as `lang1_desc`,
                    `lang2`.`id_lang` as `lang2_id`,
                    `lang2`.`word` as `lang2_word`,
                    `lang2`.`description` as `lang2_desc`                    
                FROM 
                    `translations`
                JOIN 
                    `words` as `lang1`
                ON
                    `translations`.`id_word_1` = `lang1`.`id`
                JOIN 
                    `words` as `lang2`
                ON 
                    `translations`.`id_word_2` = `lang2`.`id`                
                WHERE 
                    `translations`.`id_lang` = {$this->langId}
                ORDER BY 
                    `translations`.`id` LIMIT $wordNo,1;
            ";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result[0];

    }


    private function countWords(){
        $sql = "SELECT COUNT(*) as 'count'
                FROM `translations` 
                WHERE `id_lang` = {$this->langId};";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute();

        $result = $stmt->fetchAll();

        $this->wordsCount = $result[0]['count'];
    }


    public function getWordsCount(){
        return $this->wordsCount;
    }



    
#####################
    public function showFullTable(){
        $table = T_TABLE_NAME;
        $column = T_TABLE_OBJ_ID;

        $sql = "SELECT 
                    * 
                FROM 
                    `$table` 
                WHERE 
                    `$column` = ?
        ;";

        $stmt = $this->connect()->prepare($sql);

        # uruchamia przygotowane zapytanie, przyjmuje tablicę z danymi, w kolejności takiej w jakiej będą znaki zapytania uzupełnione
        $stmt->execute([$this->id]);

        # pobranie wszystkich rekordów w postaci tablicy asocjacyjnej
        $timeTable = $stmt->fetchAll();

        foreach( $timeTable as $row ){
            echo $row[T_TABLE_ID] . ' | ' . $row[T_TABLE_T_START] . ' | ' . $row[T_TABLE_T_END];
            echo '<br/>';
        }
    }

    public function startTimer(){

        if ( !$this->checkIfTimerOn() ){
            $this->setStartTime();
        }       

    }

    private function setStartTime(){
        $table = T_TABLE_NAME;
        $col_time_start = T_TABLE_T_START;
        $col_obj_id = T_TABLE_OBJ_ID;
        $col_user_id = T_TABLE_USER_ID;

        $now = $this->getCurrentTime();

        $sql = "INSERT INTO `$table`
                    (`$col_time_start`, `$col_obj_id`, `$col_user_id`) 
                VALUES
                    ('$now', ?, ?)
        ;";

        echo $sql;

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$this->id, $this->user_id]);

    }

    public function stopTimer(){

        if ( $this->checkIfTimerOn() ){
            $lastTimers = $this->getLastTimes();
            $this->setEndTime($lastTimers[0][T_TABLE_ID]);
            
            //echo $lastTimers[0][T_TABLE_ID];
        } 
        
    }

    public function setEndTime($timeId){
        $table = T_TABLE_NAME;
        $col_time_end = T_TABLE_T_END;
        $col_id = T_TABLE_ID;

        $now = $this->getCurrentTime();

        /*$sql = "INSERT INTO `$table`
                    (`$col_time_end`, `$col_obj_id`) 
                VALUES
                    ('$now', ?)
        ;";*/

        $sql = "UPDATE `$table`
            SET
                `$col_time_end` = '$now'
            WHERE
                `$col_id` = ?
        ;";

        echo $sql;

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$timeId]);

    }


    public function checkIfTimerOn(){
        $lastTimers = $this->getLastTimes();

        //var_dump($lastTimers);

        if ( count( $lastTimers ) == 0 ){
            return false;
        }

        if ( $lastTimers[0][T_TABLE_T_START] !== '0000-00-00 00:00:00' && $lastTimers[0][T_TABLE_T_END] === '0000-00-00 00:00:00' ){
            return true;
        }

        
    }


    public function getLastTimes(){
        $table = T_TABLE_NAME;
        $col_id = T_TABLE_ID;
        $col_time_start = T_TABLE_T_START;
        $col_time_end = T_TABLE_T_END;
        $col_obj_id = T_TABLE_OBJ_ID;
        $col_user_id = T_TABLE_USER_ID;

        $sql = "SELECT 
                `$col_id`,
                `$col_time_start`, 
                `$col_time_end`          
            FROM 
                `$table`
            WHERE 
                `$col_obj_id` = ? AND
                `$col_user_id` = ?
            ORDER BY
                `$col_time_start` DESC
            LIMIT 
                1
        ;";

        //echo $sql;

        try {
            $stmt = $this->connect()->prepare($sql);

            $stmt->execute([$this->id, $this->user_id]);

            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            # daje albo 0 wierszy albo 1

            return $rows;
        } catch(PDOException $e) {
            ECHO '<br/> Błąd! ' . $e;
        }

    }

    private function getCurrentTime(){
        return date('Y-m-d H:i:s',time());

        // format w bazie danych 2022-12-25 17:00:46

    }

}