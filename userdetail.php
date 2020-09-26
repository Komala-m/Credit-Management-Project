<?php 
session_start();
$con=mysqli_connect('localhost','root','','users');
$name=$_POST['name'];
$q="select * from user where name='$name'";
$result=mysqli_query($con,$q);
$row_count=mysqli_num_rows($result);
$_SESSION['name']=$name;
//echo $_SESSION['name'];

?>
<html>
<head>
    <meta charset="utf-8">
   <title>
   viewUser
    </title>
    <link rel="stylesheet" href="Assets/css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style type="text/css">
    .center{
  margin: 0;
  position: absolute;
  top: 38%;
  left: 50%;
 -ms-transform: translate(-50%, -50%);
 transform: translate(-50%, -50%);
white-space: normal; 
      
}
        .center1{
  margin: 0;
  position: absolute;
  top: 60%;
  left: 50%;
 -ms-transform: translate(-50%, -50%);
 transform: translate(-50%, -50%);
white-space: normal; 
      
}
          .btn {
  background-color: transparent;
  color: #000;
  padding: 16px 20px;
  text-align: center;
  font-size: 22px;
  margin: 4px 2px;
  transition: 0.3s;
  border-radius: 15px;
  border-color: black;
  border-width: medium;
}

.btn:hover {
  background-color: grey;
  color: #000;
}

        .container{
  border-radius: 5px;
  background-color: transparent;
  padding: 20px;
        }
        .view{
            text-align: center;
            font-size: 20px;
            color: crimson;
        }
    </style>
</head>
    <body>
    <div class="view">
        <h2>User Information</h2>
        <div class="col-12">
        <table class="table  table-bordered table-dark table-striped" style="width: 50%; margin-left: auto; margin-right: auto;">
    <thead>
      <tr>
        <th>Name</th>
           <th>Email</th>
           <th>Credit</th>
      </tr>
    </thead>
    <tbody>
      <tr>
           <?php  $row=mysqli_fetch_array($result); ?>
 <td><?php echo  $row["name"]; ?></td>
  <td><?php echo  $row["email"]; ?></td>
  <td><?php echo  $row["credit"]; ?></td>
   </tr>

    </tbody>
  </table>
        </div>
        </div>
        <br>
        <div class="css-button" >
                 <p class="css-button-text" style="text-align: center; font-size: 22px; color: blue;">Transfer To</p>
                <!-- <div class="css-button-inner">
                 <a href="viewuser.php" >
                 <div class="reset-skew">
             <button><p class="css-button-inner-text">Transfer To</p></button>    
               </div></a>
               </div>-->
            <div class="container">
  <div class="center">
      <a href="viewuser.php"><button class="btn"><strong>Transfer To</strong></button></a>
      
  </div>
</div>
               </div>


               <br> <br> <br>
               
                 <div class="container">
  <div class="center1">
      <a href="selectuser.php"><button class="btn"><strong>Back</strong></button></a>
      
  </div>
</div>
            
               


    </body>
</html>