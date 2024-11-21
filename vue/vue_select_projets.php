<h3>Liste des projets</h3>
<form method="post" class="mb-3">
    Filtrer par : <input type="text" name="filtre" class="form-control d-inline" style="width: auto;">
    <input type="submit" name="Filtrer" value="Filtrer" class="btn btn-primary">
</form>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Description</th>
        <th>Budget</th>
        <th>Id Pays</th>
        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
            echo '<th>Opérations</th>';
        }
        ?>
    </tr>
    </thead>
    <tbody>
    <?php
    if (isset($lesProjets)) {
        foreach ($lesProjets as $unProjet) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($unProjet['idProjet']) . "</td>";
            echo "<td>" . htmlspecialchars($unProjet['nomProjet']) . "</td>";
            echo "<td>" . htmlspecialchars($unProjet['description']) . "</td>";
            echo "<td>" . htmlspecialchars($unProjet['budget']) . "</td>";
            echo "<td>" . htmlspecialchars($unProjet['idPays']) . "</td>"; // Affiche le nom du pays
            if(isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
            echo "<td>";
            echo "<a href='index.php?page=4&action=sup&idProjet=" . htmlspecialchars($unProjet['idProjet']) . "'>" .
                "<img src='images/supprimer.png' height='30' width='30' alt='Supprimer'> 
                    </a>";
            echo "<a href='index.php?page=4&action=edit&idProjet=" . htmlspecialchars($unProjet['idProjet']) . "'>" .
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