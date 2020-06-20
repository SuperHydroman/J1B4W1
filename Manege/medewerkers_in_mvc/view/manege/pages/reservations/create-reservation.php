<?php
$users = getAllUsers();
?>
<h1>Reserveren</h1>
<form name="create" method="post" action="<?= htmlspecialchars("reservations_store")?>">
    <label for="user">Kies een ruiter:</label>
    <select id="user" name="user">
        <option selected>------ Please select a rider ------</option>
        <?php

        foreach($users as $key) {
            echo '<option value="'.$key['id'].'">'.$key['name'].'</option>';
        }

        ?>
    </select>

    <br>

    <label for="horse">Kies een paard:</label>
    <select id="horse" name="horse">
        <option selected>----- Please select a horse -----</option>
        <?php

        foreach($data as $key) {
            echo '<option value="'.$key['id'].'">'.$key['name'].'</option>';
        }

        ?>
    </select>

    <br>

    <label for="hours">Tijd in uren:</label>
    <input type="number" min="1" max="5" id="hours" name="hours" placeholder="Tijd in uren">

    <br>

    <input type="submit" value="Toevoegen">
</form>