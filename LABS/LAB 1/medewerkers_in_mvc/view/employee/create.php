<!-- Voeg hier je formulier toe -->

<h1>Voeg een medewerker toe</h1>
<form name="create" method="post" action="<?=htmlspecialchars("store")?>">
    <label for="name">Naam:</label>
    <input type="text" id="name" name="name" placeholder="Naam">

    <br>

    <label for="age">Leeftijd:</label>
    <input type="text" id="age" name="age" placeholder="Leeftijd">

    <br>

    <input type="submit" value="Toevoegen">
</form>