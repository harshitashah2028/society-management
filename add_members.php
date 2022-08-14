<?php
//addserver_page.php
include("data_class.php");



$name=$_POST['name'];
$flatNumber=$_POST['flat_number'];
$familyMember=$_POST['family_members'];
$flatType=$_POST['flat_type'];
$vehicle=$_POST['vehicle'];
$noOfVehicle=$_POST['no_of_vehicle'];
$contactNumber=$_POST['contact_number'];

$obj=new data();
$obj->setconnection();
$obj->addbook($name,$flatNumber,$familyMember,$flatType,$vehicle,$noOfVehicle,$contactNumber);