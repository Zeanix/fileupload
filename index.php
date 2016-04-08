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
     
     
     <!--############################## BESKEDER ######################################-->
     
     
        <?php
        
        if(isset($_GET['Message'])){
            echo '<div class="alert alert-warning" role="alert"><center>';
            echo $_GET['Message'];
            echo '</center></div>';
        }
        if(isset($_GET['loggedout'])){
            echo '<div class="alert alert-success animated fadeIn" role="alert"><center>';
            echo $_GET['loggedout'];
            echo '</center></div>';
        }

        ?>
     
     
     
     <!--############################## BESKEDER ######################################-->
     
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
                    
                    <h1>Get 12 MB for free, sign up now!</h1>
                    
                </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4 col-md-offset-5">
                        <br /><br />
                    <a href="signup.php"><button class="btn btn-blue btn-lg">Sign Up</button></a>
                    <br /><br /><br /><br /><br /><br /><br /><br />
                    </div>
                </div>
               
                           </div> 
                
                <div class="row">
                    <div class="container-fluid bgcoloralt">
                        <div class="container">
                        <div class="col-md-3 col-md-offset-1">
                            
                                <br /><br /><br /><br />
                                <span class="glyphicon glyphicon-hdd glyphsize"></span>
                                <br /><br />
                                <b>12MB storage free!</b>
                                <br /><br /><br /><br />
                                </div><!-- col-md-3 -->
                                
                                <div class="col-md-1">
                                </div>
                            
                                <div class="col-md-3">
                            
                                <br /><br /><br /><br />
                               &nbsp;&nbsp; <span class="glyphicon glyphicon-lock glyphsize"></span>
                                <br /><br />
                                <b>The most secure service!</b>
                                <br /><br /><br /><br />
                                </div><!-- col-md-3 -->
                                
                                <div class="col-md-1">
                                </div>
                            
                                <div class="col-md-3">
                            
                                <br /><br /><br /><br />
                                <span class="glyphicon glyphicon-wrench glyphsize"></span>
                                <br /><br />
                                <b>Great Support!</b>
                                <br /><br /><br /><br />
                            </div><!-- col-md-3 -->
                            
                            </div><!-- container -->    
                        </div><!-- fluid -->
                         </div><!-- row -->
                         
                         <div class="row">
                             <div class="container">
                                 <div class="col-md-5">
                                 <h3>
                                 <br />
                                 • 12 Mb Free Storage
                                 <br />
                                 • Best in class security
                                 <br />
                                 • 99% uptime
                                 <br />
                                 • fast and easy support
                                 <br /> 
                                 • Flexible service, add what you need
                                 <br />
                                 • Easy to use User Interface
                                 </div>
                                 </h3>
                                 
                                 
                                 <div class="col-md-5 pull-right">
                                 <h3>
                                 <br />
                                 • 12 Mb Free Storage
                                 <br />
                                 • Best in class security
                                 <br />
                                 • 99% uptime
                                 <br />
                                 • fast and easy support
                                 <br /> 
                                 • Flexible service, add what you need
                                 <br />
                                 • Easy to use User Interface
                                 <br /><br />
                                 </div>
                                 </h3>
                                 
                                 </div>
                             </div>
                             
                             <?php 
                             include('includes/footer.php');
                             ?>
                             
                                     
                                     
                                     </div>
                                 </div>
                         

              
    
    
    </body>
</html>