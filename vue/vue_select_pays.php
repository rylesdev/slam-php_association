<h3>Liste des pays</h3>
<form method="post" class="mb-3">
    Filtrer par : <input type="text" name="filtre" class="form-control d-inline" style="width: auto;">
    <input type="submit" name="Filtrer" value="Filtrer" class="btn btn-primary">
</form>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Continent</th>
        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
            echo '<th>Opérations</th>';
        }
        ?>
    </tr>
    </thead>
    <tbody>
    <?php
    if (isset($lesPays)) {
        foreach ($lesPays as $unPays) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($unPays['idPays']) . "</td>";
            echo "<td>" . htmlspecialchars($unPays['nomPays']) . "</td>";
            echo "<td>" . htmlspecialchars($unPays['continent']) . "</td>";
            if(isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
            echo "<td>";
            echo "<a href='index.php?page=5&action=sup&idPays=" . htmlspecialchars($unPays['idPays']) . "'>" .
                "<img src='images/supprimer.png' height='30' width='30' alt='Supprimer'>" .
                "</a>";
            echo "<a href='index.php?page=5&action=edit&idPays=" . htmlspecialchars($unPays['idPays']) . "'>" .
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