<?php

include("data_class.php");

$flat_no=$_POST['flat_no'];
$amount=$_POST['amount'];

$obj=new data();
$obj->setconnection();
$obj->addAmount($flat_no, $amount);