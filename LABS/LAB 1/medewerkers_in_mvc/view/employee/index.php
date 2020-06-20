<h1>Overzicht van personen</h1>
<ul>
    <?php
        $employees = getAllEmployees();
        foreach($employees as $key) {
            echo '<li>',
                     '<span>'.$key['name'].' is '.$key['age'].' jaar</span>',
                     '<a href="'.URL.'employee/edit/'.$key['id'].'">Wijzigen</a> <a href="'.URL.'employee/delete/'.$key['id'].'">Verwijderen</a>',
                 '</li>';
        }
    ?>
</ul>