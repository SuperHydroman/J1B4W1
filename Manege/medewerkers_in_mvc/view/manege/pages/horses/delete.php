<h1>Verwijder een paard</h1>
<form name="delete" method="post" action="<?= htmlspecialchars("../destroy/".$id) ?>">
    <input type="hidden" name="id" value="<?=$id?>">

    <label for="name">Naam:</label>
    <input disabled type="text" id="name" name="name" value="<?=$name?>">

    <br>

    <label for="type">Type:</label>
    <input disabled type="text" id="type" name="type" value="<?=$type?>">

    <br>

    <label for="age">Leeftijd:</label>
    <input disabled type="text" id="age" name="age" value="<?=$age?>">

    <br>

    <label for="breed">Ras:</label>
    <input disabled type="text" id="breed" name="breed" value="<?=$breed?>">

    <br>

    <label for="withers_height">Schofthoogte:</label>
    <input disabled type="text" id="withers_height" name="withers_height" value="<?=$withers_height?> cm">

    <br>

    <input type="submit" value="Verwijderen">
</form>