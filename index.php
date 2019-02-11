<?php
require('smarty/libs/Smarty.class.php');
require __DIR__ . '/vendor/autoload.php';
require 'DAO.php';

$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

DAO::init();
$books = DAO::getBooks();

$smarty = new Smarty();
$smarty->setConfigDir('smarty/configs');
$smarty->setCacheDir('smarty/cache');
$smarty->setTemplateDir('templates');
$smarty->setCompileDir('templates_c');
$smarty->assign('books', $books);

try {
    $smarty->display('index.tpl');
} catch (Exception $e) {
    echo $e;
}

