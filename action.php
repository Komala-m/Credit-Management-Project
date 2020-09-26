<?php
 session_start();
 include 'config.php';
  
 $update=false;
 $id="";
 $name="";
 $email="";
 $credit="";
 $amterr = "";
  if(isset($_POST['add'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $credit=$_POST['credit'];
    
    $query="INSERT INTO user(id,name,email,credit)VALUES(?,?,?,?)";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("ssss",$id,$name,$email,$credit);
    $stmt->execute();
    
    header('location:view.php');
    $_SESSION['response']="Successfully Inserted to the database!";
    $_SESSION['res_type']="success";  
  }
  if(isset($_GET['delete'])){
      $id=$_GET['delete'];
      
      $query="DELETE FROM user WHERE id=?";
      $stmt=$conn->prepare($query);
      $stmt->bind_param("i",$id);
      $stmt->execute();
      
      header('location:view.php');
      $_SESSION['response']="Successfully Deleted!";
      $_SESSION['res_type']="danger";
  }
 if(isset($_GET['edit'])){
     $id=$_GET['edit'];
     $query="SELECT * FROM user WHERE id=?";
     $stmt=$conn->prepare($query);
     $stmt->bind_param("i",$id);
     $stmt->execute();
     $result=$stmt->get_result();
     $row=$result->fetch_assoc();
     
     $id=$row['id'];
     $name=$row['name'];
     $email=$row['email'];
     $credit=$row['credit'];
     
     $update=true;
   }
  if(isset($_POST['update'])){
     $id=$_POST['id'];
     $name=$_POST['name'];
     $email=$_POST['email'];
     $credit=$_POST['credit'];
      
     $query="UPDATE user SET name=?,email=?,credit=? WHERE id=?";
     $stmt=$conn->prepare($query);
     $stmt->bind_param("ssss",$name,$email,$credit,$id);
     $stmt->execute();
     
     $_SESSION['response']="Updated Successfully!";
     $_SESSION['res_type']="primary";
     header('location:view.php');
  }
?>