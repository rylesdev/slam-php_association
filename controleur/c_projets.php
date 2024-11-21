<h2> Gestion des projets </h2>

<?php

$lesPays= $unControleur->selectAllPays();
$leProjet = null;

if (isset($_GET["action"]) && isset($_GET["idProjet"]))
{
    $action = $_GET["action"];
    $leProjet = $_GET["idProjet"];
    switch($action){
        case "sup" : $unControleur->deleteProjet($leProjet); break;
        case "edit" : $leProjet = $unControleur->selectWhereProjet($leProjet); break;
    }
}

require_once("vue/vue_insert_projet.php");

if (isset($_POST["Valider"]))
{
    $unControleur->insertProjet($_POST);
    echo "Insertion réussie";

}
if (isset($_POST["Modifier"]))
{
    $unControleur->updateProjet($_POST);
    header("Location:index.php?page=4"); // Redirige vers la page de gestion des projets

}

if (isset($_POST["Filter"]))
{
    $lesProjets = $unControleur->selectLikeProjets($_POST['filtre']);
} else{
    $lesProjets = $unControleur->selectAllProjets();
}
require_once("vue/vue_select_projets.php");
?>