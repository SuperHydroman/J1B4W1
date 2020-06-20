<?php

function getAllEmployees(){
  // Met het try statement kunnen we code proberen uit te voeren. Wanneer deze
  // mislukt kunnen we de foutmelding afvangen en eventueel de gebruiker een
  // nette foutmelding laten zien. In het catch statement wordt de fout afgevangen
   try {
       // Open de verbinding met de database
       $conn=openDatabaseConnection();
   
       // Zet de query klaar door middel van de prepare method
       $stmt = $conn->prepare("SELECT * FROM employees");

       // Voer de query uit
       $stmt->execute();

       // Haal alle resultaten op en maak deze op in een array
       // In dit geval is het mogelijk dat we meedere medewerkers ophalen, daarom gebruiken we
       // hier de fetchAll functie.
       $result = $stmt->fetchAll();

   }
   // Vang de foutmelding af
   catch(PDOException $e){
       // Zet de foutmelding op het scherm
       echo "Connection failed: " . $e->getMessage();
   }

   // Maak de database verbinding leeg. Dit zorgt ervoor dat het geheugen
   // van de server opgeschoond blijft
   $conn = null;

   // Geef het resultaat terug aan de controller
   return $result;
}

function getEmployee($id){
    try {
        // Open de verbinding met de database
        $conn=openDatabaseConnection();
 
        // Zet de query klaar door midel van de prepare method. Voeg hierbij een
        // WHERE clause toe (WHERE id = :id. Deze vullen we later in de code
        $stmt = $conn->prepare("SELECT * FROM employees WHERE id = :id");
        // Met bindParam kunnen we een parameter binden. Dit vult de waarde op de plaats in
        // We vervangen :id in de query voor het id wat de functie binnen is gekomen.
        $stmt->bindParam(":id", $id);

        // Voer de query uit
        $stmt->execute();

        // Haal alle resultaten op en maak deze op in een array
        // In dit geval weten we zeker dat we maar 1 medewerker op halen (de where clause), 
        //daarom gebruiken we hier de fetch functie.
        $result = $stmt->fetch();
 
    }
    catch(PDOException $e){

        echo "Connection failed: " . $e->getMessage();
    }
    // Maak de database verbinding leeg. Dit zorgt ervoor dat het geheugen
    // van de server opgeschoond blijft
    $conn = null;
 
    // Geef het resultaat terug aan de controller
    return $result;
 }

function createEmployee($data){
    try {
        $conn=openDatabaseConnection();
        $sql = "INSERT INTO employees (name, age) VALUES (:name, :age)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":name", $data['name']);
        $stmt->bindParam(":age", $data['age']);
        $stmt->execute();
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;

 }


 function updateEmployee($data){
     try {
         $conn=openDatabaseConnection();
         $sql = "UPDATE `employees` SET `name`=:name,`age`=:age WHERE `id`=:id";
         $stmt = $conn->prepare($sql);
         $stmt->bindParam(":id", $data['id']);
         $stmt->bindParam(":name", $data['name']);
         $stmt->bindParam(":age", $data['age']);
         $stmt->execute();
     }
     catch(PDOException $e) {
         echo "Connection failed: " . $e->getMessage();
     }

     $conn = null;
 }

 function deleteEmployee($id){
     try {
         $conn=openDatabaseConnection();
         $sql = "DELETE FROM `employees` WHERE `id`=:id";
         $stmt = $conn->prepare($sql);
         $stmt->bindParam(":id", $id);
         $stmt->execute();
     }
     catch(PDOException $e) {
         echo "Connection failed: " . $e->getMessage();
     }

     $conn = null;
 }


 function validation($data, &$result, &$err) {
     $name = $age = "";

     $result = true;
     $err = [];

     if ($_SERVER["REQUEST_METHOD"] == "POST") {

         if (empty($data["name"])) {
             $err['nameErr'] = "This field is required";
             $result = false;
         } else {
             $name = test_input($data["name"]);
             // check if name only contains letters and whitespace
             if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                 $err['nameErr'] = "Only letters and white space allowed";
                 $result = false;
             }
         }

         if (empty($data["age"])) {
             $err['ageErr'] = "This field is required";
             $result = false;
         } else {
             $age = test_input($data["age"]);
             // check if name only contains letters and whitespace
             if (!preg_match("/^[0-9 ]*$/", $age)) {
                 $err['ageErr'] = "Only letters and white space allowed";
                 $result = false;
             }
         }
     }

     return ["name"=>$name, "age"=>$age];
 }

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>