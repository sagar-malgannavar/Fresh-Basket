<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>VIEW YOU ORDERS</title>
        <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="images1/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

    </head>
        <body>
        <div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
					<table data-vertable="ver1">
						<thead>
    </body>
        <?php
        $custid=$_SESSION["custid"];
        $username=null;
        $passwd=null;
        $array_orders=array();
        $conn=new PDO("mysql:host=localhost;dbname=test",$username,$passwd);
        $stmt=$conn->prepare("select * from orders where custid=?");
        $stmt->bindParam(1, $custid);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            array_push($array_orders,$row);
        }
        $row=count($array_orders);
        $conn=null;
        echo "<div class=table100 ver5 m-b-110>";
    echo "<table data-vertable=ver5>";
    echo "<thead>";
    echo "<tr class=row100 head>";
    echo "<th class=column100 column1 data-column=column1>Order ID</th>";
    echo "<th class=column100 column2 data-column=column2>Customer ID</th>";
    echo "<th class=column100 column3 data-column=column3>Order Date</th>";
    echo "<th class=column100 column4 data-column=column4>Total Amount</th>";
    echo "</tr>";
    echo "</thead>";
    
    
        for($i=0;$i<$row;$i++)
        {
            $orderid=$array_orders[$i]["orderid"];
            echo "<tbody>";
            echo "<tr class=row100>";
            echo "<td class=column100 column1 data-column=column1><a href=viewmyorders.php?param_orderid=$orderid>$orderid</a></td>";
            echo "<td class=column100 column2 data-column=column2>".$array_orders[$i]["custid"]."</td>";
            echo "<td class=column100 column3 data-column=column3>".$array_orders[$i]["orderdate"]."</td>";
            echo "<td class=column100 column4 data-column=column4>".$array_orders[$i]["totalamount"]."</td>";
            echo "</tr>";
        }
        echo "</table>";
     ?>
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="js/main.js"></script>
</html>