<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Art Games - Test</title>

    <!-- css -->
    <link rel="stylesheet" href="assets/css/style.css" />

    <!-- js -->
    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
  </head>
  <body>
    <h1>Search results in a json file</h1>
    <input type="text" />
    <div id="result"></div>

    <script type="text/javascript">
    	$(document).ready(function() {
    		$('input[type=text]').keyup(function() {
    			//$('#result').html($(this).val());
    			var searchData = $(this).val();

    			$.ajax({
    				url: "search_json.php?searchData="+searchData, 
    				success: function(data){
        						$("#result").html(data);
    						}
    			});
    		});
    	});
    </script>
  </body>
</html>
