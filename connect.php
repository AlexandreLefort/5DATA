

<?php


function voirLaBd(){
try {

    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $query = new MongoDB\Driver\Query([]); 
     
    $rows = $mng->executeQuery("mydb.persons", $query);
    
    foreach ($rows as $row) {
    
        echo nl2br("$row->name : $row->age , $row->campus\n");
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
	if(array_key_exists('test',$_POST)){ 
    voirLaBd(); 
	} 

?>

