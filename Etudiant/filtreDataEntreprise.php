<h1>Filtre Entreprise</h1>

<link rel="stylesheet" href="../styleFiltre.css" />

</br>
</br>



</br>
</br>        
        <form action="filtreDataEntreprise.php" method="post">
            <div class="c100">
                <label for="entreprise">Nom Entreprise  </label>
                <h4>Orange, JVS, etc ...</h4>
                <input type="text" id="entreprise" name="entreprise">
            </div>

</br>
</br>


<h5>Voici le ou les resultats</h5>

<?php
function filtreDataEntreprise($entreprise){
try {
         
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    
    $filter = [ 'entreprise' => $entreprise ]; 
    $query = new MongoDB\Driver\Query($filter);     
    
    $res = $mng->executeQuery("mydb.persons", $query);
    
    

    foreach ($res as $row) {
    if (!empty($entreprise)) {
    
        echo nl2br("Prénom : $row->name , Nom : $row->firstname , $row->age ans , Campus de : $row->campus, Ville d'origine : $row->Ville , Etude : $row->etude , Entreprise : $row->entreprise \n\n");

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

$result = $_POST["entreprise"];
filtreDataEntreprise($result);
?>

