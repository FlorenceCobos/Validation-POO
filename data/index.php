<?php

require_once('./class.php'); 
$code = new Code($_SERVER['REQUEST_URI']); //pour utiliser les uri
$code->renderCode(true); //transformer false en true ou inversement en fonction de si on veut trier par ordre alphabétique ou l'ordre inverse

?>