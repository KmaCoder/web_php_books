<?php
/**
 * Created by PhpStorm.
 * User: Maxim
 * Date: 11-Feb-19
 * Time: 19:06
 */

class Book {
    public $author;
    public $title;
    public $year;

    function __construct($author, $title, $year) {
        $this->author=$author;
        $this->title=$title;
        $this->year=$year;
    }
}