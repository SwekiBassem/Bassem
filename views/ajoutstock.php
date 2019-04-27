<?PHP
include "../entites/stock.php";
include "../core/stockC.php";

if (isset($_POST['nom']) and isset($_POST['prix']) and isset($_POST['quantite']) and isset($_POST['categorie']) and isset($_POST['fichier'])){
$stock1=new stock($_POST['nom'],$_POST['prix'],$_POST['quantite'] ,$_POST['categorie'] ,$_POST['fichier']);
//Partie2
/*
var_dump($stock1);
}
*/
//Partie3
$nom=strlen($_POST['nom']);
$prix=$_POST['prix'];
$quantite=$_POST['quantite'];
$categorie=strlen($_POST['categorie']);

if($nom > 0 && $prix > 0 && $quantite > 0 && $categorie > 0 ){
$stock1C=new stockC();
$stock1C->ajouterstock($stock1);
header('Location: index-2.php');
}
else {
	echo"<script> alert(\"3ib\") </script>";
	header('Location: index-2.php');

}	
}else{
	echo "vĂ©rifier les champs";
}
//*/

?>