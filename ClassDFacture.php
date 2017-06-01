<?php
session_start(); // on démarre la session 

try

{

    $bdd = new PDO('mysql:host=localhost;dbname=facture;charset=utf8', 'root', ''); // on se connecte à la facture 

}

catch (Exception $e)

{

        die('Erreur : ' . $e->getMessage());

}

?>
<?php

//Classe DFacture

class DFacture{


	//Données Membres
	private $_Qte;
	private $_Fact;
	private $_Produit;
	
	
	public function hydratation (array $donnees)
	
	{
		foreach ($donnees as $key =>$mqte,Facture,$mFact,Produit,$mProd)
  {
		// On récupère le nom du setter correspondant à l'attribut.
			$method = 'set'.ucfirst($key);
        
		// Si le setter correspondant existe.
			if (method_exists($this, $method))
		{
		// On appelle le setter.
			$this->$method($getQte,$setQte,$setFact,$setProduit);
		}
  }
		
	}

	//Fcts Membres

	
	public function __construct(){

		
	
	}

	public function __destruct(){

		

	}


	//Mutateurs

	public function getQte(){


		return $this->_Qte;
	}

	
	public function setQte($mQte){

		$this->_Qte=$mQte;

	}

	public function setFact(Facture $mFact){


		 $this->_Fact=$mFact;
	}

	public function setProduit(Produit $mProd){


		 $this->_Produit=$mProd;
	}

	
	public function affiche(){

		echo $this->_Qte."<br/>";
		
		
	}

	
	
}


?>

<?php
class DetailleFacturemanager
{
  private $_db; 

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function Dfacture($mqte,Facture,$mFact,Produit,$mProd)
  {
    $q = $this->_db->prepare('INSERT INTO facture(idP,idF,qte) VALUES(:idP, :idF, :qte)');

    $q->bindValue(':qte', $mqte->getQte(),PDO ::PARAM_INT);
    $q->bindValue(':idF', $mFact->setFact(), PDO::PARAM_INT);
    $q->bindValue(':idP', $mProd->setProduit(), PDO::PARAM_INT);
 

    $q->execute();
  }


}