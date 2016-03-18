<script type="text/javascript" language="javascript" src="../media/js/jquery.dataTables.js"></script>


<script type="text/javascript">
		$(document).ready(function() {

			$("input").keypress(function(event) {
			    if (event.which == 13) {
			        event.preventDefault();
			        $("#search").submit();
			    }
			});
	
			
			/*$('#search').keydown(function() {
				if (event.keyCode == 13) {
				// As ASCII code for ENTER key is "13"
				$('#search').submit(); // Submit form code
				}
			});*/
		});
                
                </script>
