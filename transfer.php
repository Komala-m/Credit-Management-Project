<?php
session_start();
$con=mysqli_connect('localhost','root','','users');
//mysqli_select_db($con,'test');
$q="select name from user";
$result=mysqli_query($con,$q);
//echo $_POST["transfer"];
if(isset($_POST['transfer'])){
$_SESSION['to']=$_POST["transfer"];
}
?>
<html>
<head>
   <title>
   viewUser
    </title>
    <link rel="stylesheet" href="Assets/css/style.css">
   <style>
     
         input[type=number]
        { 
            margin-top: 5px;
            width:10em;
            height:2em;
            font-size:24px;
            font-weight: bold;
        }
         input[type=submit]
        { 
            margin-top: 10px;
            width:6em;
            height:2em;
            font-size:24px;
            background-color: brown;
            font-weight: bold;
        }
       .view{
           text-align: center;
           font-size: 26px;
       }
       input[type=submit]:hover{
           background-color: gray;
           color: white;
       }
    </style>
    </head>
    <body>
     <form action="checkcredit.php" method="post"  style="position: relative; top:20%; ">
          <div class="view">
              <strong>Transfer Amount:</strong>
          <br>
            <br>
          <input type="number" min="1" step="1"  name="transfer"><br>
          <br>
        
          <input type="submit">
        
        </div>
        </form>

        
    </body>
</html>
