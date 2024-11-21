<?php
    class Modele
    {
        private $unPdo;

        public function __construct()
        {
            $this->unPdo = null;
            try {
                $serveur = "localhost";
                $bdd = "slam_association";
                $user = "root";
                $mdp = "";
                $this->unPdo = new PDO("mysql:host=" . $serveur . ";dbname=" . $bdd, $user, $mdp);
            } catch (PDOException $exp) {
                echo "Erreur de connexion à la base de données : " . $exp->getMessage();
            }
        }

        /************ GESTION DES MEMBRE ************/

        public function selectAllMembre()
        {
            $requete = "select * from membre";
            $select = $this->unPdo->prepare($requete);
            $select->execute();
            return $select->fetchAll();
        }

        public function insertMembre($tab)
        {
            $requete = "insert into membre values(null, :nom, :prenom, :adresse, :email, :tel)";
            $insert = $this->unPdo->prepare($requete);
            $donnees = array(":nom" => $tab["nom"], ":prenom" => $tab["prenom"],
                ":adresse" => $tab["adresse"], ":email" => $tab["email"], ":tel" => $tab["tel"]);
            $insert->execute($donnees);
        }

        public function selectLikeMembre($filtre)
        {
            $requete = "select * from membre where nom like :filtre or prenom like :filtre or adresse like :filtre 
                        or email like :filtre or tel like :filtre";
            $select = $this->unPdo->prepare($requete);
            $donnees = array(":filtre" => "%" . $filtre . "%");
            $select->execute($donnees);
            return $select->fetchAll();
        }

        public function deleteMembre($idMembre)
        {
            $requete = "delete from membre where idMembre = :idMembre";
            $delete = $this->unPdo->prepare($requete);
            $donnees = array(":idMembre" => $idMembre);
            $delete->execute($donnees);
        }

        public function selectWhereMembre($idMembre)
        {
            $requete = "select * from membre where idMembre = :idMembre";
            $select = $this->unPdo->prepare($requete);
            $donnees = array(":idMembre" => $idMembre);
            $select->execute($donnees);
            return $select->fetch();
        }

        public function updateMembre($tab)
        {
            $requete = "update membre set nom = :nom, prenom = :prenom, adresse = :adresse, 
                  email = :email, tel = :tel where idMembre = :idMembre";
            $update = $this->unPdo->prepare($requete);
            $donnees = array(":nom" => $tab["nom"], ":prenom" => $tab["prenom"],
                ":adresse" => $tab["adresse"], ":email" => $tab["email"], ":tel" => $tab["tel"], ":idMembre" => $tab["idMembre"]);
            $update->execute($donnees);
        }


        /************ GESTION DES Dons ************/

        public function selectAllDons()
        {
            $requete = "select * from don";
            $select = $this->unPdo->prepare($requete);
            $select->execute();
            return $select->fetchAll();
        }

        public function insertDons($tab)
        {
            $requete = "insert into don values(null, :date, :montant, :commentaire,:idMembre )";
            $insert = $this->unPdo->prepare($requete);
            $donnees = array(":date" => $tab["dateDon"], ":montant" => $tab["montant"],
                ":commentaire" => $tab["commentaire"], ":idMembre" => $tab["idMembre"]);
            $insert->execute($donnees);
        }

        public function selectLikeDons($filtre)
        {
            $requete = "select * from don where montant like :filtre or dateDons like :filtre or idDonateur like :filtre 
                or idProjet like :filtre";
            $select = $this->unPdo->prepare($requete);
            $donnees = array(":filtre" => "%" . $filtre . "%");
            $select->execute($donnees);
            return $select->fetchAll();
        }

        public function deleteDons($idDon)
        {
            $requete = "delete from don where idDon = :idDon";
            $delete = $this->unPdo->prepare($requete);
            $donnees = array(":idDon" => $idDon);
            $delete->execute($donnees);
        }

        public function selectWhereDons($idDons)
        {
            $requete = "select * from don where idDon = :idDon";
            $select = $this->unPdo->prepare($requete);
            $donnees = array(":idDon" => $idDons);
            $select->execute($donnees);
            return $select->fetch();
        }

        public function updateDons($tab)
        {

            $requete = "update don set dateDon = :dateDon, montant = :montant, commentaire = :commentaire, 
            idMembre = :idMembre where idDon = :idDons";
            $update = $this->unPdo->prepare($requete);
            $donnees = array(":dateDon" => $tab["dateDon"], ":montant" => $tab["montant"],
                ":commentaire" => $tab["commentaire"], ":idMembre" => $tab["idMembre"], ":idDons" => $tab["idDon"]);
            $update->execute($donnees);
        }

        /************ GESTION DES Pays ************/

        public function selectAllPays()
        {
            $requete = "select * from pays";
            $select = $this->unPdo->prepare($requete);
            $select->execute();
            return $select->fetchAll();
        }

        public function insertPays($tab)
        {
            $requete = "insert into pays values(null, :nomPays, :continent)";
            $insert = $this->unPdo->prepare($requete);
            $donnees = array(":nomPays" => $tab["nomPays"], ":continent" => $tab["continent"]);
            $insert->execute($donnees);
        }

        public function selectLikePays($filtre)
        {
            $requete = "select * from pays where nomPays like :filtre or code like :filtre";
            $select = $this->unPdo->prepare($requete);
            $donnees = array(":filtre" => "%" . $filtre . "%");
            $select->execute($donnees);
            return $select->fetchAll();
        }

        public function deletePays($idPays)
        {
            $requete = "delete from pays where idPays = :idPays";
            $delete = $this->unPdo->prepare($requete);
            $donnees = array(":idPays" => $idPays);
            $delete->execute($donnees);
        }

        public function selectWherePays($idPays)
        {
            $requete = "select * from pays where idPays = :idPays";
            $select = $this->unPdo->prepare($requete);
            $donnees = array(":idPays" => $idPays);
            $select->execute($donnees);
            return $select->fetch();
        }

        public function updatePays($tab)
        {
            $requete = "update pays set nomPays = :nomPays, continent = :continent where idPays = :idPays";
            $update = $this->unPdo->prepare($requete);
            $donnees = array(":nomPays" => $tab["nomPays"], ":continent" => $tab["continent"], ":idPays" => $tab["idPays"]);
            $update->execute($donnees);
        }

        /************ GESTION DES PROJETS ************/

        public function selectAllProjets()
        {
            $requete = "SELECT * FROM projet";
            $select = $this->unPdo->prepare($requete);
            $select->execute();
            return $select->fetchAll();
        }

        public function insertProjets($tab)
        {
            $requete = "INSERT INTO projet VALUES (null, :nomProjet, :description, :budget, :idPays)";
            $insert = $this->unPdo->prepare($requete);
            $donnees = array(
                ":nomProjet" => $tab["nom"],
                ":description" => $tab["description"],
                ":budget" => $tab["budget"],
                ":idPays" => $tab["idPays"]
            );
            $insert->execute($donnees);
        }

        public function selectLikeProjets($filtre)
        {
            $requete = "SELECT * FROM projet WHERE nomProjet LIKE :filtre OR description LIKE :filtre OR budget LIKE :filtre OR idProjet LIKE :filtre";
            $select = $this->unPdo->prepare($requete);
            $donnees = array(":filtre" => "%" . $filtre . "%");
            $select->execute($donnees);
            return $select->fetchAll();
        }

        public function deleteProjets($idProjet)
        {
            $requete = "DELETE FROM projet WHERE idProjet = :idProjet";
            $delete = $this->unPdo->prepare($requete);
            $donnees = array(":idProjet" => $idProjet);
            $delete->execute($donnees);
        }

        public function selectWhereProjets($idProjet)
        {
            $requete = "SELECT * FROM projet WHERE idProjet = :idProjet";
            $select = $this->unPdo->prepare($requete);
            $donnees = array(":idProjet" => $idProjet);
            $select->execute($donnees);
            return $select->fetch();
        }

        public function updateProjets($tab)
        {
            $requete = "UPDATE projet SET nomProjet = :nomProjet, description = :description, budget = :budget, idPays = :idPays WHERE idProjet = :idProjet";
            $update = $this->unPdo->prepare($requete);
            $donnees = array(
                ":nomProjet" => $tab["nom"],
                ":description" => $tab["description"],
                ":budget" => $tab["budget"],
                ":idPays" => $tab["idPays"],
                ":idProjet" => $tab["idProjet"]
            );
            $update->execute($donnees);
        }

        /*************** Gestion des users **************/

		public function verifConnexion($email, $mdp){
			$requete = "select * from user where email = :email and password = :mdp;";
			$exec = $this->unPdo->prepare ($requete);
			$donnees =array(":email"=>$email, ":mdp"=>$mdp);
			$exec->execute ($donnees);
			return $exec->fetch();
		}
    }

?>