<?php

include("data_class.php");

$name=$_POST['name'];
$complain= $_POST['complain'];

$obj=new data();
$obj->setconnection();
$obj->addComplain($name, $complain);