<?php
session_start();
/*
 *  OrehaERP - allan.irdel
 *  chooseresto.php - UTF-8
 */

$liste = array(
  'KFC',
  'MCDO',
  'INTER',
  'QUICK',
  'FREDO',
  'PAILLE EN QUEUE',
  'PIZZA',
  'MANISSIEUX',
  'RESTO MIONS',
  'AU BORD DE L\'EAU',
  'DECATH',
  'CROISSANTERIE',
  'GENILLON',
  'L\'INSTANT FROMAGE'
);

if(!isset($_SESSION['choosed'])){
    $_SESSION['choosed'] =$liste[array_rand($liste, 1)] ;
}

echo $_SESSION['choosed'] . '<br>';
echo count($liste) . ' restaurants dans la liste';