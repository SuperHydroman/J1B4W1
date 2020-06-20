<?php

$types = getAllTypes();
$breeds = getAllBreeds();

?>

<h1>Een paard bewerken</h1>
<form name="update" method="post" action="<?= htmlspecialchars("../update") ?>">
    <input type="hidden" name="id" value="<?=$id?>">

    <label for="name">Naam:</label>
    <input type="text" id="name" name="name" value="<?=$name?>">

    <br>

    <label for="type">Type:</label>
    <select id="type" name="type">
        <option>------ Please select a type ------</option>
        <?php

        foreach($types as $key) {
            echo '<option ';

            if ($key['type'] === $type) {
                echo 'selected';
            }

            echo ' value="'.$key['type'].'">'.$key['type'].'</option>';
        }

        ?>
    </select>

    <br>

    <label for="age">Leeftijd:</label>
    <input type="text" id="age" name="age" value="<?=$age?>">

    <br>

    <label for="breed">Kies ras:</label>
    <select id="breed" name="breed">
        <option>----- Please select a breed -----</option>
        <?php

        foreach($breeds as $key) {
            echo '<option ';

            if ($key['name'] === $breed) {
                echo 'selected';
            }

            echo ' value="'.$key['name'].'">'.$key['name'].'</option>';
        }

        ?>
    </select>

    <br>

    <label for="withers_height">Schofthoogte:</label>
    <input type="text" id="withers_height" name="withers_height" value="<?=$withers_height?> cm">

    <br>

    <input type="submit" value="Updaten">
</form>