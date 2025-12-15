<?
require_once "helpers.php";

//echo "Name: " . $_GET["name"] . "<br>"
?>

<h5>GET FORM</h5>
<form action="handler.php" method="GET"></form>
<input type="text" placeholder="Иванов Иван Иванович">
<input type="submit" value="send">
</form>




<h5>POST FORM</h5>
<form action="handler.php" method="POST"></form>
<input type="text" placeholder="Иванов Иван Иванович">
<input type="submit" value="send">
</form>