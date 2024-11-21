<h2> Gestion des membres </h2>

<?php

    $leMembre = null;

    if (isset($_GET["action"]) && isset($_GET["idMembre"]))
    {
        $action = $_GET["action"];
        $idMembre = $_GET["idMembre"];
        switch($action){
            case "sup" : $unControleur->deleteMembre($idMembre); break;
            case "edit" : $leMembre = $unControleur->selectWhereMembre($idMembre); break;
        }
    }

    require_once("vue/vue_insert_membre.php");

    if (isset($_POST["Valider"]))
    {
        $unControleur->insertMembre($_POST);
        echo "Insertion réussie";

    }
    if (isset($_POST["Modifier"]))
    {
        $unControleur->updateMembre($_POST);
        header("Location:index.php?page=2");
    }

    if (isset($_POST["Filter"]))
    {
        $lesMembres = $unControleur->selectLikeMembres($_POST['filtre']);
    } else{
        $lesMembres = $unControleur->selectAllMembres();
    }

    require_once("vue/vue_select_membres.php");
?>