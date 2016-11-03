<!DOCTYPE html>

<html>
<head>   
<link rel="stylesheet" type="text/css" href="design.css"/>
<script>
function Deleteqry(id)
{ 
  if(confirm("Are you sure you want to delete this row?")==true)
           window.location="delete.php?del="+id;
    return false;
}
</script>                                                             
</head>
<body>
<?php
$dbc = mysqli_connect('localhost','root','','appdata') or die('Connection to server FAILED');
if(isset($_POST['name'])){
$name=$_POST['name'];
$score=$_POST['score'];
$query = "INSERT INTO players_data (name,score)".
         "VALUES ('$name',$score)";
$result = mysqli_query($dbc,$query) or die('Error querying database.');
}
$query = "SELECT name,score FROM players_data";

$data = mysqli_query($dbc,$query) or die('Error querying database.');
mysqli_close($dbc);
echo "<table>";
echo "<tr><th>NAME</th> <th>SCORE</th> <th>OPTIONS</th></tr>";

while($row = mysqli_fetch_array($data, MYSQLI_ASSOC)){
	echo "<tr><td>";
	echo $row['name'];
	echo "</td><td>";
	echo $row['score'];
	echo "</td><td>";
	echo "<input type=\"button\" value=\"delete\" name=\"submit\"";
	echo "onclick=\"return Deleteqry(".$row['name'];
	echo ");\" />";
	echo "</form>";
	echo "</td></tr>";
	
}
echo "</table>";
?>
<form method="post" action="">
<label for="name">Name:</label>
<input type="text" id="name" name="name"/></br>
<label for="score">Score:</label>
<input type="number" id="score" name="score"/></br>
<input type="submit" value="submit" name="submit"/>
</form>
</body>
</html>
