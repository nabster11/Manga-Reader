<h1>UPDATE MANGA_INFO</h1>
<form action="" method="post" autocomplete="on">
TITLE: <input type="text" size="50" name="title" placeholder="Please enter a valid manga title" required></br></br>
AUTHOR'S NAME: <input type="text" name="author" size="50" placeholder="Enter Authors name" required></br></br>
Reading (Left to Right or Right to left): 
<select name="reading">
  <option value="L">L TO R</option>
  <option value="R">R TO L</option>
</select></br></br>
RELEASED DATE:<input type="date" name="date"></br></br>
STATUS:
<select name="status">
  <option value="ongoing">ONGOING</option>
  <option value="complete">COMPLETE</option>
</select></br></br>
<input type="submit" value="Update the Series" name="submit">
</form>



<?php
require_once "config.php";
if(isset($_POST['title']))
{
$title = $_POST['title'];
}
if(isset($_POST['author']))
{
$author = $_POST['author'];
}
if(isset($_POST['reading']))
{
$reading = $_POST['reading'];
}
if(isset($_POST['date']))
{
$date = $_POST['date'];
}
if(isset($_POST['status']))
{
$status = $_POST['status'];
}


if(isset($_POST['submit']))
{
$f="call update1('$title','$author','reading','date','$status')";
$s=mysql_query($f) or  die(mysql_error());
}
?>