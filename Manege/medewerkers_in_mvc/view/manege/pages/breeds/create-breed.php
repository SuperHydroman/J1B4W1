<h1>Voeg een ras toe</h1>
<form name="create" method="post" action="<?= htmlspecialchars("store_breed")?>">
    <label for="name">Naam:</label>
    <input type="text" id="name" name="name" placeholder="Naam">

    <br>

    <input type="submit" value="Toevoegen">
</form>