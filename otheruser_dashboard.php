<?php

session_start();

$userloginid=$_SESSION["userid"] = $_GET['userlogid'];
// echo $_SESSION["userid"];


?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="styles.css">

</head>
<style>
    body{
    background-image: url('images/1.jpg');
    background-size: cover;
}
.innerright,
label {
    color: rgb(16, 170, 16);
    font-weight: bold;
}

.container,
.row,
.imglogo {
    margin: auto;
}

.innerdiv {
    text-align: center;
    /* width: 500px; */
    margin: 100px;
}

input {
    margin-left: 20px;
}

.leftinnerdiv {
    float: left;
    width: 25%;
}

.rightinnerdiv {
    float: right;
    width: 75%;
}

.innerright {
    background-color: rgb(105, 221, 105);
}

.greenbtn {
    background-color: rgb(16, 170, 16);
    color: white;
    width: 95%;
    height: 40px;
    margin-top: 8px;
}

.greenbtn,
a {
    text-decoration: none;
    color: white;
    font-size: large;
}

th {
    background-color: orange;
    color: black;
}

td {
    background-color: #fed8b1;
    color: black;
}

td,
a {
    color: black;
}
</style>

<body>


    <?php
        include("data_class.php");
        $msg="";

        if(!empty($_REQUEST['msg'])){
            $msg=$_REQUEST['msg'];
        }

        if($msg=="done"){
            echo "<div class='alert alert-success' role='alert'>Sucssefully Done</div>";
        }
        elseif($msg=="fail"){
            echo "<div class='alert alert-danger' role='alert'>Fail</div>";
        }
    ?>
    <div class="container">
        <div class="innerdiv">
            <div class="row"><img class="imglogo" src="images/logo.png" /></div>
            <div class="leftinnerdiv">
                <Button class="greenbtn">Welcome</Button>
                <Button class="greenbtn" onclick="openpart('myaccount')"> My Account</Button>
                <Button class="greenbtn" onclick="openpart('complain')"> Add Complain</Button>
                <Button class="greenbtn" onclick="openpart('payMen')"> Pay Maintenance </Button>
                <a href="index.php"><Button class="greenbtn"> LOGOUT</Button></a>
            </div>


            <div class="rightinnerdiv">
                <div id="myaccount" class="innerright portion"
                    style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo ""; }?>">
                    <Button class="greenbtn">My Account</Button>

                    <?php

                        $u=new data;
                        $u->setconnection();
                        $u->userdetail($userloginid);
                        $recordset=$u->userdetail($userloginid);
                        foreach($recordset as $row){

                        $id= $row[0];
                        $name= $row[1];
                        $email= $row[2];
                        $pass= $row[3];
                        $flat_no= $row[4];
                    }               
                    ?>

                    <p style="color:black"><u>Person Name:</u> &nbsp&nbsp<?php echo $name ?></p>
                    <p style="color:black"><u>Person Email:</u> &nbsp&nbsp<?php echo $email ?></p>
                    <p style="color:black"><u>Flat Number:</u> &nbsp&nbsp<?php echo $flat_no ?></p>

                </div>
            </div>


            <div class="rightinnerdiv">
                <div id="complain" class="innerright portion" style="display:none">
                    <Button class="greenbtn">ADD COMPLAIN</Button>
                    <form action="add_complain.php" method="post" enctype="form-data">
                        <label>Name:</label><input type="text" name="name" />
                        </br>
                        <label>Complaint:</label><input type="text" name="complain" />
                        </br>
                        <input type="submit" value="SUBMIT" />
                    </form>
                </div>
            </div>
            

            <div class="rightinnerdiv">
                <div id="payMen" class="innerright portion" style="display:none">
                    <?php
                        $u=new data;
                        $u->setconnection();
                        $u->getAmount($flat_no);
                        $recordset=$u->getAmount($flat_no);
                        foreach($recordset as $row){
                            $amount_paid= $row[3];
                            $pending_amount = $row[2];
                            $flat_no = $row[0];
                        }               
                    ?>
                    <Button class="greenbtn">PAY MAINTENANCE</Button>

                    <p style="color:black"><u>Pending Amount:</u> &nbsp&nbsp<?php echo $pending_amount  ?></p>

                    <form action="payAmount.php" method="post" enctype="form-data">
                        <label>Amount:</label><input type="text" name="amount" />
                        </br>
                        <input type="hidden" name = "flat_no" value="<?php echo $flat_no ?>">
                        <input type="hidden" name = "pending_amount" value="<?php echo $pending_amount ?>">
                        <input type="hidden" name = "amount_paid" value="<?php echo $amount_paid ?>">
                        <input type="hidden" name = "userid" value="<?php echo $userloginid ?>">

                        <input type="submit" value="SUBMIT" />
                    </form>
                </div>
            </div>

           
        </div>
    </div>


    <script>
    function openpart(portion) {
        var i;
        var x = document.getElementsByClassName("portion");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        document.getElementById(portion).style.display = "block";
    }
    </script>
</body>

</html>