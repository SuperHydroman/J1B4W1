<?php

function getAllHorses(){
  // Met het try statement kunnen we code proberen uit te voeren. Wanneer deze
  // mislukt kunnen we de foutmelding afvangen en eventueel de gebruiker een
  // nette foutmelding laten zien. In het catch statement wordt de fout afgevangen
   try {
       // Open de verbinding met de database
       $conn=openDatabaseConnection();

       // Zet de query klaar door middel van de prepare method
       $stmt = $conn->prepare("SELECT * FROM horses");

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

function getHorse($id){
    try {
        // Open de verbinding met de database
        $conn=openDatabaseConnection();

        // Zet de query klaar door midel van de prepare method. Voeg hierbij een
        // WHERE clause toe (WHERE id = :id. Deze vullen we later in de code
        $stmt = $conn->prepare("SELECT * FROM horses WHERE id = :id");
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

 function getSpecificHorse($id) {
     try {
         $conn=openDatabaseConnection();
         $sql = "SELECT name FROM horses WHERE id=:id";
         $stmt = $conn->prepare($sql);
         $stmt->bindParam(":id", $id);
         $stmt->execute();
         $result = $stmt->fetch();
     }
     catch(PDOException $e) {
         echo "Connection failed: " . $e->getMessage();
     }

     $conn = null;
     return $result;
 }


function createHorse($data){

    $jumping=0;

    if ($data['withers_height'] >= "147,5" && $data['type'] == "Paard") {
        $jumping = 1;
    }
    elseif ($data['withers_height'] < "147,5" && $data['type'] == "Pony") {
        $jumping = 0;
    }

    try {
        $conn=openDatabaseConnection();

        $stmt = $conn->prepare("INSERT INTO `horses` (`name`, `type`, `age`, `breed`, `withers_height`, `jumpingsport`) VALUES (:name, :type, :age, :breed, :withers_height, :jumpingsport)");
        $stmt->bindParam(":name", $data['name']);
        $stmt->bindParam(":type", $data['type']);
        $stmt->bindParam(":age", $data['age']);
        $stmt->bindParam(":breed", $data['breed']);
        $stmt->bindParam(":withers_height", $data['withers_height']);
        $stmt->bindParam(":jumpingsport", $jumping);

        $stmt->execute();

    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;
}


function updateHorse($data){
    try {
        $conn=openDatabaseConnection();
        $sql = "UPDATE `horses` SET `name`=:name,`age`=:age WHERE `id`=:id";
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

function deleteHorse($id){
    try {
        $conn=openDatabaseConnection();
        $sql = "DELETE FROM `horses` WHERE `id`=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;
}

function countHorses() {
    try {
        $conn=openDatabaseConnection();
        $sql = "SELECT COUNT(id) AS 'Horses' FROM horses";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    catch(PDOException $e) {
        echo "Connection failed: ". $e->getMessage();
    }

    $conn = null;
    $result = $stmt->fetch();

    return $result;
}

function checkForName($data) {
    try {
        $conn=openDatabaseConnection();
        $sql = "SELECT name FROM horses WHERE name=:name";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":name", $data);
        $stmt->execute();
    }
    catch(PDOException $e) {
        echo "Connection failed: ". $e->getMessage();
    }

    $conn = null;

    if ($stmt->rowCount() > 0) {
        return false;
    }
    else {
        return true;
    }
}


/*
 * Breed functions
 */


function createBreed($data) {
    try {
        $conn=openDatabaseConnection();

        $stmt = $conn->prepare("INSERT INTO `breeds` (`name`) VALUES (:name)");
        $stmt->bindParam(":name", $data['name']);

        $stmt->execute();

    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;
}

function getAllBreeds() {
    try {
        $conn=openDatabaseConnection();
        $sql = "SELECT * FROM `breeds` ORDER BY `name` ASC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    catch(PDOException $e) {
        echo "Connection failed: ". $e->getMessage();
    }

    $result = $stmt->fetchAll();
    $conn = null;

    return $result;
}

function getAllTypes() {
    try {
        $conn=openDatabaseConnection();
        $sql = "SELECT * FROM `types` ORDER BY `type` ASC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    catch(PDOException $e) {
        echo "Connection failed: ". $e->getMessage();
    }

    $result = $stmt->fetchAll();
    $conn = null;

    return $result;
}

function getBreed($id) {
    try {
        $conn=openDatabaseConnection();

        $stmt = $conn->prepare("SELECT * FROM breeds WHERE id = :id");
        $stmt->bindParam(":id", $id);

        $stmt->execute();
        $result = $stmt->fetch();

    }
    catch(PDOException $e){

        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;

    return $result;
}

function updateBreed($data){
    try {
        $conn=openDatabaseConnection();
        $sql = "UPDATE `breeds` SET `name`=:name WHERE `id`=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $data['id']);
        $stmt->bindParam(":name", $data['name']);
        $stmt->execute();
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;
}

function deleteBreed($id){
    try {
        $conn=openDatabaseConnection();
        $sql = "DELETE FROM `breeds` WHERE `id`=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;
}

function countBreeds() {
    try {
        $conn=openDatabaseConnection();
        $sql = "SELECT COUNT(id) AS 'Breeds' FROM breeds";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    catch(PDOException $e) {
        echo "Connection failed: ". $e->getMessage();
    }

    $conn = null;
    $result = $stmt->fetch();

    return $result;
}


 /*
  * User functions
  */


function getAllUsers(){
    try {
        $conn=openDatabaseConnection();

        $stmt = $conn->prepare("SELECT * FROM users");
        $stmt->execute();

        $result = $stmt->fetchAll();

    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;
    return $result;
}

function getUser($id){
    try {
        // Open de verbinding met de database
        $conn=openDatabaseConnection();

        // Zet de query klaar door midel van de prepare method. Voeg hierbij een
        // WHERE clause toe (WHERE id = :id. Deze vullen we later in de code
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
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

function getSpecificUser($id) {
    try {
        $conn=openDatabaseConnection();
        $sql = "SELECT name FROM users WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch();
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;
    return $result;
}

function createUser($data){
    try {
        $conn=openDatabaseConnection();
        $sql = "INSERT INTO `users` (`name`, `adress`, `phone_number`) VALUES (:name, :adress, :phone)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":name", $data['name']);
        $stmt->bindParam(":adress", $data['adress']);
        $stmt->bindParam(":phone", $data['phone_number']);

        $stmt->execute();

        $id = $conn->lastInsertId();
        createUniqID($id);
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;
}


function updateUser($data){
    try {
        $conn=openDatabaseConnection();
        $sql = "UPDATE `users` SET `name`=:name,`adress`=:adress, `phone_number`=:phone WHERE `id`=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $data['id']);
        $stmt->bindParam(":name", $data['name']);
        $stmt->bindParam(":adress", $data['adress']);
        $stmt->bindParam(":phone", $data['phone_number']);
        $stmt->execute();
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;
}

function deleteUser($id){
    try {
        $conn=openDatabaseConnection();
        $sql = "DELETE FROM `users` WHERE `id`=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;
}

function createUniqID($id){
    try {
    $uniqID = $id+100;

    $conn = openDatabaseConnection();
    $sql = "UPDATE `users` SET `unique_ID` = :uniqID WHERE `id` = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":uniqID", $uniqID);
    $stmt->execute();
    }

    catch(PDOException $e) {
        echo "Connection failed: ". $e->getMessage();
    }
}

function countUsers() {
    try {
        $conn=openDatabaseConnection();
        $sql = "SELECT COUNT(id) AS 'Users' FROM users";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    catch(PDOException $e) {
        echo "Connection failed: ". $e->getMessage();
    }

    $conn = null;
    $result = $stmt->fetch();

    return $result;
}


/*
 * Reservation functions
 */


function getAllReservations() {
    try {
        $conn=openDatabaseConnection();
        $sql = "SELECT * FROM `reservations` ORDER BY `id` ASC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    catch(PDOException $e) {
        echo "Connection failed: ". $e->getMessage();
    }

    $result = $stmt->fetchAll();
    $conn = null;

    return $result;
}

function getReservation($id) {
    try {
        $conn=openDatabaseConnection();
        $sql = "SELECT * FROM `reservations` WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id" ,$id);
        $stmt->execute();
    }
    catch(PDOException $e) {
        echo "Connection failed: ". $e->getMessage();
    }

    $result = $stmt->fetch();
    $conn = null;

    return $result;
}

function getReservationData() {
    try {
        $conn=openDatabaseConnection();

        $stmt = $conn->prepare("SELECT hs.* FROM `horses` AS hs LEFT JOIN `reservations` rv ON hs.id=rv.horse");
        $stmt->execute();

        $result = $stmt->fetchAll();

    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;
    return $result;
}

function createReservation($data) {
    try {
        $conn=openDatabaseConnection();

        $stmt = $conn->prepare("INSERT INTO `reservations` (`horse`, `user`, `hours`) VALUES (:horse, :user, :hours)");
        $stmt->bindParam(":horse", $data['horse']);
        $stmt->bindParam(":user", $data['user']);
        $stmt->bindParam(":hours", $data['hours']);

        $stmt->execute();

    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;
}

function updateReservation($data) {
    try {
        $conn=openDatabaseConnection();
        $sql = "UPDATE `reservations` SET `horse`=:horse, `user`=:user,`hours`=:hours WHERE `id`=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $data['id']);
        $stmt->bindParam(":horse", $data['horse']);
        $stmt->bindParam(":user", $data['user']);
        $stmt->bindParam(":hours", $data['hours']);
        $stmt->execute();
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;
}

function deleteReservation($id) {
    try {
        $conn=openDatabaseConnection();
        $sql = "DELETE FROM `reservations` WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;
}

function countReservations() {
    try {
        $conn=openDatabaseConnection();

        $stmt = $conn->prepare("SELECT Count(id) AS Reservations FROM reservations");
        $stmt->execute();

        $result = $stmt->fetch();

    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;
    return $result;
}


/*
 * Validation functions
 */


function validation($data, &$result, &$err, &$uniqueName) {
    $name = $type = $age = $breed = $withers_height = "";

    $result = true;
    $err = [];
    $uniqueName = checkForName($data['name']);

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

        if (empty($data["type"])) {
            $err['typeErr'] = "This field is required";
            $result = false;
        } else {
            $type = test_input($data["type"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $type)) {
                $err['typeErr'] = "Only letters and white space allowed";
                $result = false;
            }
        }

        if (empty($data["age"])) {
            $err['ageErr'] = "This field is required";
            $result = false;
        } else {
            $age = test_input($data["age"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[0-9]*$/", $age)) {
                $err['ageErr'] = "Only letters and white space allowed";
                $result = false;
            }
        }

        if (empty($data["breed"])) {
            $err['breedErr'] = "This field is required";
            $result = false;
        } else {
            $breed = test_input($data["breed"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $breed)) {
                $err['breedErr'] = "Only letters and white space allowed";
                $result = false;
            }
        }

        if (empty($data["withers_height"])) {
            $err['withers_heightErr'] = "This field is required";
            $result = false;
        } else {
            $withers_height = test_input($data["withers_height"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z0-9, ]*$/", $withers_height)) {
                $err['withers_heightErr'] = "Only letters and white space allowed";
                $result = false;
            }
        }
    }

    return ["name"=>$name, "type"=>$type, "age"=>$age, "breed"=>$breed, "withers_height"=>$withers_height];
}

function breedValidation($data, &$result, &$err) {
    $name = "";

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
    }

    return ["name"=>$name];
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function userValidation($data, &$result, &$err) {
    $name = $adress = $phone_number = "";

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

        if (empty($data["adress"])) {
            $err['adressErr'] = "This field is required";
            $result = false;
        } else {
            $adress = test_input($data["adress"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z0-9 ]*$/", $adress)) {
                $err['adressErr'] = "Only letters and white space allowed";
                $result = false;
            }
        }

        if (empty($data["phone_number"])) {
            $err['phone_numberErr'] = "This field is required";
            $result = false;
        } else {
            $phone_number = test_input($data["phone_number"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[0-9+ ]*$/", $phone_number)) {
                $err['phone_numberErr'] = "Only letters and white space allowed";
                $result = false;
            }
        }
    }

    return ["name"=>$name, "adress"=>$adress, "phone_number"=>$phone_number];
}

function reservationsValidation($data, &$result, &$err) {
    $user = $horse = $hours = "";

    $result = true;
    $err = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($data["user"])) {
            $err['userErr'] = "This field is required";
            $result = false;
        } else {
            $user = test_input($data["user"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[0-9]*$/", $user)) {
                $err['userErr'] = "Only letters and white space allowed";
                $result = false;
            }
        }

        if (empty($data["horse"])) {
            $err['horseErr'] = "This field is required";
            $result = false;
        } else {
            $horse = test_input($data["horse"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[0-9]*$/", $horse)) {
                $err['horseErr'] = "Only letters and white space allowed";
                $result = false;
            }
        }

        if (empty($data["hours"])) {
            $err['hoursErr'] = "This field is required";
            $result = false;
        } else {
            $hours = test_input($data["hours"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[0-9+ ]*$/", $hours)) {
                $err['hoursErr'] = "Only letters and white space allowed";
                $result = false;
            }
        }
    }

    return ["user"=>$user, "horse"=>$horse, "hours"=>$hours];
}

?>