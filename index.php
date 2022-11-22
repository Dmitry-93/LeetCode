<?php

/**
 * @var ?Application $APPLICATION
 */


require_once ('./header.php');

$menu = $APPLICATION::getMenuStructure();
dump($menu);

?>
<a href="/Problems">Problems</a>

