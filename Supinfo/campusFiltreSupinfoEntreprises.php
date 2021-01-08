<h1>Nom des entreprises proche du campus</h1>

        
        <form action="campusFiltreSupinfoEntreprises.php" method="post">
            <div class="c100">
                <label for="Entreprises">Nom Entreprise : </label>
                <input type="text" id="Entreprises" name="Entreprises">
            </div>

<?php
function filtreDataSupinfoEntreprises($Entreprises){
try {
         
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    
    $filter = [ 'Entreprises' => $Entreprises ]; 
    $query = new MongoDB\Driver\Query($filter);     
    
    $res = $mng->executeQuery("mydb.supinfo", $query);
    
    

    foreach ($res as $row) {
    if (!empty($Entreprises)) {
    
        echo nl2br("Nom du campus : Supinfo $row->name , Forum : $row->forum , Entreprises proche : $row->Entreprises \n\n");
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

$result = $_POST["Entreprises"];
filtreDataSupinfoEntreprises($result);
?>

