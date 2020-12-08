<?php

class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=yoga', 'root', '');
        return $db;
    }
}


