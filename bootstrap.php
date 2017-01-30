<?php

require_once 'vendor/autoload.php';
session_start();

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

// Chemin vers les entités
$paths = ["src/Entity"];
$isDevMode = true;

// Paramètres de connexion à la base de données
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => 'root',
    'dbname'   => 'imiebook',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);

if (isset($_SESSION['user'])) {
    // Dit à doctrine d'aller récupérer l'objet en session
    $_SESSION['user'] = $entityManager->merge($_SESSION['user']);
}
