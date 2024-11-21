<h2> Gestion des Pays </h2>

<?php

    $lePays = null;

    if (isset($_GET["action"]) && isset($_GET["idPays"]))
    {
        $action = $_GET["action"];
        $idPays = $_GET["idPays"];
        switch($action){
            case "sup" : $unControleur->deletePays($idPays); break;
            case "edit" : $lePays = $unControleur->selectWherePays($idPays); break;
        }
    }

    require_once("vue/vue_insert_pays.php");

    if (isset($_POST["Valider"]))
    {
        $unControleur->insertPays($_POST);
        echo "Insertion réussie";

    }
    if (isset($_POST["Modifier"]))
    {
        $unControleur->updatePays($_POST);
        header("Location:index.php?page=5");
    }

    if (isset($_POST["Filter"]))
    {
        $lesPays = $unControleur->selectLikePays($_POST['filtre']);
    } else{
        $lesPays = $unControleur->selectAllPays();
    }

    require_once("vue/vue_select_pays.php");
?>