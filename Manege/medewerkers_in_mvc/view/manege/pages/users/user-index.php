<h1>Overzicht van personen</h1>
<?php

if (count($data) > 0) {
    echo '<table>',
            '<tr>',
                '<th>Naam</th>',
                '<th>Adres</th>',
                '<th>Telefoon</th>',
                '<th>Speelnummer</th>',
            '</tr>';

    foreach($data as $key) {
        echo '<tr>',
            '<td>'.$key['name'].'</td>',
            '<td>'.$key['adress'].'</td>',
            '<td>'.$key['phone_number'].'</td>',
            '<td>'.$key['unique_ID'].'<span class="icon-box"><a href="'.URL.'manege/user_edit/'.$key['id'].'"><i class="fas fa-pencil-alt"></i></a><a href="'.URL.'manege/user_delete/'.$key['id'].'"><i class="fas fa-trash-alt"></i></a></span></td>',
        '</tr>';
    }

    echo '</table>';
}

else {
    echo "Er zijn momenteel nog geen gebruikers!";
}

?>
