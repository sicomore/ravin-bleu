<?php
$GLOBALS['WARC_LINKER']['WARC_REQUESTED_LANGUAGE'] = 'fr';
$_SERVER['REQUEST_URI'] = str_replace(basename(__FILE__),'home', $_SERVER['REQUEST_URI']);
if(!@include('shop_index.php')) echo "La boutique n'est pas configurée";
