<HTML>
    <TITLE>Judge page</TITLE>
    <HEAD></HEAD>
    <body>
        <FORM NAME="clear" METHOD="POST" ACTION="judge.php">
            <INPUT TYPE="SUBMIT" VALUE="Clear" NAME="clear">

        </FORM>
    <?php
      $serv="localhost";
      $user="root";
      $pass="pass";
      $db="cards";
      $conn=new mysqli($serv, $user, $pass, $db);

if($conn->connect_error){
    echo "DB ERROR";
    die("Failed" . $conn->connect_error);
}else{
    echo "<table> <th>Submitted cards</th><td>";
    $cards=$conn->query("Select text from submitted;");
    if($cards->num_rows>0){
        while($row=$cards->fetch_assoc()){
         echo $row["text"] . "<br>";   
        }
    }else{echo "no cards";}
if(!empty($_POST)){
    $conn->query("delete from submitted where *");
}
}
    ?>
    </body>
</HTML>
