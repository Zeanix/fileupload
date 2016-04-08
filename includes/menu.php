
                                                            <?php 
                                                              session_start();
  ob_start();
                            require 'includes/connect.php';
                             if(isset($_POST['submit']))
                                {
                                    
                                    $brugernavn = $_POST['brugernavn'];
                                    $kodeord = $_POST['kodeord'];
                                    
                                    $loginsql = "SELECT * FROM brugere WHERE bruger_username = '$brugernavn' AND bruger_password = '$kodeord'";
                                    $loginresult = mysqli_query($conn, $loginsql);
                                    if(mysqli_num_rows($loginresult) == 1)
                                    {
                                        $logindata = mysqli_fetch_assoc($loginresult);
                                        
                                        $_SESSION['bruger_username'] = $logindata['bruger_username'];
                                        $_SESSION['bruger_id'] = $logindata['bruger_id'];

                                        
                                        header('location: admin/main.php');
                                        
                                    }
                                    else {
                                        
                                        $login_error = '<div class="alert alert-danger" role="alert"><b>Fejl!</b> du blev ikke logget ind!</div>'; 
                                        
                                    }
                                    
                                }
        
                            
                            ?>
 
  <div class="navbar navbar-blue navbar-top">
            <div class="container navbar-blue navtextcolor">
                <a href="index.php" class="navbar-brand navtextcolor">Super Awesome Fileupload</a>
                
                <div class="navbar-toggle"  data-toggle="collapse" data-target=".navHeaderCollapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                   </div>
                   
                   <div class="collapse navbar-collapse navHeaderCollapse ">
                       <ul class="nav navbar-nav navbar-right ">
                           <li>
                           <a href="index.php" class="navtextcolor" alt="Go to the Home page">Home</a>
                           </li>
                           <li>
                               <a href="support.php" class="navtextcolor" alt="Go to the drivers page">Support</a>
                           </li>
                           <li class="dropdown" id="menuLogin">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" class="navtextcolor" id="navLogin"> <span class="navtextcolor">Login</span></a>
                            <div class="dropdown-menu" style="padding:17px;">
                            <form class="form-horizontal" action="" method="post"> 
                                <input name="brugernavn" class="form-control" type="text" placeholder="Username"> 
                                <br>
                                <input name="kodeord" class="form-control"  type="password" placeholder="Password"><br>
                                <input type="submit" name="submit" class="btn btn-blue" value="Login">
                                </form>

                            </div>
                            
                            
                        </li>
                         </ul>
                        </div>
                       </div>
                       </div>
                       
                       