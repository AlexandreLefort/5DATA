<h1>Filtre Age</h1>

<link rel="stylesheet" href="../styleFiltre.css" />

</br>
</br>



</br>
</br>

<form action="filtreDataAge.php" method="post">
            <div class="c100">
                <label for="age">Age : </label>
                <h4>Entre 18 et 30</h4>
                <input type="text" id="age" name="age">
            </div>

</br>
</br>

<h5>Voici le ou les resultats</h5>

</br>
</br>

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