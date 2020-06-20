<h1>Verwijder een ras</h1>
<form name="delete" method="post" action="<?= htmlspecialchars("../destroy_breed/".$id) ?>">
    <input type="hidden" name="id" value="<?=$id?>">

    <label for="name">Naam:</label>
    <input disabled type="text" id="name" name="name" value="<?=$name?>">

    <br>

    <input type="submit" value="Verwijderen">
</form>