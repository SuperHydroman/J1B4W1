<h1>Voeg een gebruiker toe</h1>
<form name="create" method="post" action="<?= htmlspecialchars("user_store") ?>">
    <label for="name">Naam:</label>
    <input type="text" id="name" name="name" placeholder="Naam">

    <br>

    <label for="adress">Adres:</label>
    <input type="text" id="adress" name="adress" placeholder="Adres">

    <br>

    <label for="phone_number">Mobiele nummer:</label>
    <input type="text" id="phone_number" name="phone_number" placeholder="Mobiel telefoon nummer">

    <br>

    <input type="submit" value="Toevoegen">
</form>