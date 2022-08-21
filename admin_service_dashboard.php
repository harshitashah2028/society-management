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
    body{
    background-image: url('images/1.jpg');
    background-size: cover;
}
.innerright,
label {
    color: dimgray;
    font-weight: bold;
}

.container,
.imglogo {
    margin: auto;
}

.row{
    margin: auto;
    margin-bottom: 20px;
}

.contentDiv{
    display: flex;
    justify-content: space-between;
    padding: 0 100px;
    padding-top: 10px;
    margin-right: 200px;
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
    /* background-color: ; */
    
}

/* .formDiv{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-right: 100px;
} */

.greenbtn {
    background-color: dimgray;
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
    background-color: lightgray;
    color: black;
    border: 1px solid black;
    padding-left: 10px;
}

td {
    background-color: lightgray;
    color: black;
    border: 1px solid black;
    padding-left: 10px;
}

td,
a {
    color: black;
}
td{
    border: 1px solid black;
    padding-left: 10px;
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
            <div class="row"><img class="imglogo" src="images/society.png" /></div>
            <div class="leftinnerdiv"></Button>
                <Button class="greenbtn"> ADMIN</Button>
                <Button class="greenbtn" onclick="openpart('addbook')">ADD MEMBERS</Button>
                <Button class="greenbtn" onclick="openpart('viewmaintenance')"> VIEW MAINTENANCE</Button>
                <Button class="greenbtn" onclick="openpart('viewcomplaints')"> VIEW COMPLAINTS</Button>
                <a href="index.php"><Button class="greenbtn"> LOGOUT</Button></a>
            </div>
            
            <div class="rightinnerdiv">
                <div id="addbook" class="innerright portion"
                    style="<?php  if(!empty($_REQUEST['viewid'])){ echo "display:none";} else {echo ""; }?>">
                    <Button class="greenbtn">ADD MEMBERS</Button>
                    <form action="add_members.php" method="post" enctype="form-data">
                        <div class="contentDiv">
                            <label>NAME:</label>
                            <input type="text" name="name" />
                        </div>
                        <div class="contentDiv">
                            <label>FLAT NO:</label><input type="text" name="flat_number" />
                        </div>
                        <div class="contentDiv">
                            <label>FAMILY MEMBERS:</label><input type="text" name="family_members" />
                        </div>
                        <div class="contentDiv">
                            FLAT TYPE:
                            <div><input type="radio" name="flat_type" value="RK" />RK</div>
                            <div><input type="radio" name="flat_type" value="1BHK" />1BHK</div>
                            <div><input type="radio" name="flat_type" value="2BHK" />2BHK</div>
                            <div><input type="radio" name="flat_type" value="3BHK" />3BHK</div>
                        </div>
                        <div class="contentDiv">
                        <label>VEHICLE:</label><input type="text" name="vehicle" />
                        </div>
                        <div class="contentDiv">
                        <label>NO OF VEHICLE:</label><input type="number" name="no_of_vehicle" />
                        </div>
                        <div class="contentDiv">
                            <label>CONTACT NUMBER:</label><input type="number" name="contact_number" />
                        </div>

                        <div style="margin-left: 250px"> 
                            <input type="submit" value="SUBMIT" />
                        </div>
                        </br>
                        </br>

                    </form>
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

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'>
            <tr><th style='background-color: dimgray;
            padding: 8px;'>Flat No</th>
            <th style='background-color: dimgray;'>FLAT OWNER</th>
            <th style='background-color: dimgray;'>AMOUNT PAID</th>
            <th style='background-color: dimgray;'>AMOUNT PENDING</th></tr>";
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

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'>
            <tr style='background-color: dimgray;'><th style='background-color: dimgray; padding: 8px;'>User Id</th>
            <th style='background-color: dimgray;'>User Name</th>
            <th style='background-color: dimgray;'>Complain</th></tr>";
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