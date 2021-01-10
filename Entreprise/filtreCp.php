<h1>Contrat Pro en Entreprise</h1>



</br>
</br>
<head>
        <meta charset="UTF-8">
        <title>SupDATA</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        
        
        
    </head>
    <body class="landing">

        
 <form action="filtreCp.php" method="post">
            <div class="c100">
                <label for="fname">Nom : </label>
                <input type="text" id="name" name="name">
            </div>

 </br>
</br>     

</body>

<?php
function filtreDataCpEntreprise($name){
try {
         
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    
    $filter = [ 'name' => $name ]; 
    $query = new MongoDB\Driver\Query($filter);     
    
    $res = $mng->executeQuery("mydb.entreprise", $query);
    
    

    foreach ($res as $row) {
    if (!empty($name)) {
    
        echo nl2br("Nom : $row->name , Ville : $row->ville , Contrat Pro  : $row->cp \n\n");

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
filtreDataCpEntreprise($result);
?>