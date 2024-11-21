<h2> Gestion des dons </h2>

<?php


    $lesMembres = $unControleur->selectAllMembres();

    $leDon = null;

    if (isset($_GET["action"]) && isset($_GET["idDon"]))
    {
        $action = $_GET["action"];
        $leDon = $_GET["idDon"];
        switch($action){
            case "sup" : $unControleur->deleteDon($leDon); break;
            case "edit" : $leDon = $unControleur->selectWhereDon($leDon); break;
        }
    }

    require_once("vue/vue_insert_don.php");

    if (isset($_POST["Valider"]))
    {
        $unControleur->insertDon($_POST);
        echo "Insertion réussie";

    }
    if (isset($_POST["Modifier"]))
    {
        $unControleur->updateDon($_POST);
        header("Location:index.php?page=3");

    }


    if (isset($_POST["Filter"]))
    {
        $lesDons = $unControleur->selectLikeDons($_POST['filtre']);
    } else{
        $lesDons = $unControleur->selectAllDons();
    }
        require_once("vue/vue_select_dons.php");
?>