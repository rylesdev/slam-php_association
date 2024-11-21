<h3>Ajout d'un Pays et Continent</h3>

<form method="post">
    <table class="table">
        <tr>
            <td>Pays</td>
            <td><input type="text" name="nomPays" class="form-control"
                       value="<?= htmlspecialchars($lePays['nomPays'] ?? '') ?>"></td>
        </tr>
        <tr>
            <td>Continent</td>
            <td><input type="text" name="continent" class="form-control"
                       value="<?= htmlspecialchars($lePays['continent'] ?? '') ?>"></td>
        </tr>
        <tr>
            <td><input type="reset" name="Annuler" value="Annuler" class="btn btn-secondary"></td>
            <td><input type="submit"
                    <?= ($lePays != null) ? 'name="Modifier" value="Modifier"' : 'name="Valider" value="Valider"'  ?>>
            </td>
        </tr>
    </table>
    <?= ($lePays != null) ? '<input type="hidden" name="idPays" value="' . htmlspecialchars($lePays['idPays']) . '">' : '' ?>
</form>