<?php
use \PDO;
namespace model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=yoga', 'root', '');
        return $db;
    }
}

//   $host_name = 'db5001299596.hosting-data.io';
//   $database = 'dbs1108349';
//   $user_name = 'dbu479507';
//   $password = '<Yog@time1>';

//   $link = new mysqli($host_name, $user_name, $password, $database);

//   if ($link->connect_error) {
//     die('<p>La connexion au serveur MySQL a échoué: '. $link->connect_error .'</p>');
//   } else {
//     echo '<p>Connexion au serveur MySQL établie avec succès.</p>';
//   }


