<?PHP
class stock{
	private $id;
	private $nom;
	private $prix;
	private $quantite;
	private $categorie;
	private $fichier;
	function __construct($nom,$prix,$quantite,$categorie,$fichier){
		$this->nom=$nom;
		$this->prix=$prix;
		$this->quantite=$quantite;
		$this->categorie=$categorie;
		$this->fichier=$fichier;
	}
	
	function getnom(){
		return $this->nom;
	}
	function getprix(){
		return $this->prix;
	}
	function getquantite(){
		return $this->quantite;
	}
	function getcategorie(){
		return $this->categorie;
	}
	function getfichier(){
		return $this->fichier;
	}

	function setnom($nom){
		$this->nom=$nom;
	}
	function setprix($prix){
		$this->prix;
	}
	function setquantite($quantite){
		$this->quantite;
	}
	function setcategorie($categorie){
		$this->categorie;
	}
	function setfichier($fichier){
		$this->fichier;
	}
	
}

?>