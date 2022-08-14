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
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<style>
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
            <div class="row"><img class="imglogo" src="images/logo.jpeg" /></div>
            <div class="leftinnerdiv"></Button>


                <Button class="greenbtn"> ADMIN</Button>
                <Button class="greenbtn" onclick="openpart('addbook')">ADD MEMBERS</Button>
                <Button class="greenbtn" onclick="openpart('viewmaintenance')"> VIEW MAINTENANCE</Button>
                <Button class="greenbtn" onclick="openpart('viewcomplaints')"> VIEW COMPLAINTS</Button>
                <a href="index.php"><Button class="greenbtn"> LOGOUT</Button></a>
            </div>
            <div class="rightinnerdiv">
                <div id="bookrequestapprove" class="innerright portion" style="display:none">
                    <Button class="greenbtn">BOOK REQUEST APPROVE</Button>

                    <?php
            $u=new data;
            $u->setconnection();
            $u->requestbookdata();
            $recordset=$u->requestbookdata();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Person Name</th><th>person type</th><th>Book name</th><th>Days </th><th>Approve</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
              "<td>$row[1]</td>";
              "<td>$row[2]</td>";

                $table.="<td>$row[3]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[5]</td>";
                $table.="<td>$row[6]</td>";
               // $table.="<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn btn-primary'>Approved BOOK</button></a></td>";
                 $table.="<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'>Approved</a></td>";
                // $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'>Delete</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

                </div>
            </div>

            <div class="rightinnerdiv">
                <div id="addbook" class="innerright portion"
                    style="<?php  if(!empty($_REQUEST['viewid'])){ echo "display:none";} else {echo ""; }?>">
                    <Button class="greenbtn">ADD MEMBERS</Button>
                    <form action="add_members.php" method="post" enctype="form-data">
                        <label>NAME:</label><input type="text" name="name" />
                        </br>
                        <label>FLAT NO:</label><input type="text" name="flat_number" /></br>
                        <label>FAMILY MEMBERS:</label><input type="text" name="family_members" /></br>
                        <div>FLAT TYPE:<input type="radio" name="flat_type" value="RK" />RK
                            <input type="radio" name="flat_type" value="1BHK" />1BHK<div style="margin-left:80px">
                                <input type="radio" name="flat_type" value="2BHK" />2BHK
                                <input type="radio" name="flat_type" value="3BHK" />3BHK
                            </div>
                            <label>VEHICLE:</label><input type="text" name="vehicle" /></br>
                        </div>
                        <label>NO OF VEHICLE:</label><input type="number" name="no_of_vehicle" /></br>
                        <label>CONTACT NUMBER:</label><input type="number" name="contact_number" /></br>

                        </br>

                        <input type="submit" value="SUBMIT" />
                        </br>
                        </br>

                    </form>
                </div>
            </div>


            <div class="rightinnerdiv">
                <div id="addperson" class="innerright portion" style="display:none">
                    <Button class="greenbtn">ADD Person</Button>
                    <form action="addpersonserver_page.php" method="post" enctype="multipart/form-data">
                        <label>Name:</label><input type="text" name="addname" />
                        </br>
                        <label>complaint:</label><input type="pasword" name="addpass" />
                        </br>
                        <input type="submit" value="SUBMIT" />
                    </form>
                </div>
            </div>

            <div class="rightinnerdiv">
                <div id="studentrecord" class="innerright portion" style="display:none">
                    <Button class="greenbtn">Student RECORD</Button>

                    <?php
            $u=new data;
            $u->setconnection();
            $u->userdata();
            $recordset=$u->userdata();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'> Name</th><th>Email</th><th>Type</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[1]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[4]</td>";
                // $table.="<td><a href='deleteuser.php?useriddelete=$row[0]'>Delete</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

                </div>
            </div>

            <div class="rightinnerdiv">
                <div id="issuebookreport" class="innerright portion" style="display:none">
                    <Button class="greenbtn">Issue Book Record </Button>

                    <?php
            $u=new data;
            $u->setconnection();
            $u->issuereport();
            $recordset=$u->issuereport();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            p adding: 8px;'>Issue Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th></th><th>Issue Type</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td>$row[4]</td>";
                // $table.="<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'>Return</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

                </div>
            </div>

            <!--             

issue book -->
            <div class="rightinnerdiv">
                <div id="issuebook" class="innerright portion" style="display:none">
                    <Button class="greenbtn">VIEW COMPLAIN</Button>
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
                <div id="bookdetail" class="innerright portion"
                    style="<?php  if(!empty($_REQUEST['viewid'])){ $viewid=$_REQUEST['viewid'];} else {echo "display:none"; }?>">

                    <Button class="greenbtn">BOOK DETAIL</Button>
                    </br>
                    <?php
            $u=new data;
            $u->setconnection();
            $u->getbookdetail($viewid);
            $recordset=$u->getbookdetail($viewid);
            foreach($recordset as $row){

                $bookid= $row[0];
               $bookimg= $row[1];
               $bookname= $row[2];
               $bookdetail= $row[3];
               $bookauthour= $row[4];
               $bookpub= $row[5];
               $branch= $row[6];
               $bookprice= $row[7];
               $bookquantity= $row[8];
               $bookava= $row[9];
               $bookrent= $row[10];

            }            
?>

                    <img width='150px' height='150px' style='border:1px solid #333333; float:left;margin-left:20px'
                        src="uploads/<?php echo $bookimg?> " />
                    </br>
                    <p style="color:black"><u>NAME:</u> &nbsp&nbsp<?php echo $bookname ?></p>
                    <p style="color:black"><u>FLAT NO:</u> &nbsp&nbsp<?php echo $bookdetail ?></p>
                    <p style="color:black"><u>FAMILY MEMBER:</u> &nbsp&nbsp<?php echo $bookauthour ?></p>
                    <p style="color:black"><u>FLAT TYPE:</u> &nbsp&nbsp<?php echo $bookpub ?></p>
                    <p style="color:black"><u>VEHICLE:</u> &nbsp&nbsp<?php echo $branch ?></p>
                    <p style="color:black"><u>NO OF VEHICLE:</u> &nbsp&nbsp<?php echo $bookprice ?></p>
                    <p style="color:black"><u>CONTACT NUMBER:</u> &nbsp&nbsp<?php echo $bookava ?></p>

                </div>
            </div>



            <div class="rightinnerdiv">
                <div id="viewmaintenance" class="innerright portion" style="display:none">
                    <Button class="greenbtn">VIEW MAINTENANCE</Button>
                    <?php
            $u=new data;
            $u->setconnection();
            $u->getMaintenance();
            $recordset=$u->getMaintenance();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Flat No</th><th>FLAT OWNER</th><th>AMOUNT PAID</th><th>AMOUNT PENDING</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
               $table.="<td>$row[0]</td>";
                $table.="<td>$row[1]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                // $table.="<td><a href='admin_service_dashboard.php?viewid=$row[0]'><button type='button' class='btn btn-primary'>View BOOK</button></a></td>";
                // $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'>Delete</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

                </div>
            </div>


            <div class="rightinnerdiv">
                <div id="viewcomplaints" class="innerright portion" style="display:none">
                    <Button class="greenbtn">VIEW MAINTENANCE</Button>
                    <?php
            $u=new data;
            $u->setconnection();
            $u->getComplainList();
            $recordset=$u->getComplainList();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>User Id</th><th>User Name</th><th>Complain</th>tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
               $table.="<td>$row[0]</td>";
                $table.="<td>$row[1]</td>";
                $table.="<td>$row[2]</td>";
                // $table.="<td>$row[3]</td>";
                // $table.="<td><a href='admin_service_dashboard.php?viewid=$row[0]'><button type='button' class='btn btn-primary'>View BOOK</button></a></td>";
                // $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'>Delete</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

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