<?php
include './classes/RectangleClass.php';
$rectangle = new RectangleClass();
$rectangle->set_data();
$rectangle->save_data();
$data = $rectangle->get_last_elements(5);
$rectangle->show_data_in_terminal($data);
