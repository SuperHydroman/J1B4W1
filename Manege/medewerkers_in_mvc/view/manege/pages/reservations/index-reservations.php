<h1>Overzicht van de reserveringen<span class="smallMoneyReminder">Dit kost &euro;55,- per uur.</span></h1>
<?php

$amount = countReservations();

$defaultprice = 55;

if ($amount['Reservations'] > 0) {
    echo '<table>',
    '<tr>',
    '<th>Ruiter</th>',
    '<th>Paard</th>',
    '<th>Aantal uur</th>',
    '<th>Totaal</th>',
    '</tr>';

    foreach($data as $key) {
        $horse = getSpecificHorse($key['horse']);
        $user = getSpecificUser($key['user']);

        $price = $key['hours'] * 55;

        echo '<tr>',
            '<td>'.$user['name'].'</td>',
            '<td>'.$horse['name'].'</td>',
            '<td>'.$key['hours'].'</td>',
            '<td>&euro;'.$price.',-<span class="icon-box"><a href="'.URL.'manege/reservations_edit/'.$key['id'].'"><i class="fas fa-pencil-alt"></i></a><a href="'.URL.'manege/reservations_delete/'.$key['id'].'"><i class="fas fa-trash-alt"></i></a></span></td>',
            '</tr>';
    }
    echo '</table>';
}

else {
    echo "Er zijn momenteel nog geen reserveringen";
}

?>

