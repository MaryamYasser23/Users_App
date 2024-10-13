<?php
    include_once('db.php');
    $action = false ;
    if(isset($_POST['save'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $password=$_POST['password'];
        $add_sql = "INSERT INTO `user`(`name`,`email`,`password`,`mobile`) VALUES ('$name','$email','$password','$mobile')";
        $res_add = mysqli_query($con,$add_sql);
        if(!$res_add){
            die(mysqli_error($con));
        }else{
            $action="add";
        }
    }
    $users_sql = "SELECT * FROM user";
    $all_user = mysqli_query($con,$users_sql);
    $user=$all_user -> fetch_assoc();
    var_dump($user);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/toastr.css">
    <title>User App</title>
</head>
<body>
    <div class="container">
        <div class="wrapper p-5 m-5">
            <div class="d-flex p-2 justify-content-between mb-2">
                <h2>All Users</h2>
                <div><a href="add_user.php"><i data-feather="user-plus"></i></a></div>
            </div>
            <hr>
            <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($user = $all_user-> fetch_assoc()){?>
                            <tr>
                                <td><?php echo $user['Id'];?></td>
                                <td><?php echo $user['Name'];?></td>
                                <td><?php echo $user['Email'];?></td>
                                <td><?php echo $user['Mobile'];?></td>
                                <td>Action</td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
                </table>
        </div>
    </div>

    <script src="js/jq.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/icons.js"></script>
    <script src="js/toastr.js"></script>
    <script src="js/main.js"></script>
    
    <?php
        if($action!=false){
            if($action=='add'){?>
                <script>
                    show_add()
                </script>
                <?php
            }
        }
    ?>

    <script>
        feather.replace();
    </script>
</body>
</html>