<?php
require(ROOT . "model/ManegeModel.php");


/*
 * Horse Functions
 */


function index(){
    $horses = getAllHorses();

    render('manege/pages/horses/index', $horses);
}

function create(){
    $types = getAllTypes();
    $breeds = getAllBreeds();

    render('manege/pages/horses/create', ['breeds' => $breeds, 'types' => $types]);
}

function store(){
    $data = validation($_POST, $result, $err, $uniqueName);
    if ($result == true && $uniqueName == true) {
        echo "Succesfully created!";

        createHorse($data);
        header("refresh:3;url=index");
    }
    else {
        if ($uniqueName == false) {
            echo "This name already exists!";
            foreach ($err as $errMessage) {
                echo $errMessage."<br>";
            }
            header("refresh:3;url=create");
        }
    }
}

function edit($id){
    $horse = getHorse($id);
    $types = getAllTypes();
    $breeds = getAllBreeds();

    render('manege/pages/horses/update', ['horse' => $horse, 'types' => $types, 'breeds' => $breeds]);
}

function update(){
    $data = validation($_POST, $result, $err, $uniqueName);

    if ($result == true) {
        echo "Succesfully updated!";

        updateHorse($_POST);
        header("refresh:3;url=index");
    }
    else {
        foreach ($err as $errMessage) {
            echo $errMessage."<br>";
        }
        header("refresh:3;url=edit/".$_POST['id']);
    }
}

function delete($id){
    $horse = getHorse($id);

    render('manege/pages/horses/delete', $horse);
}

function destroy($id){
    echo "Succesfully deleted!";

    deleteHorse($id);
    header("refresh:3;url=../index");
}


/*
 * Breed Functions
 */


function index_breed() {
    $breeds = getAllBreeds();

    render('manege/pages/breeds/index-breed', $breeds);
}

function create_breed() {
    render('manege/pages/breeds/create-breed');
}

function store_breed() {
    $data = breedValidation($_POST, $result, $err);

    if ($result == true) {
        echo "Succesfully created!";

        createBreed($data);
        header("refresh:3;url=index_breed");
    }
    else {
        foreach ($err as $errMessage) {
            echo $errMessage."<br>";
        }
        header("refresh:3;url=create_breed");
    }
}

function edit_breed($id) {
    $breed = getBreed($id);

    render('manege/pages/breeds/update-breed', $breed);
}

function update_breed(){

    $data = breedValidation($_POST, $result, $err);

    if ($result == true) {
        echo "Succesfully updated!";

        updateBreed($_POST);
        header("refresh:3;url=index_breed");
    }
    else {
        foreach ($err as $errMessage) {
            echo $errMessage."<br>";
        }
        header("refresh:3;url=edit_breed/".$_POST['id']);
    }
}

function delete_breed($id) {
    $breed = getBreed($id);

    render('manege/pages/breeds/delete-breed', $breed);
}

function destroy_breed($id){
    echo "Succesfully deleted!";

    deleteBreed($id);
    header("refresh:3;url=../index_breed");
}


/*
 * User Functions
 */


function user_index(){
    $users = getAllUsers();

    render('manege/pages/users/user-index', $users);
}

function user_create(){
    //1. Geef een view weer waarin een formulier staat voor het aanmaken van een medewerker
    render('manege/pages/users/user-create');
}

function user_store(){
    $data = userValidation($_POST, $result, $err);

    if ($result == true) {
        echo "Succesfully created!";

        createUser($data);
        header("refresh:3;url=user_index");
    }
    else {
        foreach ($err as $errMessage) {
            echo $errMessage."<br>";
        }
        header("refresh:3;url=user_create");
    }
}

function user_edit($id){
    $user = getUser($id);
    //1. Haal een medewerker op met een specifiek id en sla deze op in een variable

    //2. Geef een view weer voor het updaten en geef de variable met medewerker hieraan mee
    render('manege/pages/users/user-update', $user);
}

function user_update(){
    $data = userValidation($_POST, $result, $err);

    if ($result == true) {
        echo "Succesfully updated!";

        updateUser($_POST);
        header("refresh:3;url=user_index");
    }
    else {
        foreach ($err as $errMessage) {
            echo $errMessage."<br>";
        }
        header("refresh:3;url=user_edit/".$_POST['id']);
    }
}

function user_delete($id){
    $user = getUser($id);
    //1. Haal een medewerker op met een specifiek id en sla deze op in een variable

    //2. Geef een view weer voor het verwijderen en geef de variable met medewerker hieraan mee
    render('manege/pages/users/user-delete', $user);
}

function user_destroy($id){
    echo "Succesfully deleted!";

    deleteUser($id);
    header("refresh:3;url=../user_index");
}


/*
 * Reservation functions
 */


function reservations_index() {
    $reservations = getAllReservations();

    render('manege/pages/reservations/index-reservations', $reservations);
}

function reservations_create(){
    $horses = getAllHorses();

    render("manege/pages/reservations/create-reservation", $horses);
}

function reservations_store(){
    $data = reservationsValidation($_POST, $result, $err);

    if ($result == true) {
        echo "Succesfully created!";

        var_dump($data);

        createReservation($data);
        header("refresh:3;url=reservations_index");
    }
    else {
        foreach ($err as $errMessage) {
            echo $errMessage."<br>";
        }
        header("refresh:3;url=reservations_create");
    }
}

function reservations_edit($id) {
    $reservation = getReservation($id);
    $users = getAllUsers();
    $horses = getAllHorses();

    render("manege/pages/reservations/update-reservation", ['reservation' => $reservation, 'users' => $users, 'horses' => $horses]);
}

function reservations_update(){
    $data = reservationsValidation($_POST, $result, $err);

    if ($result == true) {
        echo "Succesfully updated!";

        var_dump($data);

        updateReservation($data);
        header("refresh:3;url=reservations_index");
    }
    else {
        foreach ($err as $errMessage) {
            echo $errMessage."<br>";
        }
        header("refresh:3;url=reservations_edit");
    }
}

function reservations_delete($id) {
    $reservation = getReservation($id);

    render('manege/pages/reservations/delete-reservation', $reservation);
}

function reservations_destroy($id) {
    echo "Succesfully deleted!";

    deleteReservation($id);
    header("refresh:3;url=../reservations_index");
}

?>