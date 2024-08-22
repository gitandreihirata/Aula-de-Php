<?php

include_once 'connection.php';

if (isset($conn)) {
    
    $read = $conn->prepare('SELECT * FROM pessoa WHERE idpessoa < ?');
    
    $id = 100;
    
    $read->bindParam(1, $id, PDO::PARAM_INT);
    
    $read->execute();
    
//     foreach ($read as $row) {
//         print $row['idpessoa'] . "\t";
//         print $row['nome'] . "\t";
//         print $row['email'] . "<br/>";
//     }

    while ($row = $read->fetch(PDO::FETCH_OBJ)){
        echo $row->idpessoa . ' | ' ;
        echo $row->nome. ' | ';
        echo $row->email . "<br/>";
    }
    
    $read->closeCursor();
    
    $conn = null;
}

?>