<h1>Overzicht van de paarden</h1>
<?php

if (count($data) > 0) {
    echo '<table>',
            '<tr>',
                '<th>Naam</th>',
                '<th>Type</th>',
                '<th>Leeftijd</th>',
                '<th>Ras</th>',
                '<th>Schofthoogte</th>',
                '<th>Springsport</th>',
            '</tr>';

    foreach($data as $key) {
        echo '<tr>',
            '<td>'.$key['name'].'</td>',
            '<td>'.$key['type'].'</td>',
            '<td>'.$key['age'].' jaar</td>',
            '<td>'.$key['breed'].'</td>',
            '<td>'.$key['withers_height'].' cm</td>';
            if ($key['jumpingsport'] == 0) {
                echo '<td>Nee<span class="icon-box"><a href="'.URL.'manege/edit/'.$key['id'].'"><i class="fas fa-pencil-alt"></i></a><a href="'.URL.'manege/delete/'.$key['id'].'"><i class="fas fa-trash-alt"></i></a></span></td>';
            }
            else {
                echo '<td>Ja<span class="icon-box"><a href="'.URL.'manege/edit/'.$key['id'].'"><i class="fas fa-pencil-alt"></i></a><a href="'.URL.'manege/delete/'.$key['id'].'"><i class="fas fa-trash-alt"></i></a></span></td>';
            }
        echo '</tr>';
    }
    echo '</table>';
}

else {
    echo "Er zijn momenteel nog geen paarden";
}

?>

