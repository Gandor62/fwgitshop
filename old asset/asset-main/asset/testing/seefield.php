<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet">
<link href="hide-show-fields-form.css" rel="stylesheet"/>


<form class="p-3">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" placeholder="Joe Smith">
  </div>
  <div class="form-group">
    <label for="seeAnotherField">Do You Want To See Another Field?</label>
    <select class="form-control" id="seeAnotherField">
          <option value="no">No Way.</option>
          <option value="yes">Absolutely!</option>
    </select>
  </div>
  <div class="form-group" id="otherFieldDiv">
    <label for="otherField">Here you go!</label>
    <select class="form-control" id="otherField">
      <option>Yay</option>
      <option>Woo</option>
      <option>Hazah</option>
      <option>Yipee</option>
      <option>Hoorah</option>
    </select>
  </div>
  <div class="form-group">
    <label for="seeAnotherFieldGroup">Do You Want To See Another Group of Fields?</label>
    <select class="form-control" id="seeAnotherFieldGroup">
          <option value="no">Not Particularly.</option>
          <option value="yes">I Guess!</option>
    </select>
  </div>
  <div class="form-group" id="otherFieldGroupDiv">
   <div class="row">
    <div class="col-6">
      <label for="otherField1">Group: Heres One!</label>
      <input type="text" class="form-control w-100" id="otherField1">
    </div>
    <div class="col-6">
      <label for="otherField2">Group: Another One!</label>
      <input type="text" class="form-control w-100" id="otherField2">
    </div>
   
   </div>
    

  </div>
  <div class="form-group">
    <label for="comments">Comments/Questions</label>
    <textarea class="form-control" id="comments" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script src="hide-show-fields-form.js"></script>