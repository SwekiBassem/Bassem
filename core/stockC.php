<?PHP
include "../config.php";
class stockC {
function afficherstock ($stock){
		echo "nom: ".$stock->getNom()."<br>";
		echo "prix: ".$stock->getprix()."<br>";
		echo "quantite: ".$stock->getquantite()."<br>";
		echo "categorie: ".$stock->getcategorie()."<br>";
		echo "fichier: ".$stock->getfichier()."<br>";
	}
	function ajouterstock($stock){
		$sql="insert into stock (nom,prix,quantite,categorie,fichier) values (:nom,:prix,:quantite,:categorie,:fichier)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $nom=$stock->getNom();
        $prix=$stock->getprix();
        $quantite=$stock->getquantite();
		$categorie=$stock->getcategorie();
		$fichier=$stock->getfichier();
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prix',$prix);
		$req->bindValue(':quantite',$quantite);
		$req->bindValue(':categorie',$categorie);
		$req->bindValue(':fichier',$fichier);			
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}

		
	function afficherprods(){
		//$sql="SElECT * From stock e inner join formationphp.stock a on e.id= a.id";
		$sql="SElECT * From stock";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}

	function affichercroissant(){
		//$sql="SElECT * From stock e inner join formationphp.stock a on e.id= a.id";
		$sql="SElECT * From stock order by prix";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}

	function afficherdecroissant(){
		//$sql="SElECT * From stock e inner join formationphp.stock a on e.id= a.id";
		$sql="SElECT * From stock order by prix desc";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}

	function affichersingle($id){
		//$sql="SElECT * From stock e inner join formationphp.stock a on e.id= a.id";
		$sql="SElECT * From stock where id = $id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	
	function afficherstocks(){
		//$sql="SElECT * From stock e inner join formationphp.stock a on e.id= a.id";
		$sql="SElECT * From stock";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerstock($id){
		$sql="DELETE FROM stock where id= :id";
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
	function modifierstock($stock,$id){
		$sql="UPDATE stock SET nom=:nom,prix=:prix,quantite=:quantite,categorie=:categorie,fichier=:fichier WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $nom=$stock->getnom();
        $prix=$stock->getprix();
        $quantite=$stock->getquantite();
		$categorie=$stock->getcategorie();
		$fichier=$stock->getfichier();
		$datas = array(':nom'=>$nom,':prix'=>$prix,':quantite'=>$quantite,':categorie'=>$categorie,':fichier'=>$fichier);
		$req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prix',$prix); 
		$req->bindValue(':quantite',$quantite);	
		$req->bindValue(':categorie',$categorie);
		$req->bindValue(':fichier',$fichier);			
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererstock($id){
		$sql="SELECT * from stock where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListestocks($quantite){
		$sql="SELECT * from stock where quantite=$quantite";
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