<h1>Campus</h1>



</br>
</br>

<form action="filtreDataCampus.php" method="post">
            <div class="c100">
                <label for="campus">Campus : </label>
                <input type="text" id="campus" name="campus">
            </div>

</br>
</br>


<h5>Voici le ou les resultats</h5>

<?php
function filtreDataCampus($campus){
try {
         
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    
    $filter = [ 'campus' => $campus ]; 
    $query = new MongoDB\Driver\Query($filter);     
    
    $res = $mng->executeQuery("mydb.persons", $query);
    
    

    foreach ($res as $row) {
        
    if (!empty($campus)) {
    
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

$result = $_POST["campus"];
filtreDataCampus($result);
?>    