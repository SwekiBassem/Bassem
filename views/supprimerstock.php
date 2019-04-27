<?PHP
include "../core/stockC.php";
$stockC=new stockC();
if (isset($_POST["id"])){
	$stockC->supprimerstock($_POST["id"]);
	header('Location: index-2.php');
}

?>