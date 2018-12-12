<?php
    require 'ancien/connexion.php';
    if (isset($_POST['ville'])){
        //var_dump($_POST);
        $email = $_POST['email'];
        $ville = $_POST['ville'];
        $campus = $_POST['campus'];
        $filiere = $_POST['filiere'];
        $debut = $_POST['debut'];
        $fin = $_POST['fin'];
        $jour = $_POST['jour'];
        $horaires = $_POST['horaires '];
        $salle = $_POST['salle'];
        $cours = $_POST['cours'];
        $comment = $_POST['comment'];
        $enseignant = $_POST['enseignant'];
        $code = $_POST['c'];
        $etudiant = $_POST['etudiant'];

        //insertion
        $query = "insert into emploitemp values ('', '$email', '$ville', '$campus', '$filiere', '$debut', '$fin', '$jour','$horaires', '$salle', '$cours', '$enseignant', '$comment', '$code', 'etudiant', '' )";
        // use exec() because no results are returned
        $response = $pdo->exec($query);

        header('Location: emploi_temps.php?status=success&response='.$response);
        //echo "New record created successfully";
    }