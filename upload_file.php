<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Upload a File</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<button type="button" class="btn btn-primary mt-4  ">
			<a class="nav-link text-white" href="index.php">Back to Home</a>
		</button>
		<?php // This script takes a file upload and stores it on the server
		if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.
			// Try to move the uploaded file:
			if (move_uploaded_file ($_FILES['the_file']['tmp_name'], "uploadme/{$_FILES['the_file']['name']}")) {
				print '<p>Your file has been uploaded.</p>'; 	} 
			if (move_uploaded_file ($_FILES['the_file1']['tmp_name'], "uploadme/{$_FILES['the_file1']['name']}")) {
					print '<p>Your file has been uploaded.</p>';	}
			else { print '<p style="color: red;">Your file could not be uploaded because: ';// Problem!
				switch ($_FILES['the_file']['error']) {// Print a message based upon the error:
					case 1:	print 'The file exceeds the upload_max_filesize setting in php.ini';break;
					case 2:	print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form';break;
					case 3:	print 'The file was only partially uploaded';break;
					case 4:	print 'No file was uploaded';break;
					case 6: print 'The temporary folder does not exist.';break;
					default:print 'Something unforeseen happened.';break;
				}
				print '.</p>'; // Complete the paragraph.
			} // End of move_uploaded_file() IF.
		} // End of submission IF.
		?>
		<form action="upload_file.php" enctype="multipart/form-data" method="post">
			<p>Upload a file using this form:</p>
			<input type="hidden" name="MAX_FILE_SIZE" value="300000000">
			<p><input type="file" name="the_file"></p>
			<p><input type="file" name="the_file1"></p>
			<p><input type="submit" name="submit" value="Upload This File"></p>
		</form>
	</div>
</body>
</html>