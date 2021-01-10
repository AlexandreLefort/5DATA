<h1>Age</h1>
<form action="filtreDataAge.php" method="post">
            <div class="c100">
                <label for="age">Age : </label>
                <input type="text" id="age" name="age">
            </div>

<h5>Voici le ou les resultats</h5>

<?php
function filtreDataAge($age){
try {
         
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    
    $filter = [ 'age' => $age ]; 
    $query = new MongoDB\Driver\Query($filter);     
    
    $res = $mng->executeQuery("mydb.persons", $query);
    
    

    foreach ($res as $row) {
        
    if (!empty($age)) {
    
        echo nl2br("Prénom : $row->name , Nom : $row->firstname , $row->age ans ,  Etude : $row->etude  \n\n");
    } else {
    
        echo "No match found\n";
    }
}
    
} catch (MongoDB\Driver\Exception\Exception $e) {

    $filename = basename(__FILE__);
    
    echo "The $filename script has experienced an error.\n"; 
    echo "It failed with the following exception:\n";
    
    echo "Exception:", $e->getMessage(), "\n";
    echo "In file:", $e->getFile(), "\n";
    echo "On line:", $e->getLine(), "\n";    
}
}

$result = $_POST["age"];
filtreDataAge($result);
?>    