<?PHP
include "../entites/catalogue.php";
include "../core/catalogueC.php";

if (isset($_POST['nom']) and isset($_POST['fichier'])  and isset($_POST['descrip'])){
$catalogue1=new catalogue($_POST['nom'],$_POST['fichier'],$_POST['descrip']);
//Partie2
/*
var_dump($catalogue1);
}
*/
//Partie3


//$id=strlen($_POST['id']);
//$nom=strlen($_POST['nom']);

//if($id > 0 && $nom > 0  ){
$catalogue1C=new catalogueC();
$catalogue1C->ajoutercatalogue($catalogue1);
header('Location: index2.php');

//else {
//	echo"<script> alert(\"3ib\") </script>";
//	header('Location: index-2.php');

//}	
}else{
	echo "vĂ©rifier les champs";
}
//*/

?>