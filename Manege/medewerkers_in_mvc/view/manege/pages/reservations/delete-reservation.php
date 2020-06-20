<?php
$users = getAllUsers();
$horses = getAllHorses();
?>
<h1>Een reservering verwijderen</h1>
<form name="create" method="post" action="<?= htmlspecialchars("../reservations_destroy/".$id)?>">
    <input disabled type="hidden" name="id" value="<?=$id?>">

    <label for="user">Kies een ruiter:</label>
    <select disabled id="user" name="user">
        <option>------ Please select a rider ------</option>
        <?php

        foreach($users as $key) {
            echo '<option ';

            if ($key['id'] === $user) {
                echo 'selected';
            }

            echo ' value="'.$key['id'].'">'.$key['name'].'</option>';
        }
        ?>
    </select>

    <br>

    <label for="horse">Kies een paard:</label>
    <select disabled id="horse" name="horse">
        <option>----- Please select a horse -----</option>
        <?php

        foreach($horses as $key) {
            echo '<option ';

            if ($key['id'] === $horse) {
                echo 'selected';
            }

            echo ' value="'.$key['id'].'">'.$key['name'].'</option>';
        }
        ?>
    </select>

    <br>

    <label for="hours">Tijd in uren:</label>
    <input disabled type="number" min="1" max="5" id="hours" name="hours" value="<?=$hours?>" placeholder="Tijd in uren">

    <br>

    <input type="submit" value="Verwijderen">
</form>