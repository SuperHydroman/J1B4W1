<?php
require(ROOT . "model/EmployeeModel.php");


function index()
{
    //1. Haal alle medewerkers op uit de database (via de model) en sla deze op in een variable
    $employees = getAllEmployees();
    //2. Geef een view weer en geef de variable met medewerkers hieraan mee
    render('employee/index', $employees);
}

function create(){
    //1. Geef een view weer waarin een formulier staat voor het aanmaken van een medewerker
    render("employee/create");
}

function store(){
    //1. Maak een nieuwe medewerker aan met de data uit het formulier en sla deze op in de database

    //2. Bouw een url op en redirect hierheen

    $data = validation($_POST, $result, $err);
    if ($result == true) {
        echo "Succesfully added!";
        echo "<br>Data: ".$data['name'].", ".$data['age']." jaar";

        createEmployee($data);
        header("refresh:3;url=index");
    }
    else {
        echo $err['nameErr']."<br>".$err['ageErr'];
        header("refresh:3;url=create");
    }
}

function edit($id){
    $employee = getEmployee($id);
    //1. Haal een medewerker op met een specifiek id en sla deze op in een variable

    //2. Geef een view weer voor het updaten en geef de variable met medewerker hieraan mee
    render("employee/update", $employee);
}

function update(){
    echo "Succesfully updated!";
    echo "<br>Data: ".$_POST['name'].", ".$_POST['age']." jaar";
    //1. Update een bestaand persoon met de data uit het formulier en sla deze op in de database

    //2. Bouw een url en redirect hierheen
    updateEmployee($_POST);
    header("refresh:3;url=index");
}

function delete($id){
    $employee = getEmployee($id);
    //1. Haal een medewerker op met een specifiek id en sla deze op in een variable

    //2. Geef een view weer voor het verwijderen en geef de variable met medewerker hieraan mee
    render('employee/delete', $employee);
}

function destroy($id){
    $employee = getEmployee($id);
    echo "Succesfully removed!";
    echo "<br>Data: ".$employee['name'].", ".$employee['age']." jaar";
    //1. Delete een medewerker uit de database

	//2. Bouw een url en redirect hierheen
    deleteEmployee($id);
    header("refresh:3;url=../index");
}
?>