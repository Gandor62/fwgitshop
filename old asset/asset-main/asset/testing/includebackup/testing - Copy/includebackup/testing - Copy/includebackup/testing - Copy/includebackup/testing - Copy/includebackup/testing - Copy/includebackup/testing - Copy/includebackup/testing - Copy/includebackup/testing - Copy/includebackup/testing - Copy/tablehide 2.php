
<?php include_once('../include/config.php');
include "../include/header.php" ;
include "../include/navigation.php"; 

?>



<div class="form-group">
<label for="category1">Kategori</label>
<select id="category1" class="form-control" name="metas[kategori">
<option value="" disabled="" selected="">-Pilih Kategori-</option>
<option value="motor-honda">Sepeda Motor Honda</option>
<option value="elektronik">Elektronik</option>
<option value="modal-kerja">Modal Kerja</option>
<option value="pendukung-operasional">Pendukung Operasional</option>
<option value="lainnya">Lainnya
</option>
</select>
</div>

<div class="form-group" id="otherFieldDiv">
<label for="otherField">Isi Kategori</label>
<input type="text" class="form-control" id="otherField" name="metas[kategori]">
</div>
this is my js

<script>
$("#category1").change(function() {
if ($(this).val() == "lainnya") {
$('#otherFieldDiv').show();
$('#otherField').attr('required', '');
$('#otherField').attr('data-error', 'This field is required.');
} else {
$('#otherFieldDiv').hide();
$('#otherField').removeAttr('required');
$('#otherField').removeAttr('data-error');
}
});
$("#category1").trigger("change");
</script>