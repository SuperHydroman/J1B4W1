<h1>Een reservering bewerken</h1>
<form name="update" method="post" action="<?= htmlspecialchars("../reservations_update")?>">
    <input type="hidden" name="id" value="<?=$data['reservation']['id']?>">

    <label for="user">Kies een ruiter:</label>
    <select id="user" name="user">
        <option>------ Please select a rider ------</option>
        <?php

        foreach($data['users'] as $key) {
            echo '<option ';

            if ($key['id'] === $data['reservation']['user']) {
                echo 'selected';
            }

            echo ' value="'.$key['id'].'">'.$key['name'].'</option>';
        }
        ?>
    </select>

    <br>

    <label for="horse">Kies een paard:</label>
    <select id="horse" name="horse">
        <option>----- Please select a horse -----</option>
        <?php

        foreach($data['horses'] as $key) {
            echo '<option ';

            if ($key['id'] === $data['reservation']['horse']) {
                echo 'selected';
            }

            echo ' value="'.$key['id'].'">'.$key['name'].'</option>';
        }
        ?>
    </select>

    <br>

    <label for="hours">Tijd in uren:</label>
    <input type="number" min="1" max="5" id="hours" name="hours" value="<?=$data['reservation']['hours']?>" placeholder="Tijd in uren">

    <br>

    <input type="submit" value="Updaten">
</form>