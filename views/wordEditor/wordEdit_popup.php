
<!-- Modal -->
<div class="modal modal-lg fade" id="wordEditModal" tabindex="-1" aria-labelledby="wordEditModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="wordEditModalLabel"><?=$lang['editWord']?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form>
        <div class="modal-body">
            <!-- START Ciało Modala -->
            
           
            <div class="mb-3">
                <label for="wordEdit-word" class="form-label"><?=$lang['word']?></label>
                <input type="text" class="form-control" id="wordEdit-word" data-word-id="0" value="">
            </div>

            <div class="mb-3">
                <label for="wordEdit-pronunciation" class="form-label"><?=$lang['pronunciation']?></label>
                <input type="text" class="form-control" id="wordEdit-pronunciation" value="">
            </div>

            <!--
            <div class="mb-3">
                <label for="wordEdit-description" class="form-label"><?=$lang['description']?></label>
                <input type="text" class="form-control" id="wordEdit-description" value="">
            </div>
            -->

            
            
            










            <!-- KONIEC Ciało Modala -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?=$lang['close']?></button>
            <button id="word-edit-submit" type="button" class="btn btn-primary" data-bs-dismiss="modal"><?=$lang['saveChanges']?></button>
        </div>
      </form>
    </div>
  </div>
</div>


<script>

$(document).ready(function(){ 

    $(".word-edit").click(function(event){
        event.preventDefault();
        var thisId =  $(this).attr("id");
        thisId = getIdValue(thisId);
        
        var word = $('#word-'+thisId).html().trim();
        var pronunciation = $('#pronunciation-'+thisId).html().trim();
        console.log('edit '+ word);
        $('#wordEdit-word').val(word);
        $('#wordEdit-word').attr('data-word-id', thisId);
        $('#wordEdit-pronunciation').val(pronunciation);
        //$('#wordEdit-word').val();


        
        
    
        
    });


    $("#word-edit-submit").click(function(event){
        //event.preventDefault();

        var wordId = $('#wordEdit-word').attr('data-word-id');
        var langId = <?=$lang_id?>
        
        var word = $('#wordEdit-word').val();
        var pronunciation = $('#wordEdit-pronunciation').val();

        //console.log(wordId + word + pronunciation);
        $.ajax({
            type: "POST",
            url: 'ajax/word-edit.php',
            data: {
                action: 'word-edit',
                langId: langId,
                wordId: wordId,
                word: word,
                pronunciation: pronunciation
                
            },
            success: function(response) {
                if (!response) {
                    alert('Funkcja z wynikiem False');
                }
                else {
                    console.log(response);
                    $('#word-'+wordId).html(word);
                    $('#pronunciation-'+wordId).html(pronunciation);
                    
                    
                    //const myModal = document.querySelector('#wordEditModal');
                    //myModal.dispose(); // it is asynchronous
                    
                }
            }
        });
        
    });
});    


</script>



