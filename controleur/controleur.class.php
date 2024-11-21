<?php
require_once ("modele/modele.class.php");

class Controleur
{
    private $unModele;

    public function __construct()
    {
        $this->unModele = new Modele();
    }

    /**************** Gestions des Membres ****************/

    public function selectAllMembres()
    {
        return $this->unModele->selectAllMembre();
    }
    public function insertMembre($tab)
    {
        $this->unModele->insertMembre($tab);
    }
    public function selectLikeMembres($filtre)
    {
        return $this->unModele->selectLikeMembre($filtre);
    }
    public function deleteMembre($idMembre)
    {
        $this->unModele->deleteMembre($idMembre);
    }
    public function selectWhereMembre($idMembre)
    {
        return $this->unModele->selectWhereMembre($idMembre);
    }
    public function updateMembre($tab)
    {
        $this->unModele->updateMembre($tab);
    }

    /**************** Gestions des Dons ****************/

    public function selectAllDons()
    {
        return $this->unModele->selectAllDons();
    }
    public function insertDon($tab)
    {
        $this->unModele->insertDons($tab);
    }
    public function selectLikeDons($filtre)
    {
        return $this->unModele->selectLikeDons($filtre);
    }
    public function deleteDon($idDon)
    {
        $this->unModele->deleteDons($idDon);
    }
    public function selectWhereDon($idDon)
    {
        return $this->unModele->selectWhereDons($idDon);
    }
    public function updateDon($tab)
    {
        $this->unModele->updateDons($tab);
    }

    /**************** Gestions des Pays ****************/

    public function selectAllPays()
    {
        return $this->unModele->selectAllPays();
    }
    public function insertPays($tab)
    {
        $this->unModele->insertPays($tab);
    }
    public function selectLikePays($filtre)
    {
        return $this->unModele->selectLikePays($filtre);
    }
    public function deletePays($idPays)
    {
        $this->unModele->deletePays($idPays);
    }
    public function selectWherePays($idPays)
    {
        return $this->unModele->selectWherePays($idPays);
    }
    public function updatePays($tab)
    {
        $this->unModele->updatePays($tab);
    }

    /**************** Gestions des Projets ****************/

    public function selectAllProjets()
    {
        return $this->unModele->selectAllProjets();
    }
    public function insertProjet($tab)
    {
        $this->unModele->insertProjets($tab);
    }
    public function selectLikeProjets($filtre)
    {
        return $this->unModele->selectLikeProjets($filtre);
    }
    public function deleteProjet($idProjet)
    {
        $this->unModele->deleteProjets($idProjet);
    }
    public function selectWhereProjet($idProjet)
    {
        return $this->unModele->selectWhereProjets($idProjet);
    }
    public function updateProjet($tab)
    {
        $this->unModele->updateProjets($tab);
    }


    public function verifConnexion($email, $mdp){
        // controler les données du user avant connexion
        $tab = array("email"=>$email, "mdp"=>$mdp);

        if ($this->verifDonnees($tab)) {
            // retourner le user
            return $this->unModele->verifConnexion($email, $mdp);
        }else{
            return false;
        }
    }

    public function verifDonnees($tab)
    {
        $verif = true;

        foreach ($tab as $cle => $valeur)
        {
            if ($valeur == "" || $valeur == null)
            {
                $verif = false;
            }
        }
        return $verif;
    }

}
?>