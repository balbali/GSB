<?php
/**
 * Index du projet GSB
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Yoheved Tirtsa Touati
 * @author    Beth Sefer
 */

require_once 'includes/fct.inc.php';//Besoin en préliminaire
require_once 'includes/class.pdogsb.inc.php';//idem
session_start(); // Variable Super Globale
$pdo = PdoGsb::getPdoGsb();
$estConnecte = estConnecte();
$estVisiteurConnecte= estVisiteurConnecte();
$estComptableConnecte= estComptableConnecte();
require 'vues/v_entete.php';//requis

$uc = filter_input(INPUT_GET, 'uc', FILTER_SANITIZE_STRING);//on verifie le contenu de uc
if ($uc && !$estConnecte) {
    $uc = 'connexion';
} else if (empty($uc)) {
    $uc = 'accueil';
}
switch ($uc) {
case 'connexion':
    include 'controleurs/c_connexion.php';
    break;
case 'accueil':
    include 'controleurs/c_accueil.php';
    break;
case 'gererFrais':
    include 'controleurs/c_gererFrais.php';
    break;
case 'etatFrais':
    include 'controleurs/c_etatFrais.php';
    break;
case 'deconnexion':
    include 'controleurs/c_deconnexion.php';
    break;
case 'validerFrais':
    include 'controleurs/c_validerFrais.php';
    break;
case 'suivreFrais':
    include 'controleurs/c_suivrePaiement.php';
    break;
}
require 'vues/v_pied.php';
