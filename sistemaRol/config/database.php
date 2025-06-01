<?php
class Database {
    public static function connect() {
        return new PDO("mysql:host=localhost; dbname=db_sistema_rol", "root", "");
    }
}
?>