<h3>Liste des membres</h3>
<form method="post" class="mb-3">
    Filtrer par : <input type="text" name="filtre" class="form-control d-inline" style="width: auto;">
    <input type="submit" name="Filtrer" value="Filtrer" class="btn btn-primary">
</form>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Adresse Postale</th>
        <th>Email</th>
        <th>Téléphone</th>
        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
            echo '<th>Opérations</th>';
        }
        ?>
    </tr>
    </thead>
    <tbody>
    <?php
    if (isset($lesMembres)) {
        foreach ($lesMembres as $unMembre) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($unMembre['idMembre'] ?? '') . "</td>";
            echo "<td>" . htmlspecialchars($unMembre['nom'] ?? '') . "</td>";
            echo "<td>" . htmlspecialchars($unMembre['prenom'] ?? '') . "</td>";
            echo "<td>" . htmlspecialchars($unMembre['adresse'] ?? '') . "</td>";
            echo "<td>" . htmlspecialchars($unMembre['email'] ?? '') . "</td>";
            echo "<td>" . htmlspecialchars($unMembre['tel'] ?? '') . "</td>";
            if(isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
            echo "<td>";
            echo "<a href='index.php?page=2&action=sup&idMembre=" . htmlspecialchars($unMembre['idMembre'] ?? '') . "'>" .
                "<img src='images/supprimer.png' height='30' width='30' alt='Supprimer'>" .
                "</a>";
            echo "<a href='index.php?page=2&action=edit&idMembre=" . htmlspecialchars($unMembre['idMembre'] ?? '') . "'>" .
                "<img src='images/editer.png' height='30' width='30' alt='Éditer'>" .
                "</a>";
            echo "</td>";
            }
            echo "</tr>";
        }
    }
    ?>
    </tbody>
</table>