<h1>Supinfo 5DATA</h1>
<form action="filtreDataCampus.php" method="post">
            <div class="c100">
                <label for="campus">Campus : </label>
                <input type="text" id="campus" name="campus">
            </div>

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
    
        echo nl2br("$row->name : $row->age , $row->campus\n");
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