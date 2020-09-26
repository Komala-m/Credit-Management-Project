<?php
  include 'action.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>user's data</title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.css">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <style type="text/css">
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
        <header>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="view.php">All users</a>
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
        <a class="nav-link" href="selectuser.php">Transfer</a>
      </li> 
              <div class="social-menu">
        
            <li class="nav-item">  
                <a class="nav-link" href="https://www.linkedin.com/in/komala-m-8a03401a6"><i class="fa fa-linkedin"></i></a></li>
        
        </div>
    </ul>
      
  </div>  
</nav>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h3 class="text-center text-dark mt-2">User's Data</h3>
                    <hr>
                
                    <?php if(isset($_SESSION['response'])){ ?>
                    <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
    
  
                    <?= $_SESSION['response']; ?>
                    </div>
                    <?php } unset($_SESSION['response']); ?>
                    
                </div>
                
            </div>
            
            <div class="row">
                <div class="col-md-4">
                <h3 class="text-center text-info">Add User's</h3>
                    <form action="action.php" method="post">
                       <!-- <input type="hidden" name="id" value="<?= $id; ?>"-->
                        <div class="form-group">
                           <input type="id" name="id" value="<?= $id; ?>" class="form-control" placeholder="Enter ID" required>
                        </div>
                        <div class="form-group">
                           <input type="text" name="name" value="<?= $name; ?>" class="form-control" placeholder="Enter name" required>
                        </div>
                        <div class="form-group">
                           <input type="email" name="email" value="<?= $email; ?>" class="form-control" placeholder="e-mail : example@gmail.com" required>
                        </div>
                        <div class="form-group">
                           <input type="number" min="1" step="1"
                                  name="credit" value="<?= $credit; ?>" class="form-control" placeholder="Credit" required>
                        </div>
                        <div class="form-group">
                         <?php if($update==true){?>
                         <input type="submit" name="update" class="btn btn-success btn-block" value="Update">
                        <?php } else{ ?>
                        <input type="submit" name="add" class="btn btn-primary btn-block" value="Add">
                        <?php } ?>
                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <?php 
                        $query="SELECT * FROM user";
                        $stmt=$conn->prepare($query);
                        $stmt->execute();
                        $result=$stmt->get_result();
                    ?>
                   <h3 class="text-center text-info">List of User's</h3> 
                     <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Credit</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while($row=$result->fetch_assoc()){
                            ?>
                          <tr>
                            <td><?= $row['id']; ?></td>
                            <td><?= $row['name']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['credit']; ?></td>
                            <td>
                           <!-- <a href="#" class="badge badge-primary p-2">Details</a> |-->
                            <a href="action.php?delete=<?= $row['id']; ?>" class="badge badge-danger p-2 alert alert-danger" onclick="return confirm('Do you want to delete this user?')">Delete</a> |
                            <a href="view.php?edit=<?= $row['id']; ?>" class="badge badge-primary p-2 alert alert-info">Edit</a>
                              </td>
                          </tr>
                            <?php } ?>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
        </header>
    </body>
</html>