<h3>Ajout d'un Membre</h3>

<form method="post">
    <table class="table">
        <tr>
            <td>Nom du Membre</td>
            <td><input type="text" name="nom" class="form-control"
                       value="<?= htmlspecialchars($leMembre['nom'] ?? '') ?>"></td>
        </tr>
        <tr>
            <td>Prénom du Membre</td>
            <td><input type="text" name="prenom" class="form-control"
                       value="<?= htmlspecialchars($leMembre['prenom'] ?? '') ?>"></td>
        </tr>
        <tr>
            <td>Adresse Postale</td>
            <td><input type="text" name="adresse" class="form-control"
                       value="<?= htmlspecialchars($leMembre['adresse'] ?? '') ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" class="form-control"
                       value="<?= htmlspecialchars($leMembre['email'] ?? '') ?>"></td>
        </tr>
        <tr>
            <td>Téléphone</td>
            <td><input type="text" name="tel" class="form-control"
                       value="<?= htmlspecialchars($leMembre['tel'] ?? '') ?>"></td>
        </tr>
        <tr>
            <td><input type="reset" name="Annuler" value="Annuler" class="btn btn-secondary"></td>
            <td><input type="submit"
                    <?= ($leMembre != null) ? 'name="Modifier" value="Modifier"' : 'name="Valider" value="Valider"'  ?>>
            </td>
        </tr>
    </table>
    <?= ($leMembre != null) ? '<input type="hidden" name="idMembre" value="' . htmlspecialchars($leMembre['idMembre']) . '">' : '' ?>
</form>