<?php

/**
 * @var ?Application $APPLICATION
 */


require_once ('./header.php');

$menu = $APPLICATION::getMenuStructure();
//$menuSys = $APPLICATION::getMenuStructure(true);
dump($menu);
//dump($menuSys);
?>
<a href="/Problems">Problems</a>

