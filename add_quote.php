<!doctype html>
<html lang="en">
	<head>	
	<meta charset="utf-8">	
	<title>Add A Quotation</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
	</head>
<body>
	<div class="container">
		<button type="button" class="btn btn-primary mt-4  ">
			<a class="nav-link text-white" href="index.php">Back to Home</a>
		</button>
		<?php 
		$file = 'quotes.txt'; //cannot use parent ../ if using a+ mode
		if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.
			if ( !empty($_POST['quote']) && ($_POST['quote'] != 'Enter your quotation here.') ) { 
				if (is_writable($file)) { // checks the file if it is written
				file_put_contents($file, $_POST['quote'] . PHP_EOL, FILE_APPEND); //write to data
					print '<p>Your quotation has been stored.</p>';// Print a message:
				} else { // Could not open the file.
				print '<p style="color: red;">quotation could not be stored due to a system error.</p>';
				}
			} else { // Failed to enter a quotation.
				print '<p style="color: red;">Please enter a quotation!</p>';
			}
		} 
		?>
		<form action="add_quote.php" method="post" class="mt-4">
			<textarea name="quote" rows="5" cols="30">Enter your quotation here.
			</textarea><br>
			<input type="submit" name="submit" value="Add This Quote!">
		</form>
	</div>
	

</body>
</html>