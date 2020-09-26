<?php
$con=mysqli_connect('localhost','root','','users');
//mysqli_select_db($con,'id8930489_spark');
$q="select name from user";
$result=mysqli_query($con,$q);
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Select User</title>
       <link rel="stylesheet" href="Assets/css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.css">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style type="text/css">
        
        tr:nth-child(even) {
  background-color: palegoldenrod;
}
        table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 50%;
  border: 1px solid #ddd;
}

th, td {
  text-align: center;
  padding: 8px;
}

        .social-menu li .fa{
            font-size: 30px;
            line-height: 50px;
            transition: 0.6s;
            color: #000;
        }
        .social-menu li .fa:hover{
        color: #fff;
        }
        .social-menu li a{
            position: relative;
            display: block;
            width: 50px;
            height: 50px;
            border-radius: none;
            background-color: #007bb5;
            text-align: center;
            transition: 0.6s;
            box-shadow: 0 5px 4px rgba(0,0,0,.5);
        }
        .social-menu ul li a:hover{
            transform: translate(0, -10px);
        }
        .social-menu ul li:nth-child(1) a:hover{
            background-color: #007bb5;
        }
        
    </style>
</head>
<body>
 <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="selectuser.php">Transfer</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" href="index.html">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="About_US.html">About us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="view.php">All users</a>
      </li> 
              <div class="social-menu">
        
            <li class="nav-item">  
                <a class="nav-link" href="https://www.linkedin.com/in/komala-m-8a03401a6"><i class="fa fa-linkedin"></i></a></li>
        
        </div>
    </ul>
      
  </div>  
</nav>

<form  action="userdetail.php" method="post">
    <h1 style="text-align: center;"> Select User from list</h1>
   <!-- <table class="flat-table flat-table-1"></table>-->


    <?php 
session_start();
$con=mysqli_connect('localhost','root','','users');

$q="select * from user ";
$result=mysqli_query($con,$q);
$row_count=mysqli_num_rows($result);
//echo $_SESSION['name'];

?>
    <div class="col-md-12">
   <table class="center table table-bordered table-striped" style="width: 50%; margin-left: auto; margin-right: auto;" >
    <thead class="thead-dark">
                          <tr>
                            
                            <th>Name</th>
                            <th>Email</th>
                            <th>Credit</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while($row=$result->fetch_assoc()){
                            ?>
                          <tr>
                            <td><?= $row['name']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['credit']; ?></td>
                              </tr>
                            <?php } ?>
                        </tbody>
</table>
    </div>
    <div class="view">

<table cellspacing=10px style="margin: 0px auto;">
  <tr>
      <td> <h2>Select User</h2></td>
   
<td>

<?php
$con=mysqli_connect('localhost','root','','users');
//mysqli_select_db($con,'id8930489_spark');
$q="select name from user";
$result=mysqli_query($con,$q);
?>


  <select name="name" onchange="this.form.submit()">
      <option>--Select--</option>
   <?php  
     while($row = $result->fetch_assoc()) { ?>

      <option value="<?php echo $row['name']; ?>"> <?php echo $row["name"]; ?></option>

<?php }
  ?>
  
        </select>
      </td>
    </tr>
      
        </table>
</div>
    
    </form> 
</body>
</html>