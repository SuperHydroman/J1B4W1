<h1>Verwijder een gebruiker</h1>
<form name="delete" method="post" action="<?= htmlspecialchars("../user_destroy/".$id) ?>">
    <input type="hidden" name="id" value="<?=$id?>">

    <label for="name">Naam:</label>
    <input disabled type="text" id="name" name="name" value="<?=$name?>">

    <br>

    <label for="adress">Adres:</label>
    <input disabled type="text" id="adress" name="adress" value="<?=$adress?>">

    <br>

    <label for="phone_number">Mobiele nummer:</label>
    <input disabled type="text" id="phone_number" name="phone_number" value="<?=$phone_number?>">

    <br>

    <input type="submit" value="Verwijderen">
</form>