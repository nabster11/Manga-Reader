<?php
require_once "config.php";
$result=mysql_query("select link from naruto_loc") or die(mysql_error());
echo '<select>';
$i=0;
while ($result[i]) {
	 echo '<option value="'.$result[i].'">'.$result[i].'</option>';  
	 $i++;
}
echo '</select>';
?>