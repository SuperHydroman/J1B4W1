<!-- Voeg hier je formulier toe -->
<h1>Persoon wijzigen</h1>
<form name="update" method="post" action="<?=htmlspecialchars("../update")?>">
    <input type="hidden" name="id" value="<?=$id?>"/>

    <label for="name">Naam:</label>
    <input type="text" id="name" name="name" placeholder="Naam" value="<?=$name?>">

    <br>

    <label for="age">Leeftijd:</label>
    <input type="text" id="age" name="age" placeholder="Leeftijd" value="<?=$age?>">

    <br>

    <input type="submit" value="Update">
</form>