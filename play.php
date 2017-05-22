<HTML>
<HEAD>
<TITLE>Play Page</TITLE>
</HEAD>
<BODY>
<table>
<th>Your Cards</th>
<?php
$servname = "localhost";
$username = "root";
$pass = "pass";
$db = "cards";
$conn = new mysqli($servname, $username, $pass, $db);

if($conn->connect_error){
	echo "DB_ERROR";
	die("Failed" . $conn-connect_error);
}else{
echo "<td>";
$ends = $conn->query("SELECT text FROM ends ORDER BY RAND() limit 10;");
if ($ends->num_rows > 0) {
    // output data of each row
    while($row = $ends->fetch_assoc()) {
        echo $row["text"]. "<br>";
    }
} else {
    echo "0 results";
}
echo "</td>";
echo "<th>Start Card: </th><td>";
$start = $conn->query("SELECT text FROM starts ORDER BY RAND() limit 1;");
echo $start->fetch_assoc()["text"] . "</td>";
}
?>

</table>
</BODY>
</HTML>
