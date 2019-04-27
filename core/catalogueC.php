<?PHP
include "../config.php";
class catalogueC {
function affichercatalogue ($catalogue){
		echo "nom: ".$catalogue->getnom()."<br>";
		echo "fichier: ".$catalogue->getfichier()."<br>";
		echo "descrip: ".$catalogue->getdescrip()."<br>";
	}
	function ajoutercatalogue($catalogue){
		$sql="insert into catalogue (nom,fichier,descrip) values (:nom,:fichier,:descrip)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $nom=$catalogue->getNom();
		$fichier=$catalogue->getfichier();
		$descrip=$catalogue->getdescrip();
		$req->bindValue(':nom',$nom);
		$req->bindValue(':fichier',$fichier);
		$req->bindValue(':descrip',$descrip);			
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}

		
	function afficherprods(){
		//$sql="SElECT * From catalogue e inner join formationphp.catalogue a on e.id= a.id";
		$sql="SElECT * From catalogue";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	
	function affichercatalogues(){
		//$sql="SElECT * From catalogue e inner join formationphp.catalogue a on e.id= a.id";
		$sql="SElECT * From catalogue";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimercatalogue($id){
		$sql="DELETE FROM catalogue where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifiercatalogue($catalogue,$id){
		$sql="UPDATE catalogue SET  nom=:nom,fichier=:fichier,descrip=:descrip WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
		$req=$db->prepare($sql);
        $nom=$catalogue->getnom();
		$fichier=$catalogue->getfichier();
		$descrip=$catalogue->getdescrip();
		$datas = array(':nom'=>$nom,':fichier'=>$fichier,':descrip'=>$descrip);
		$req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':fichier',$fichier);	
		$req->bindValue(':descrip',$descrip);			
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recuperercatalogue($id){
		$sql="SELECT * from catalogue where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListecatalogues($quantite){
		$sql="SELECT * from catalogue where quantite=$quantite";
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