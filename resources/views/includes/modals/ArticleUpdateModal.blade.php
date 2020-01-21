<div id="updateModal" class="modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <!-- form -->

                <form method="POST" id="updateArticleForm">
                 @csrf
                
                <input type="hidden" value="{{ csrf_token() }}" id="tokenHiddenId">
                <input type="hidden" value="" id="idHidden">
                <div class="form-group">
                <label for="title">Name: </label>
                <input type="text" class="form-control" id="nameId" aria-describedby="emailHelp" placeholder="Enter Name" name="title" value="">
                </div>
                <div class="form-group">
                <label for="Description">Lastname: </label>
                <input type="text" class="form-control" id="lastnameId" aria-describedby="Description" placeholder="Enter Lastname" name="description" value="">
                </div>
                <div class="form-group">
                <label>Gender:</label>
                <br>
                
                <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="radioGender" id="radioMaleId" value="Male">
                <label class="form-check-label" for="exampleRadios1">
                    Male
                </label>
                </div>
                <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="radioGender" id="radioFemaleId" value="Female" >
                <label class="form-check-label" for="exampleRadios2">
                    Female
                </label>
                </div>
                <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="radioGender" id="radioOtherId" value="other">
                <label class="form-check-label" for="exampleRadios2">
                    Other
                </label>
                </div>
            </div>
           
            <div class="form-group">
                <label>Status:</label>
                <br>
            <div class="form-check-inline">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="ChkboxCivilStatus" value="True" id="statusId">Confirm
            </label>
            </div>
            </div>

            <div class="form-group">
            <label for="sel1">Select School:</label>
            <select class="form-control" name="schoolName" id="schooldId">
                <option>FEU</option>
                <option>STI</option>
                <option>UST</option>
                <option>PUP</option>
            </select>
            </div>
            <br>
                </form>

        <!-- end of form -->
      </div>
      <div class="modal-footer">
         <button type="submit" class="btn btn-primary" id="article_update">Update Article</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>