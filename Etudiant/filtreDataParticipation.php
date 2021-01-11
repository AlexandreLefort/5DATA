<h1>Filtre Participation Forum</h1>

<link rel="stylesheet" href="../styleFiltre.css" />

</br>
</br>



</br>
</br>
        
        <form action="filtreDataParticipation.php" method="post">
            <div class="c100">
                <label for="participation">Oui ou Non </label>
                <input type="text" id="participation" name="participation">
            </div>

</br>
</br>


<h5>Voici le ou les resultats</h5>

<?php
function filtreDataParticipation($participation){
try {
         
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    
    $filter = [ 'participation' => $participation ]; 
    $query = new MongoDB\Driver\Query($filter);     
    
    $res = $mng->executeQuery("mydb.persons", $query);
    
    

    foreach ($res as $row) {
    if (!empty($participation)) {
    
        echo nl2br("Prénom : $row->name , Nom : $row->firstname , Etude : $row->etude , Participation :  $row->participation \n\n");

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

$result = $_POST["participation"];
filtreDataParticipation($result);
?>

