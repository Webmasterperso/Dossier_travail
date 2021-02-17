<?php
class Manager
{

    protected function dbConnect()
    {
        try {
            $db = new PDO('mysql:host=webmasterperso.fr.mysql;dbname=webmasterperso_;charset=utf8', 'webmasterperso_', 'webmaster2579');
            return $db;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
