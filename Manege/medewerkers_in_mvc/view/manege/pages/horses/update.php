<h1>Een paard bewerken</h1>
<form name="update" method="post" action="<?= htmlspecialchars("../update") ?>">
    <input type="hidden" name="id" value="<?=$data['horse']['id']?>">

    <label for="name">Naam:</label>
    <input type="text" id="name" name="name" value="<?=$data['horse']['name']?>">

    <br>

    <label for="type">Type:</label>
    <select id="type" name="type">
        <option>------ Please select a type ------</option>
        <?php

        foreach($data['types'] as $key) {
            echo '<option ';

            if ($key['type'] === $data['horse']['type']) {
                echo 'selected';
            }

            echo ' value="'.$key['type'].'">'.$key['type'].'</option>';
        }

        ?>
    </select>

    <br>

    <label for="age">Leeftijd:</label>
    <input type="text" id="age" name="age" value="<?=$data['horse']['age']?>">

    <br>

    <label for="breed">Kies ras:</label>
    <select id="breed" name="breed">
        <option>----- Please select a breed -----</option>
        <?php

        foreach($data['breeds'] as $key) {
            echo '<option ';

            if ($key['name'] === $data['horse']['breed']) {
                echo 'selected';
            }

            echo ' value="'.$key['name'].'">'.$key['name'].'</option>';
        }

        ?>
    </select>

    <br>

    <label for="withers_height">Schofthoogte:</label>
    <input type="text" id="withers_height" name="withers_height" value="<?=$data['horse']['withers_height']?> cm">

    <br>

    <input type="submit" value="Updaten">
</form>