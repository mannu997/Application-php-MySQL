<?php
if (isset($_POST['del'])){
$dbc = mysqli_connect('localhost','root','','appdata') or die('Connection to server FAILED');
$query = "DELETE FROM players_data WHERE name=".$_POST['del'];

$result = mysqli_query($dbc,$query) or die('Error querying database.');
mysqli_close($dbc);

echo "Entry Deleted!!";

}
echo "Return back to Content area";
echo "<form method=\"get\" action=\"index.php\">";
echo "<input type=\"submit\" />";
echo "</form>";
?>