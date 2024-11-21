<h3>Ajout d'un don</h3>

<form method="post">
    <table class="table">
        <tr>
            <td>Date</td>
            <td>
                <input type="date" name="dateDon"
                       value="<?= htmlspecialchars($leDon['dateDon'] ?? '') ?>">
            </td>
        </tr>
        <tr>
            <td>Montant</td>
            <td>
                <input type="number" name="montant"
                       value="<?= htmlspecialchars($leDon['montant'] ?? '') ?>">
            </td>
        </tr>
        <tr>
            <td>Commentaire</td>
            <td>
                <textarea name="commentaire"><?= htmlspecialchars($leDon['commentaire'] ?? '') ?></textarea>
            </td>
        </tr>
        <tr>
            <td>Membre</td>
            <td>
                <select name="idMembre">
                    <?php
                    foreach ($lesMembres as $unMembre) {
                        // Vérifier si le membre est sélectionné
                        $selected = (isset($leDon['idMembre']) && $leDon['idMembre'] == $unMembre['idMembre']) ? 'selected' : '';
                        echo '<option value="'.$unMembre['idMembre'].'" '.$selected.'>';
                        echo htmlspecialchars($unMembre['nom'].' '.$unMembre['prenom']);
                        echo '</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="reset" name="Annuler" value="Annuler" class="btn btn-secondary"></td>
            <td>
                <input type="submit"
                    <?= ($leDon !== null) ? 'name="Modifier" value="Modifier"' : 'name="Valider" value="Valider"' ?>>
            </td>
        </tr>
    </table>
    <?= ($leDon !== null && isset($leDon['idDon'])) ? '<input type="hidden" name="idDon" value="'.htmlspecialchars($leDon['idDon']).'">' : '' ?>
</form>