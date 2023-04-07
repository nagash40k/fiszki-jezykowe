



    <tr>
        <td>
            <?=$lp?>
        </td>
        <td id="word-<?=$wordId?>">
            <?=$wordName?>
        </td>
        <td id="pronunciation-<?=$wordId?>">
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
            <button id="edit-word-<?=$wordId?>" class="btn btn-primary btn word-edit" type="button" data-bs-toggle="modal" data-bs-target="#wordEditModal">
                <?=$lang['edit']?>
            </button>
        </td>
    </tr>
<!--edit-word-<?=$wordId?>-->
