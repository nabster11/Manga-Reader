<html>
<body>
<h1>DUMP MANGA INFORMATION</h1>
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
<input type="submit" value="Create the Series" name="submit">
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
$res = mysql_query("create table if not exists manga_info (id int auto_increment,title varchar(50) not null,author varchar(50),reading varchar(30),date1 date,status varchar(30),primary key(id),UNIQUE key(id,title))") or die(mysql_error());
$result=mysql_query("insert into manga_info (title,author,reading,date1,status)values('$title','$author','$reading','$date','$status')") or die(mysql_error());
} 
?>
</body>
</html>

