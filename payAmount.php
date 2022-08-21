<?php

include("data_class.php");

$userid=$_POST['userid'];
$flat_no=$_POST['flat_no'];
$amount_paid=$_POST['amount_paid'];
$amount=$_POST['amount'];
$pending_amount=$_POST['pending_amount']-$amount;
$amount=$amount+$amount_paid;
$obj=new data();
$obj->setconnection();
$obj->addAmount($userid,$flat_no, $pending_amount, $amount);