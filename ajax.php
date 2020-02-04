<?php
/**
 * Created by PhpStorm.
 * User: sstienface
 * Date: 25/01/2019
 * Time: 11:17
 */


//Remplacer les valeurs si besoin

$servername = "localhost"; $username = "root"; $password = ""; $dbname = "produits";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
// Selectionner la base à utiliser $conn->select_db($dbname);
    $conn->select_db($dbname);


    switch($_GET['action'])
    {
        case"affProducts":
            $res = "select * from `products` where 1";
            break;
        case"affPurchased":
            $res = "SELECT `buyer_name` FROM `products_purchased` WHERE 1";
            break;
    }

    if(isset($res))
    {

        $arr = array();
        $result = $conn->query($res);

        while($data = $result->fetch_assoc())
        {

            $arr[] = $data;

        }

        echo json_encode($arr);


    }




}


