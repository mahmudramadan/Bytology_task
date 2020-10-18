<?php
include './classes/RectangleClass.php';
$rectangle = new RectangleClass();
$rectangle->setData();
$rectangle->saveData();
$data = $rectangle->getLastElements(5);
$rectangle->showDataInTerminal($data);
