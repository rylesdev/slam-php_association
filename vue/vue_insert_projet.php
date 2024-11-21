<h3>Ajout d'un projet</h3>
<form method="post">
    <table class="table">
        <tr>
            <td>Nom</td>
            <td><input type="text" name="nom" class="form-control"
                       value="<?= htmlspecialchars($leProjet['nom'] ?? '') ?>"></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name="description" class="form-control"><?= htmlspecialchars($leProjet['description'] ?? '') ?></textarea></td>
        </tr>
        <tr>
            <td>Budget</td>
            <td><input type="number" name="budget" class="form-control"
                       value="<?= htmlspecialchars($leProjet['budget'] ?? '') ?>" step="0.01"></td>
        </tr>
        <tr>
            <td>Pays</td>
            <td>
                <select name="idPays" class="form-control">
                    <?php
                    foreach ($lesPays as $unPays) {
                        // Vérification pour sélectionner le pays en cours
                        $selected = (isset($leProjet['idPays']) && $leProjet['idPays'] == $unPays['idPays']) ? 'selected' : '';
                        echo '<option value="' . htmlspecialchars($unPays['idPays']) . '" ' . $selected . '>';
                        echo htmlspecialchars($unPays['nomPays'] . ' ' . $unPays['continent']);
                        echo '</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="reset" name="Annuler" value="Annuler" class="btn btn-secondary"></td>
            <td><input type="submit"
                    <?= ($leProjet !== null) ? 'name="Modifier" value="Modifier"' : 'name="Valider" value="Valider"' ?>>
            </td>
        </tr>
    </table>
    <?= ($leProjet !== null && isset($leProjet['idProjet'])) ? '<input type="hidden" name="idProjet" value="' . htmlspecialchars($leProjet['idProjet']) . '">' : '' ?>
</form>