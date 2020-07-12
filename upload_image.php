<!DOCTYPE html">
<html lang="en">
<head>	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Upload an Image</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<style type="text/css" title="text/css" media="all">
				.error {		font-weight: bold;
								color: #C00;
				}
		</style>

</head>
<body>
	<div class="container">
		<button type="button" class="btn btn-primary mt-4  ">
			<a class="nav-link text-white" href="index.php">Back to Home</a>
		</button>
		<?php 
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_FILES['upload'])) {// Check for an uploaded file:
				// Validate the type. Should be JPEG or PNG.
				$allowed = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 
									'image/PNG', 'image/png', 'image/x-png');
				if (in_array($_FILES['upload']['type'], $allowed)) {
					if (move_uploaded_file ($_FILES['upload']['tmp_name'], "uploadme/{$_FILES['upload']['name']}")) {
						echo '<p><em>The file has been uploaded!</em></p>';
					} // End of move... IF.			
				} else { // Invalid type.
					echo '<p class="error">Please upload a JPEG or PNG image.</p>';
				}
			} // End of isset($_FILES['upload']) IF.
			if ($_FILES['upload']['error'] > 0) {	// Check for an error:
				echo '<p class="error">The file could not be uploaded because: <strong>';		
				switch ($_FILES['upload']['error']) {
					case 1:	print 'The file exceeds the upload_max_filesize setting in php.ini.';	break;
					case 2:	print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form.';	break;
					case 3:	print 'The file was only partially uploaded.';	break;
					case 4:	print 'No file was uploaded.';	break;
					case 6:	print 'No temporary folder was available.';	break;
					case 7:	print 'Unable to write to the disk.';	break;
					case 8:	print 'File upload stopped.';	break;
					default:print 'A system error occurred.';	break;
				} // End of switch.
				print '</strong></p>';
			} // End of error IF.
			if (file_exists ($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name']) ) {
				unlink ($_FILES['upload']['tmp_name']);	// Delete the file if it still exists:
			}			
		} // End of the submitted conditional.
		?>
		<form enctype="multipart/form-data" action="upload_image.php" method="post">
			<input type="hidden" name="MAX_FILE_SIZE" value="524288" />
			<fieldset><legend>Select a JPEG or PNG image of 512KB or smaller to be uploaded:</legend>
				<p><b>File:</b> <input type="file" name="upload" /></p>
			</fieldset>
			<div align="center"><input type="submit" name="submit" value="Submit" /></div>
		</form>
	</div>
</body>
</html>