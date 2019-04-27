<?PHP
class catalogue{
	private $id;
	private $nom;
    private $fichier;
    private $descrip;
    function __construct($nom,$fichier,$descrip){
		$this->nom=$nom;
        $this->fichier=$fichier;
        $this->descrip=$descrip;
    }
      
        function getnom(){
            return $this->nom;
        }
        function getid(){
            return $this->id;
        }
        function getfichier(){
            return $this->fichier;
        }
        function getdescrip(){
            return $this->descrip;
        }

        function setnom($nom){
            $this->nom=$nom;
        }
        function setfichier($fichier){
            $this->fichier;
        }
        function setdescrip($descrip){
            $this->descrip;
        }
    }
    ?>