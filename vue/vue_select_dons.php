<h3>Liste des dons</h3>
<form method="post" class="mb-3">
    Filtrer par : <input type="text" name="filtre" class="form-control d-inline" style="width: auto;">
    <input type="submit" name="Filtrer" value="Filtrer" class="btn btn-primary">
</form>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Date Don</th>
        <th>Montant</th>
        <th>Commentaire</th>
        <th>ID Membre</th>
        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
            echo '<th>Opérations</th>';
        }
        ?>
    </tr>
    </thead>
    <tbody>
    <?php
    if (isset($lesDons)) {
        foreach ($lesDons as $unDon) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($unDon['idDon']) . "</td>";
            echo "<td>" . htmlspecialchars($unDon['dateDon']) . "</td>";
            echo "<td>" . htmlspecialchars($unDon['montant']) . "</td>";
            echo "<td>" . htmlspecialchars($unDon['commentaire']) . "</td>";
            echo "<td>" . htmlspecialchars($unDon['idMembre']) . "</td>";
            if(isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
            echo "<td>";
            echo "<a href='index.php?page=3&action=sup&idDon=" . htmlspecialchars($unDon['idDon']) . "'>" .
                "<img src='images/supprimer.png' height='30' width='30' alt='Supprimer'> 
                    </a>";
            echo "<a href='index.php?page=3&action=edit&idDon=" . htmlspecialchars($unDon['idDon']) . "'>" .
                "<img src='images/editer.png' height='30' width='30' alt='Éditer'> 
                    </a>";
            echo "</td>";
            }
            echo "</tr>";
        }
    }
    ?>
    </tbody>
</table>