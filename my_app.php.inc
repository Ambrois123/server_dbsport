<?php

try{ 
    $pdo = new PDO('mysql:host=localhost', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($pdo->exec('DROP DATABASE IF EXISTS server_dbsport') !== false){
        if($pdo->exec('CREATE DATABASE server_dbsport') !== false){
            $server_dbsport = new PDO('mysql:dbname=server_dbsport; host=localhost', 'root', '');
            if($server_dbsport->exec('CREATE TABLE client(
                    client_id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
                    client_name VARCHAR(150) NOT NULL,
                    client_adress varchar(200) NOT NULL,
                    client_active BOOLEAN NOT NULL DEFAULT FALSE,
                    client_phone INT(11) NOT NULL,
                    client_email VARCHAR(200) NOT NULL,
                    client_dpo varchar(200) NOT NULL,
                    client_tech varchar(200) NOT NULL,
                    client_com varchar(200) NOT NULL,
                    client_url varchar(200) NOT NULL,
                    client_logo varchar(200) NOT NULL,
                    client_historic varchar(200) NOT NULL,
                    client_prez varchar(200) NOT NULL
            )') !== false){
                if($server_dbsport->exec('CREATE TABLE salle(
                    salle_id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
                    salle_name VARCHAR(200) NOT NULL,
                    salle_address VARCHAR(200) NOT NULL,
                    salle_active BOOLEAN NOT NULL DEFAULT FALSE,
                    clientId INT(11) NOT NULL,
                    FOREIGN KEY (clientId) REFERENCES client(client_id)
                )') !== false){
                    if($server_dbsport->exec('CREATE TABLE branch(
                        branch_id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
                        branch_name VARCHAR(200) NOT NULL,
                        salleId INT(11) NOT NULL,
                        FOREIGN KEY (salleId) REFERENCES salle(salle_id)
                    )') !== false){
                        if($server_dbsport->exec('CREATE TABLE offre(
                            offre_id INT(11) PRIMARY KEY AUTO_INCREMENT,
                            memb_lect BOOLEAN NOT NULL DEFAULT FALSE,
                            memb_bloc BOOLEAN NOT NULL DEFAULT FALSE,
                            memb_ajout BOOLEAN NOT NULL DEFAULT FALSE,
                            memb_ajout_prod BOOLEAN NOT NULL DEFAULT FALSE,
                            memb_agenda_lect BOOLEAN NOT NULL DEFAULT FALSE,
                            memb_stat_lect BOOLEAN NOT NULL DEFAULT FALSE,
                            memb_inscript_lect BOOLEAN NOT NULL DEFAULT FALSE,
                            paiement_agenda_lect BOOLEAN NOT NULL DEFAULT FALSE,
                            paiement_agenda_bloc BOOLEAN NOT NULL DEFAULT FALSE,
                            paiement_jour_lect BOOLEAN NOT NULL DEFAULT FALSE,
                            branchId INT(11) NOT NULL,
                            FOREIGN KEY (branchId) REFERENCES branch(branch_id)
                        )')!== false){
                            echo "Installation réussi";
                        }else{
                            echo "Impossible création table offre<br>";
                        }
                    }else{echo 'impossible creation table branch<br>';}
                }else {echo 'Impossible création table salle<br>';}
            }else { echo 'Impossible création table client<br>';}
        }else{ echo 'Impossible création DB<br>';}
    }else { echo'Impossible suppression DB';}

}catch (PDOException $e){
    echo '$e->getMessage()';
}