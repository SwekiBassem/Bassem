<?PHP
class livreur{
	private $cin;
	private $nom;
	private $prenom;
	private $email;
	private $secteur;
	private $etat;
	
	function __construct($cin,$nom,$prenom,$email,$secteur,$etat){
		$this->cin=$cin;
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->email=$email;
		$this->secteur=$secteur;
		$this->etat=$etat;
	
	}
	
	function getCin(){
		return $this->cin;
	}
	function getNom(){
		return $this->nom;
	}
	function getPrenom(){
		return $this->prenom;
	}
	function getSecteur(){
		return $this->secteur;
	}
    function getEtat(){
		return $this->etat;
	}
	 function getEmail(){
		return $this->email;
	}

	function setNom($nom){
		$this->nom=$nom;
	}
	function setPrenom($prenom){
		$this->prenom;
	}
	function setSecteur($secteur){
		$this->secteur=$secteur;
	}
	function setEtat($etat){
		$this->etat=$etat;
	}
	function setEmail($email){
		$this->email=$email;
	}
}

?>