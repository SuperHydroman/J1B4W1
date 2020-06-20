<h1>Een ras bewerken</h1>
<form name="update" method="post" action="<?= htmlspecialchars("../update_breed") ?>">
    <input type="hidden" name="id" value="<?=$id?>"/>

    <label for="name">Naam:</label>
    <input type="text" id="name" name="name" placeholder="Naam" value="<?=$name?>">

    <br>

    <input type="submit" value="Updaten">
</form>