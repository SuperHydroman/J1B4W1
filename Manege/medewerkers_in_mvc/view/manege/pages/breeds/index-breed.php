<h1>Overzicht van de rassen</h1>
<?php

if (count($data) > 0) {
    echo '<table>',
    '<tr>',
    '<th>Rasnaam</th>',
    '</tr>';

    foreach($data as $key) {
        echo '<tr>',
            '<td>'.$key['name'].'<span class="icon-box"><a href="'.URL.'manege/edit_breed/'.$key['id'].'"><i class="fas fa-pencil-alt"></i></a><a href="'.URL.'manege/delete_breed/'.$key['id'].'"><i class="fas fa-trash-alt"></i></a></span></td>',
         '</tr>';
    }
    echo '</table>';
}

else {
    echo "Er zijn momenteel nog geen rassen";
}

?>

