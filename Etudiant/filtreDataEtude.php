<h1>Filtre Niveau d'etude</h1>

<link rel="stylesheet" href="../styleFiltre.css" />

</br>
</br>



</br>
</br> 
        
        <form action="filtreDataEtude.php" method="post">
            <div class="c100">
                <label for="etude">Etude </label>
                <h4>L1, L2, Bachelor, Master1, Master2</h4>
                <input type="text" id="etude" name="etude">
            </div>
            
        </form>

</br>
</br>


<h5>Voici le ou les resultats</h5>

<?php
function filtreDataEtude($etude){
try {
         
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    
    $filter = [ 'etude' => $etude ]; 
    $query = new MongoDB\Driver\Query($filter);     
    
    $res = $mng->executeQuery("mydb.persons", $query);
    
    

    foreach ($res as $row) {
    if (!empty($etude)) {
    
        echo nl2br("Prénom : $row->name , Nom : $row->firstname , $row->age ans , Campus de : $row->campus,  Etude : $row->etude , Contrat Pro : $row->contratPro \n\n");

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

$result = $_POST["etude"];
filtreDataEtude($result);
?>

