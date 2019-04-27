<?PHP
include "../core/catalogueC.php";
$catalogueC=new catalogueC();
if (isset($_POST["id"])){
	$catalogueC->supprimercatalogue($_POST["id"]);
	header('Location: index2.php');
}

?>