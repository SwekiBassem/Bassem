<?PHP
include "C:/wamp64/www/tajriba/config.php";
class livreurC {
function afficherlivreur ($livreur){
		echo "Cin: ".$livreur->getCin()."<br>";
		echo "Nom: ".$livreur->getNom()."<br>";
		echo "Prénom: ".$livreur->getPrenom()."<br>";
		echo "email: ".$livreur->getEmail()."<br>";
		echo "secteur: ".$livreur->getSecteur()."<br>";
		echo "etat: ".$livreur->getEtat()."<br>";

	}
	function ajouterlivreur($livreur){
		$sql="insert into livreur (cin,nom,prenom,email,secteur,etat) values (:cin, :nom,:prenom,:email,:secteur,:etat)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $cin=$livreur->getCin();
        $nom=$livreur->getNom();
        $prenom=$livreur->getPrenom();
		$email=$livreur->getEmail();
		$secteur=$livreur->getSecteur();
		$etat=$livreur->getEtat();
		$req->bindValue(':cin',$cin);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':email',$email);
		$req->bindValue(':secteur',$secteur);
		$req->bindValue(':etat',$etat);		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherlivreurs(){
		//$sql="SElECT * From livreur e inner join formationphp.livreur a on e.cin= a.cin";
		$sql="SElECT * From livreur";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerlivreur($cin){
		$sql="DELETE FROM livreur where cin= :cin";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':cin',$cin);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierlivreur($livreur,$cin){
		$sql="UPDATE livreur SET cin=:cinn, nom=:nom,prenom=:prenom,email=:email,secteur=:secteur,etat=:etat WHERE cin=:cin";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$cinn=$livreur->getCin();
        $nom=$livreur->getNom();
        $prenom=$livreur->getPrenom();
		$email=$livreur->getEmail();
		$secteur=$livreur->getSecteur();
		$etat=$livreur->getEtat();
		$datas = array(':cinn'=>$cinn, ':cin'=>$cin, ':nom'=>$nom,':prenom'=>$prenom,':email'=>$email,':secteur'=>$secteur,':etat'=>$etat);
		$req->bindValue(':cinn',$cinn);
		$req->bindValue(':cin',$cin);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':email',$email);
		$req->bindValue(':secteur',$secteur);
		$req->bindValue(':etat',$etat);		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererlivreur($cin){
		$sql="SELECT * from livreur where cin=$cin";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function afficherlivreursT(){
		$sql="SElECT * From livreur ORDER BY nom ";
		//$sql="SElECT * From panier";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	
	function rechercherListelivreurs($secteur){
		$sql="SELECT * from livreur where secteur=$secteur";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}

?>