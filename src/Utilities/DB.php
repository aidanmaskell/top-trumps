<?php

namespace Transformers\Utilities;

class DB {
    public static function getDB() 
    {
        return new \PDO('mysql:host=db; dbname=Transformers', 'root', 'password');
    }
}