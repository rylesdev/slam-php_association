<?php
session_start();
require_once("controleur/controleur.class.php");
// Création d'une instance de la classe Controleur
$unControleur = new Controleur();
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion de l'association</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bg-custom {
            background-image: url('images/background.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            padding: 20px;
        }
        .nav-link img {
            transition: transform 0.2s;
        }
        .nav-link img:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
<div class="container containerD text-center">
    <h1 class="my-4">Gestion Association</h1>
    <?php
    if(! isset($_SESSION['email'])){
        require_once("vue/vue_connexion.php");
    }

    if(isset($_POST['Connexion'])){
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];

        $unUser= $unControleur->verifConnexion($email, $mdp);

        if($unUser){
            $_SESSION['nom'] = $unUser['nom'];
            $_SESSION['prenom'] = $unUser['prenom'];
            $_SESSION['email'] = $unUser['email'];
            $_SESSION['role'] = $unUser['role'];
            header("Location: index.php?page=1");
        } else {
            echo "<div class='alert alert-danger mt-3'>Vérifier les identifiants</div>";
        }
    }

    if (isset($_SESSION['email'])) {
        echo '
            <div class="d-flex justify-content-center my-4">
                <a href="index.php?page=1" class="mx-2"><img src="images/logo2.png" height="80" width="80"></a>
                <a href="index.php?page=2" class="mx-2"><img src="images/membre.png" height="80" width="80"></a>
                <a href="index.php?page=3" class="mx-2"><img src="images/don.png" height="80" width="80"></a>
                <a href="index.php?page=4" class="mx-2"><img src="images/projet.png" height="80" width="80"></a>
                <a href="index.php?page=5" class="mx-2"><img src="images/pays.png" height="80" width="80"></a>
                <a href="index.php?page=6" class="mx-2"><img src="images/deconexion.png" height="80" width="80"></a>
            </div>';

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        switch ($page) {
            case 1 :
                require_once("controleur/home.php");
                break;
            case 2 :
                require_once("controleur/c_membres.php");
                break;
            case 3 :
                require_once("controleur/c_dons.php");
                break;
            case 4 :
                require_once("controleur/c_projets.php");
                break;
            case 5 :
                require_once("controleur/c_pays.php");
                break;
            case 6 :
                session_destroy();
                unset($_SESSION['email']);
                header("Location: index.php");
                break;
        }
    }
    ?>
</div>
<br>
<div id="footer" ></div>
<script>
    fetch('vue/vue_footer.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('footer').innerHTML = data;
            document.getElementById('footer').style.backgroundColor = '#f0f0f0'; // Fond gris
            document.getElementById('footer').style.padding = '20px';
        });
</script>
</body>
</html>