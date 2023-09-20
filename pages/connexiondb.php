<?php
    try{
        $pdo=new PDO("mysql:host=localhost;dbname=gestionstagiaires","root","");
    }catch(Exception $e){
            die('Erreur de connexion :' .$e->getMessage());
    }
?>