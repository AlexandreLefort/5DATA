<h1>Participation Forum</h1>

 <link rel="stylesheet" href="../styleFiltre.css" />
        
        <form action="campusFiltreSupinfoForum.php" method="post">
            <div class="c100">
                <label for="forum">Voir la participation </label>
                <input type="text" id="forum" name="forum">
            </div>

<?php
function filtreDataSupinfoForum($forum){
try {
         
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    
    $filter = [ 'forum' => $forum ]; 
    $query = new MongoDB\Driver\Query($filter);     
    
    $res = $mng->executeQuery("mydb.supinfo", $query);
    
    

    foreach ($res as $row) {
    if (!empty($forum)) {
    
        echo nl2br("Nom du campus : Supinfo $row->name , Forum : $row->forum , Nombre de participation : $row->nbrParticipation \n\n");
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

$result = $_POST["forum"];
filtreDataSupinfoForum($result);
?>

