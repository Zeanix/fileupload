
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<html>
    <head>

        <?php 
          session_start();
          ob_start();
        include('includes/head.php');
        include('lib/wideimage.php');
        include'includes/connect.php';
        include'includes/functions.php';
        
        ?>
    </head>
           
       <?php 
       
        $user_id = $_SESSION['bruger_id'];
       
       ?>
    
    <body>
        
		<?php

if(!empty($_SESSION)){

?>
        
        <?php 
        
            include('includes/jsjq.php');
        
        ?>
     
        <?php 
        include('includes/menu.php');
        ?>
         
       


        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                <br><br><br><br>
 
 <!--################################# CONTENT ###########################################-->
 
        
        <?php 
                                            
                                            if(isset($_POST['submit']))
                                            {
                                                
                                                
                                                if(!empty($_POST['navn']))
                                                {

                                                $navn = $_POST['navn'];

                                                }
                                                else
                                                {
                                                $navn = NULL;
                                                $error_name = "<strong>Error!</strong> Remember your first name";
                                                echo '<div class="alert alert-danger" role="alert">';
                                                echo $error_name;
                                                echo '</div>';
                                                }
                                                
                                                if(!empty($_POST['last']))
                                                {

                                                $last = $_POST['last'];

                                                }
                                                else
                                                {
                                                $last = NULL;
                                                $error_last = "<strong>Error!</strong> Remember your last name";
                                                echo '<div class="alert alert-danger" role="alert">';
                                                echo $error_last;
                                                echo '</div>';
                                                }
                                                
                                                if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                                                $email = $_POST['email'];

                                                }
                                                else
                                                {
                                                $email = NULL;
                                                $error_email = "<strong>Error!</strong> Remember your Email";
                                                echo '<div class="alert alert-danger" role="alert">';
                                                echo $error_email;
                                                echo '</div>';
                                                }
                                                
                                                if(!empty($_POST['username']))
                                                {

                                                $username = $_POST['username'];

                                                }
                                                else
                                                {
                                                $username = NULL;
                                                $error_username = "<strong>Error!</strong> Remember to create a username";
                                                echo '<div class="alert alert-danger" role="alert">';
                                                echo $error_username;
                                                echo '</div>';
                                                }
                                                
                                                if(!empty($_POST['password1']))
                                                {

                                                if(($_POST['password1']) == ($_POST['password2']))
                                                {
                                                    
                                                    $password1 = $_POST['password1'];
                                                    
                                                }
                                                else {
                                                        
                                                $password1 = NULL;
                                                $error_password1 = "<strong>Error!</strong> The passwords do not match!";
                                                echo '<div class="alert alert-danger" role="alert">';
                                                echo $error_password1;
                                                echo '</div>';
                                                
                                                    
                                                }
                                                }
                                                else
                                                {
                                                $password1 = NULL;
                                                $error_password1 = "<strong>Error!</strong> Remember to create a password";
                                                echo '<div class="alert alert-danger" role="alert">';
                                                echo $error_password1;
                                                echo '</div>';
                                                }
                                                 
                                                
                                                if($navn && $last && $email && $username && $password1){

                                                $sqlcreateuser = "UPDATE brugere SET bruger_fornavn = '$navn', bruger_efternavn = '$last', bruger_email = '$email', bruger_username = '$username', bruger_password = '$password1' WHERE bruger_id = '$user_id'";

                                                mysqli_query($conn, $sqlcreateuser);

                                                $updated = urlencode("<b>Success!</b> Your Information was updated");
                                                header("location: main.php?updated=".$updated);
                                                
                                                
                                            }
                                            
                                            }
                                            
                                            ?>
                                            
                                            <?php 
                                           
                                            
                                            $usersql = "SELECT * FROM brugere WHERE bruger_id = $user_id";
                                            $userquery = mysqli_query($conn, $usersql);
                                            $row = mysqli_fetch_assoc($userquery);
                                            
                                            ?>
                                            
                                            
                                            <form class="form-horizontal" action="" method="post">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 control-label">First Name</label>
                                                    <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="navn" value="<?php echo $row['bruger_fornavn']; ?>" placeholder="First Name">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="last" class="col-sm-3 control-label">Last Name</label>
                                                    <div class="col-sm-9">
                                                    <input type="text" class="form-control" value="<?php echo $row['bruger_efternavn']; ?>" name="last" placeholder="Last Name">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="email" class="col-sm-3 control-label">Email</label>
                                                    <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="email" value="<?php echo $row['bruger_email']; ?>" placeholder="Email">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="username" class="col-sm-3 control-label">Username</label>
                                                    <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="username" value="<?php echo $row['bruger_username']; ?>" placeholder="Username">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="password1" class="col-sm-3 control-label">Password</label>
                                                    <div class="col-sm-9">
                                                    <input type="password" class="form-control" name="password1" placeholder="Password">
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="form-group">
                                                    <label for="password2" class="col-sm-3 control-label">Verify Password</label>
                                                    <div class="col-sm-9">
                                                    <input type="password" class="form-control" name="password2" placeholder="Verify Password">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" name="submit" class="btn btn-blue">Update</button>
                                                    <br><br><br><br><br><br>
                                                    </div>
                                                </div>
                                               </form>
        
        
 
 <!--################################# End Content #########################################-->
                </div>
                </div>
            </div>

                             
                             <?php 
                             include('includes/footer.php');
                             ?>
                             
                         
   <?php
}

else

{
    $Message = urlencode("<b>Notice!</b> You need to be logged in to access that page.");
	header("location: ../index.php?Message=".$Message);

}

?> 
    
    </body>
</html>