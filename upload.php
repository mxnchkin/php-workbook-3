<head>
	<title>Control - V0.1</title>
</head>

<body>
	<h1 id="center">Test Screen Resolution</h1>

<?php
try {

//	$target_dir = "uploads/"; // permissions need to be set on this folder
	$target_file = "uploads/" . basename($_FILES["fileToUpload"]["name"]);

// Check if file already exists
	if (file_exists($target_file)) {
		throw new Exception("File already exists");		
	}

// Check file size
	if ($_FILES["fileToUpload"]["size"] > 100000) {
		throw new Exception("File is too large");				
	}

// try to upload file
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		echo "The file ". basename($_FILES["fileToUpload"]["name"]). " has been uploaded.";
	} else {
		echo "Sorry, there was an error uploading your file.";
	}

} catch(Throwable $e) {
    echo $e->getMessage();
}

?>

</body>
