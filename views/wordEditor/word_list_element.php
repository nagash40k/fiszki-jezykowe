



    <tr id="word-<?=$wordId?>">
        <td>
            <?=$lp?>
        </td>
        <td>
            <?=$wordName?>
        </td>
        <td>
            <?=$wordPronunciation?>
        </td>
        <td style="text-align:initial">
            
            <?php
            if ( $descriptions ) {
                foreach( $descriptions as $descrption) {
                    echo DESC_ICON.' ';
                    echo '<span class="word-description">'.$descrption['description'].'</span>';
                    echo '<br/>';
                    echo '<span class="word-description-source">~'.
                            $descrption['source_name']
                        .'</span>';                    
                    echo '<br/>';
                }
            }
            ?>


        </td>
        <td class="align-middle">
            <button id="edit-word-<?=$wordId?>" class="btn btn-primary btn" type="button">Edytuj</button>
        </td>
    </tr>

