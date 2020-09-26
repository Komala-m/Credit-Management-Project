<?php
session_start();
$con=mysqli_connect('localhost','root','','users');
//mysqli_select_db($con,'id8930489_spark');
$name1=$_SESSION['name'];
$q="select name from user where not name='$name1'";
$result=mysqli_query($con,$q);
//$var=$_POST['name'];

//echo $_SESSION['name'];
?>


<html>
<head>
   <title>
   viewUser
    </title>
    <link rel="stylesheet" href="Assets/css/style.css">
    <style type="text/css">
        body{
            overflow: hidden;
            background-color: darkgray;
        }
        .view{
            text-align: center;
        }
        h1{
            text-align: center;
            color: maroon;
            font-family: sans-serif;
            background-color: dimgray;
            font-size: 34px;
        }
        h2{
            color: crimson;
            font-size: 32px;
        }
        .content{
            max-width: 550px;
            margin: auto;
        }
        
        .cont:hover{
             background-color: grey;
             color: black;
        }
    </style>
    </head>
    <body>
        <div class="content">
    <div class="view">
        <h1>Choose name for credit transfer</h1>
        <form action="transfer.php" method="post" style="position: relative; left: 40%;">
            <div class="col-md-12">
       <table>
           <th><h2>Name</h2></th>
           <?php  
     while($row = $result->fetch_assoc()) { ?>

        
   <tr>
       <td > <input type="radio" name="transfer" value="<?php echo $row["name"]; ?>"><?php echo $row["name"]; ?></td>
      
   </tr>
<?php }
  ?>
       <tr>
          
           <td class="cont"><input type="submit" value="credit" style="    background-color: transparent;
  color: #fff;
  padding: 16px 32px;
  text-align: center;
  font-size: 22px;
  margin: 4px 2px;
  transition: 0.3s;
  border-radius: 15px;
  border-color: black;
  border-width: medium;"></td>
           </tr>
        </table>
            </div>
        </form>
    </div>
        </div>
    </body>
</html>