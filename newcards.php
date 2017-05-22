<html>
<head>
<title>Card Creation</title>
</head>
<body>
<FORM NAME = "newstart" METHOD = "POST" ACTION = "newcards.php">
	<INPUT TYPE = "TEXT" VALUE = "Card Text" NAME = "text">
	<INPUT TYPE = "TEXT" VALUE = "Group" NAME = "group">
	<INPUT TYPE = "HIDDEN" VALUE = "starts" NAME = "type">
	<INPUT TYPE = "SUBMIT" VALUE = "Submit Start Card" NAME = "submit">
</FORM>
<FORM NAME = "newend" METHOD = "POST" ACTION = "newcards.php">
	<INPUT TYPE = "TEXT" VALUE = "Card Text" NAME = "text">
	<INPUT TYPE = "TEXT" VALUE = "Group" NAME = "group">
	<INPUT TYPE = "HIDDEN" VALUE = "ends" NAME = "type">
	<INPUT TYPE  = "SUBMIT" VALUE = "Submit End Card" NAME = "submit">
</FORM>
<FORM NAME = "delete" METHOD = "POST" ACTION = "newcards.php">
	<INPUT TYPE = "TEXT" VALUE + "Card to delete" NAME = "text">
	<INPUT TYPE = "HIDDEN" VALUE = "delete" NAME = "type">
	<INPUT TYPE = "SUBMIT" VALUE = "Delete" NAME = "delbutton">
</FORM>
<?php

$servname = "localhost";
$username = "root";
$password = "pass";
$db = "cards";
$conn = new mysqli($servname, $username, $password, $db);

if($_POST){
$stext = $_POST['text'];
$sgroup = $_POST['group'];
$type = $_POST['type'];
$stext = $conn->real_escape_string($stext);

if($conn->connect_error){
	echo "DB connection error";
	die("Failed" . $conn->connect_error);
}elseif($type=="delete"){
	$conn->query("UPDATE starts SET deleteflag=True WHERE text='$stext'");
	$conn->query("UPDATE ends SET deleteflag=True WHERE text='$stext'");
}elseif($stext != "" && $sgroup != ""){
	if($conn->query("INSERT INTO `$type` (text, player_group) VALUES ('$stext', '$sgroup');")){
		echo "Success!";
	}else{
		echo "Fail";
	}
}else{
	echo "empty field";
}
}


if($conn ->connect_error){
	echo "DB HELL";
}else{
$starts = $conn->query("SELECT text FROM starts;");
$ends = $conn->query("SELECT text FROM ends;");
echo "<table><tr><th>Starts</th><th>Ends</tr><tr><td>";
if ($starts->num_rows > 0) {
    // output data of each row
    while($row = $starts->fetch_assoc()) {
        echo $row["text"]. "<br>";
    }
} else {
    echo "0 results";
}
echo "</td><td>";
if ($ends->num_rows > 0) {
    // output data of each row
    while($row2 = $ends->fetch_assoc()) {
        echo $row2["text"]. "<br>";
    }
} else {
    echo "0 results";
}
echo "</td></tr></table>";
}

?>

</body>
</html>
