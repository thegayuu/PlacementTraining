<?php
session_start();
include("include/dbconnect.php");
$uname=$_SESSION['uname'];


?>
<!doctype html>
 
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Capture Web camera image using WebcamJS and PHP - Theonlytutorials.com</title>
	<style type="text/css">
		body { font-family: Helvetica, sans-serif; }
		h2, h3 { margin-top:0; }
		form { margin-top: 15px; }
		form > input { margin-right: 15px; }
		#results { float:right; margin:20px; padding:20px; border:1px solid; background:#ccc; }
	</style>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
/*$(document).ready(function() {
 	 $("#responsecontainer").load("img.php");
   var refreshId = setInterval(function() {
      take_snapshot()
      $("#responsecontainer").load('img.php');
   }, 10000);
   $.ajaxSetup({ cache: false });
});*/
</script>	
</head>
<body onLoad="take_snapshot()">
<div id="responsecontainer">
	<div id="results">Your captured image will appear here...</div>
	<div id="my_camera"></div>
	
	<!-- First, include the Webcam.js JavaScript Library -->
	<script type="text/javascript" src="webcam.js"></script>
	
	<!-- Configure a few settings and attach camera -->
	<script language="JavaScript">
		Webcam.set({
			width: 600,
			height: 460,
			image_format: 'jpeg',
			jpeg_quality: 90
		});
		Webcam.attach( '#my_camera' );
	</script>
	
	<!-- A button for taking snaps -->
	<form>
		<input type=button value="Take Snapshot" onClick="take_snapshot()">
	</form>
	
	<!-- Code to handle taking the snapshot and displaying it locally -->
	<script language="JavaScript">
		function take_snapshot() {
			// take snapshot and get image data
			Webcam.snap( function(data_uri) {
				// display results in page
				
					
				Webcam.upload( data_uri, 'saveimage.php', function(code, text) {
					document.getElementById('results').innerHTML = 
					'<h2>Here is your image:</h2>' + 
					'<img src="'+text+'"/>';
				} );	
			} );
		}
	</script>



</div>	
</body>
</html>