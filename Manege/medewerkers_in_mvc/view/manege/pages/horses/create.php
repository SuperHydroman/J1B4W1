<h1>Voeg een paard toe</h1>
<form name="create" method="post" action="<?= htmlspecialchars("store")?>">
    <label for="name">Naam:</label>
    <input type="text" id="name" name="name" placeholder="Naam">

    <br>

    <label for="type">Type:</label>
    <select id="type" name="type">
        <option selected>------ Please select a type ------</option>
        <?php

        foreach($data['types'] as $key) {
            echo '<option value="'.$key['type'].'">'.$key['type'].'</option>';
        }

        ?>
    </select>

    <br>

    <label for="age">Leeftijd:</label>
    <input type="number" id="age" name="age" placeholder="Leeftijd">

    <br>

    <label for="breed">Kies ras:</label>
    <select id="breed" name="breed">
        <option selected>----- Please select a breed -----</option>
        <?php

        foreach($data['breeds'] as $key) {
            echo '<option value="'.$key['name'].'">'.$key['name'].'</option>';
        }

        ?>
    </select>

    <br>

    <label for="withers_height">Schofthoofte in cm:</label>
    <input type="text" id="withers_height" name="withers_height" placeholder="Schofthoogte in cm">

    <br>

    <input type="submit" value="Toevoegen">
</form>