	<script type="text/javascript" language="javascript" src="../../media/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function (e){
$("#uploadForm").on('submit',(function(e){
e.preventDefault();
$.ajax({
url: "upload_add.php",
type: "POST",
data:  new FormData(this),
contentType: false,
cache: false,
processData:false,
success: function(data){
$("#targetLayer").html(data);
},
error: function(){} 	        
});
}));
});
</script>
</script>
<form id="uploadForm" action="upload_add.php" method="post">
<label>Upload Image File:</label><br/>
<input name="userImage" type="file" class="inputFile" /><input name="name" type="text" class="inputFile" />
<input type="submit" value="Submit" class="btnSubmit" />
</form>