<?php 

include('db.php');

$sql = "SELECT COUNT('id') + 1 FROM posts";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $idCount = $statement->fetchAll();

        $stringify = json_encode($idCount);
        $idstring = substr($stringify, 21, 1);
        $id = (int)$idstring;
        echo $id;
        

        // while ($row = $idCount->fetch(PDO::FETCH_ASSOC)) { $id = $row['id']; }
        // echo $id;

        // foreach ($idCount as $id) { $id = $id; }

        // echo $id;

        echo '<pre>';
        print_r($idCount);
        echo '</pre>';

        $currentDate = date('Y-m-d H:i:s');

        echo $currentDate;
?>