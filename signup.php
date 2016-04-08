<?php 
    require('includes/connect.php');
?>
<html>
    <head>

        <?php 
        include('includes/head.php');
        ?>

    </head>
    
    
    <body>
        <?php 
        include('includes/jsjq.php');
        ?>
        
        <?php 
        include('includes/menu.php');
                if(isset($login_error))
        {
            
            echo '<center>' . $login_error . '</center>';
            
        }
        ?>
        
        
        <div class="container">
            <div class="row">
                <br /><br />
                <div class="col-md-6 col-md-offset-3">
                    
                    <h1>Create your free account
                    </h1>
                    
                </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4 col-md-offset-5">
                        <br /><br />
                    <br /><br /><br /><br /><br />
                    </div>
                </div>
               
                           </div> 
                
               
                                <div class="row">
                                    <div class="container">
                                        <div class="col-md-6 col-md-offset-2">
                                            
                                            
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
                                                
                                                
                                                if(!empty($_POST['terms']))
                                                {

                                                $terms = 1;

                                                }
                                                else
                                                {
                                                
                                                $terms = NULL;
                                                $error_terms = "<strong>Error!</strong> You have to accept the terms of use in order to use this service.";
                                                echo '<div class="alert alert-danger" role="alert">';
                                                echo $error_terms;
                                                echo '</div>';
                                                
                                                
                                                }
                                                
                                                
                                                if($navn && $last && $email && $username && $password1 && $terms){

                                                $sqlcreateuser = "INSERT INTO brugere VALUES ('', '$navn', '$last', '$email', '$username', '$password1', '$terms')";
                                                mysqli_query($conn, $sqlcreateuser);

                                                echo '<div class="alert alert-success" role="alert">';
                                                echo "Your user account was created, you will now be logged in";
                                                echo '</div>';
                                                
                                                
                                            }
                                            
                                            }
                                            
                                            ?>
                                            
                                            
                                            
                                            <form class="form-horizontal" action="" method="post">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 control-label">First Name</label>
                                                    <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="navn" placeholder="First Name">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="last" class="col-sm-3 control-label">Last Name</label>
                                                    <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="last" placeholder="Last Name">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="email" class="col-sm-3 control-label">Email</label>
                                                    <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="email" placeholder="Email">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="username" class="col-sm-3 control-label">Username</label>
                                                    <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="username" placeholder="Username">
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
                                                    <div class="checkbox">
                                                        <label>
                                                        <input type="checkbox" name="terms"> I agree to <a data-toggle="modal" data-target="#myModal">Terms of Use</a>
                                                        </label>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" name="submit" class="btn btn-blue">Sign Up</button>
                                                    <br><br><br><br><br><br>
                                                    </div>
                                                </div>
                                               </form>
                                            
                                            
                                            
                                            </div>
                                        </div>
                                    </div>
               
               
               
                                 
                                 </div>
                             </div>
                             
                            
                            
                                <!-- Modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Terms of Use</h4>
                                    </div>
                                    <div class="modal-body">
                                        
                                        About these Terms

We may modify these terms or any additional terms that apply to a Service to, for example, reflect changes to the law or changes to our Services. You should look at the terms regularly. We’ll post notice of modifications to these terms on this page. We’ll post notice of modified additional terms in the applicable Service. Changes will not apply retroactively and will become effective no sooner than fourteen days after they are posted. However, changes addressing new functions for a Service or changes made for legal reasons will be effective immediately. If you do not agree to the modified terms for a Service, you should discontinue your use of that Service.

If there is a conflict between these terms and the additional terms, the additional terms will control for that conflict.

These terms control the relationship between Google and you. They do not create any third party beneficiary rights.

If you do not comply with these terms, and we don’t take action right away, this doesn’t mean that we are giving up any rights that we may have (such as taking action in the future).

If it turns out that a particular term is not enforceable, this will not affect any other terms.

The laws of California, U.S.A., excluding California’s conflict of laws rules, will apply to any disputes arising out of or relating to these terms or the Services. All claims arising out of or relating to these terms or the Services will be litigated exclusively in the federal or state courts of Santa Clara County, California, USA, and you and Google consent to personal jurisdiction in those courts.
                                        
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <i>You agree to thease terms when creating an account.</i>
                                    </div>
                                    </div>
                                </div>
                                </div>


                             
                             
                             
                             <?php 
                             include('includes/footer.php');
                             ?>
                             
                                     
                                     
                                     </div>
                                 </div>
                         
                         
             
    </body>
</html>