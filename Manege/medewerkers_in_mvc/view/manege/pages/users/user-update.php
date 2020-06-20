<h1>Een gebruiker bewerken</h1>
<form name="update" method="post" action="<?= htmlspecialchars("../user_update") ?>">
    <input type="hidden" name="id" value="<?=$id?>"/>

    <label for="name">Naam:</label>
    <input type="text" id="name" name="name" placeholder="Naam" value="<?=$name?>">

    <br>

    <label for="adress">Adres:</label>
    <input type="text" id="adress" name="adress" placeholder="Adres" value="<?=$adress?>">

    <br>

    <label for="phone_number">Mobiele nummer:</label>
    <input type="text" id="phone_number" name="phone_number" placeholder="Mobiel telefoon nummer" value="<?=$phone_number?>">

    <br>

    <input type="submit" value="Updaten">
</form>