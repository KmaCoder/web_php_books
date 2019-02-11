<?php
/**
 * Created by PhpStorm.
 * User: Maxim
 * Date: 11-Feb-19
 * Time: 19:08
 */

require 'Book.php';

class DAO
{
    private static $dbConnection = null;
    static private $books;

    static public function init()
    {
        self::dbConnect();

        foreach (self::$dbConnection->query("select author, title, year from books") as $row) {
            self::$books[] = new Book($row["author"], $row["title"], $row["year"]);
        }

        self::dbDisconnect();
    }

    static public function getBooks()
    {
        return self::$books;
    }

    static private function dbConnect()
    {
        self::$dbConnection = new PDO("mysql:host=" . $_ENV['DB_HOST'] . ";charset=utf8;" . "dbname=" . $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
        self::$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    static private function dbDisconnect()
    {
        self::$dbConnection = null;
    }
}