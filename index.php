<?php

include_once('./module/main/Application.php');
include_once('./Components/menu/class.php');

use Main\Application;
use Main\Component\Menu;

require('header.php');

Menu::getCurrentMenu();
