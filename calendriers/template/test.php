<?php
ob_start(); // ouverture du tampon
echo 'Une phrase de la mort qui tue';
// echo 'dklqfjhsdlkfj';
$tampon = ob_get_clean(); // stockage du tampon dans une chaîne de caractères
// $tampon = ob_get_contents(); // stockage du tampon dans une chaîne de caractères
// ob_end_clean(); // fermeture de la tamporisation de sortie et effacement du tampon
echo $tampon ;
?>
