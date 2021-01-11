<h1>Filtre Stage</h1>

<link rel="stylesheet" href="../styleFiltre.css" />

</br>
</br>


</br>
</br>

<form action="filtreDataStage.php" method="post">
            <div class="c100">
                <label for="stage">Oui ou Non </label>
                <input type="text" id="stage" name="stage">
            </div>
</br>
</br>

<h5>Voici le ou les resultats</h5>

</br>
</br>
<?php
function filtreDataStage($stage){
try {
         
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    
    $filter = [ 'stage' => $stage ]; 
    $query = new MongoDB\Driver\Query($filter);     
    
    $res = $mng->executeQuery("mydb.persons", $query);
    
    

    foreach ($res as $row) {
        
    if (!empty($stage)) {
    
        echo nl2br("Prénom : $row->name , Nom : $row->firstname , $row->age ans , Campus de : $row->campus, Ville d'origine : $row->Ville , Etude : $row->etude , Stage :  $row->stage , Entreprise : $row->entreprise  \n\n");
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

$result = $_POST["stage"];
filtreDataStage($result);
?>    