<section class="py-1 text-center container">
    <div class="d-grid gap-2">
        <button class="btn btn-primary btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#wordAddModal">
            <?=$lang['addWord']?>
        </button>
    </div>
</section>


<!-- Modal -->
<div class="modal modal-lg fade" id="wordAddModal" tabindex="-1" aria-labelledby="wordAddModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="wordAddModalLabel"><?=$lang['addWord']?></h1>
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

            
            <div class="mb-3">
                <label for="wordEdit-description" class="form-label"><?=$lang['description']?></label>
                <input type="text" class="form-control" id="wordEdit-description" value="">
            </div>
            

            
            
            










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

    
});    


</script>



