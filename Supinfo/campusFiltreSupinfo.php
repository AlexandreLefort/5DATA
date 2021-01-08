<h1>Nom du campus Supinfo</h1>

        
        <form action="campusFiltreSupinfo.php" method="post">
            <div class="c100">
                <label for="name">Nom du campus : </label>
                <input type="text" id="name" name="name">
            </div>

</br>
</br>

<?php
function filtreDataSupinfoName($name){
try {
         
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    
    $filter = [ 'name' => $name ]; 
    $query = new MongoDB\Driver\Query($filter);     
    
    $res = $mng->executeQuery("mydb.supinfo", $query);
    
    

    foreach ($res as $row) {
    if (!empty($name)) {
    
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

$result = $_POST["name"];
filtreDataSupinfoName($result);
?>

