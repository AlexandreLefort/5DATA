<h1>Ville d'origine</h1>

<?php
include 'connect.php';
voirLaBdVille();
?>

</br>
</br>
        <form action="filtreDataVille.php" method="post">
            <div class="c100">
                <label for="Ville">Ville d'origine : </label>
                <input type="text" id="Ville" name="Ville">
            </div>

</br>
</br>

<?php
function filtreDataVille($ville){
try {
         
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    
    $filter = [ 'Ville' => $ville ]; 
    $query = new MongoDB\Driver\Query($filter);     
    
    $res = $mng->executeQuery("mydb.persons", $query);
    
    

    foreach ($res as $row) {
    if (!empty($ville)) {
    
        echo nl2br("Prénom : $row->name , Nom : $row->firstname , $row->age ans , Campus de : $row->campus, Ville d'origine : $row->Ville , Etude : $row->etude , Participation :  $row->participation , Stage :  $row->stage , Entreprise : $row->entreprise , Contrat Pro : $row->contratPro \n\n");

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

$result = $_POST["Ville"];
filtreDataVille($result);
?>

