<?php
    require_once "config.php";
	include 'functions.php';
if(isset($_FILES['fupload'])) {
	$filename = $_FILES['fupload']['name'];
	$source = $_FILES['fupload']['tmp_name'];
	$type = $_FILES['fupload']['type'];
	$name = explode('.', $filename); 
	$target = 'extracted/' . $name[0];
	$accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
	foreach($accepted_types as $mime_type) {
		if($mime_type == $type) {
			$okay = true;
			break;
		} 
	}
	$okay = strtolower($name[1]) == 'zip' ? true : false;

	if(!$okay) {
		die("Please choose a zip file, dummy!");
	}
	mkdir($target);
	$saved_file_location = $target . $filename;
	
	if(move_uploaded_file($source, $target . $filename)) {
		openZip($saved_file_location);
	} else {
		die("There was a problem");
	}
	
	$scan = scandir($target);
	
	print '<ul>';
	for($i = 0; $i<count($scan); $i++) {
		if (strlen($scan[$i]) >= 3) { 
			$check_for_html_doc = strpos($scan[$i], '.html');
			$check_for_php = strpos($scan[$i], '.php');
			if ($check_for_html_doc === false && $check_for_php === false){
				echo '<li><a href="' . $target. '/' . $scan[$i] . '">' . $scan[$i] . '</a>';
				$r=mysql_query("insert into naruto_loc values(NULL,'$name[0]/$scan[$i]')") or die(mysql_error());
			} else {
				//
			}
		}	
	}
	print '</ul>';
	if(isset($_POST['title']))
	{
	$n=$_POST['title'];
	}
	$i=count($scan);
	$d=mysql_query("insert into naruto (title,date1,vol_no,no_pages)values('$n',sysdate(),'$name[0]',$i)") or die(mysql_error());
} 
?>

<!DOCTYPE html>
 
<html>
  <head>
    <title>Dump a volume</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
        <link rel="stylesheet" href="css/default.css" />

  </head>
  <body>
    <div id="container">
	<h1>Upload A Zip File</h1>
	<form enctype="multipart/form-data" action="" method="post">
	    Title of Volume:<input type="text" name="title" size="40"/></br></br>
		<input type="file" name="fupload" /><br />
		<input type="submit" value="Upload Zip File" />
	</form>

    </div>
  </body>
</html>
