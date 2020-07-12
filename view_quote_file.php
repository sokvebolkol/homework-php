<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>View A Quotation</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<button type="button" class="btn btn-primary mt-4  ">
			<a class="nav-link text-white" href="index.php">Back to Home</a>
		</button>
		<h1>Random Quotation</h1>
			<?php //This script reads in a file and prints a random line from it.
			$data = file('quotes.txt'); // Read the file's contents into an array
			$n = count($data); // Count the number of items in the array:
			$rand = rand(0, ($n - 1)); // Pick a random item:
			print '<p>' . trim($data[$rand]) . '</p>';// Print the quotation:
		?>
	</div>
	
</body>
</html>

