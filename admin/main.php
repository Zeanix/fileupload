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
         
       
       
                       <?php
        
        if(isset($_GET['updated'])){
            echo '<div class="alert alert-success" role="alert"><center>';
            echo $_GET['updated'];
            echo '</center></div>';
        }

            ?>
       
       
        
        <?php 

            
            
        
        
        if(isset($_POST['upload']))
        {
           
                    $fkid = $_SESSION['bruger_id'];
                    $freespace = "SELECT SUM(file_size) AS totalsize FROM files WHERE fk_user_id = '$fkid'";
                    $resultspace = mysqli_query($conn, $freespace);
                    $row1 = mysqli_fetch_assoc($resultspace);
                        
                        
                    $spaceleft = 12000000 - $row1['totalsize']; 
        
        
        
        if(($row1['totalsize']) < 12000000)
        {
        
            
            
            $fil = $_FILES['file'];
            
            
            if($fil['error'] == 0 )
            {
                
                $file_name = $_FILES['file']['name'];
                $file_size = $_FILES['file']['size'];
                $file_type = $_FILES['file']['type'];
                $file_note = $_POST['note'];
                $fkid = $_SESSION['bruger_id'];
                
                $sti = "img/" . $file_name;
                
                $move_result = move_uploaded_file($fil['tmp_name'], $sti);
                
                if($move_result == true)
                {
                    
                    $sql = "INSERT INTO files VALUES('', '$file_name', '$file_size', '$file_type', '$fkid', now(), '$file_note')";
                    
                    $insert_file = mysqli_query($conn, $sql);
                    
                }
                else {
                    echo 'Error! the file was not uploaded correctly!';
                }
                
            }
            else 
            {
                echo 'Error! the file was not uploaded correctly!';
            }
            
        }
               else
       {
           
           echo 'You have not enough free space left!';
           
       }
       }

        
        ?>
        

        
        
                <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Upload new file</h4>
            </div>
            <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data" class="dropzone" id="my-awesome-dropzone">
                    <input type="file" name="file">
                    <br>
                    <input type="text" name="note" placeholder="Optional note to the file">
                    <br><br/>
                    <button name="upload">Upload</button>
                    </form>
                    
                   
                    
            </div>
            <div class="modal-footer">
                <p><i>terms and conditions apply</i></p>
            </div>
            </div>

        </div>
        </div>
        

        <div class="container-fluid">
            <div class="row">
                
                <div class="col-md-1 sidebar hidden-sm hidden-xs" id="toggle">
                    
                    <ul class="nav nav-pills nav-stacked">
                        <br>
                        <div class="col-md-12">
                <button class="btn btn-grey" data-toggle="modal" data-target="#myModal"><li class="" style="font-size:1.5em"><span class="glyphicon glyphicon-plus"></span> Add File</li></button>
                <hr>
                Selected Action
                <form action="" method="get">
                <button class="btn btn-grey" name="delete"><li class="sidemenu"><span class="glyphicon glyphicon-trash"></span> Delete</li></button><br />
                <!--<button class="btn btn-grey" name="download"><li class="sidemenu"><span class="glyphicon glyphicon-download-alt"></span> Download</li></button>-->
                <p class="freespace">
                    <?php 
                    $fkid = $_SESSION['bruger_id'];
                    $freespace = "SELECT SUM(file_size) AS totalsize FROM files WHERE fk_user_id = '$fkid'";
                    $resultspace = mysqli_query($conn, $freespace);
                    $row1 = mysqli_fetch_assoc($resultspace);
                        
                        
                        
                        echo formatSizeUnits($row1['totalsize']) . ' Used<br />';
                        $spaceleft = 12000000 - $row1['totalsize']; 
                        echo formatSizeUnits($spaceleft) . ' Free<br />';
                    ?>
                    
                    </p>
                </div>
                </ul>
                    
                    </div>
                    
                    <div class="col-md-9 col-md-offset-1">
                        <br><br><br>
                        
                        
                          <table class="table" id="file">
    <thead>
      <tr>
        <th></th>
        <th></th>
        <th>File Name</th>
        <th>File Size</th>
        <th>Type</th>
        <th>Last Updated</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        
        <!--############################# Multiple action ########################################-->


                            <?php 
              /*error_reporting(0);*/
              if(isset($_GET['delete']))
              {
                  
                  $multiple = $_GET['checkbox'];
                  

                  $sql = "DELETE FROM files";
                  
                  if(!empty($multiple))
                  {
                  
                  foreach($multiple as $item_id)
                  {
                      
                  mysqli_query($conn, "DELETE FROM files WHERE file_id = $item_id");

                      
                  }
                  header("location: main.php");
                  }
                  else
                  {
                         $error_del = "<strong>Warning!</strong> No files were selected";
                         echo '<div class="alert alert-warning" role="alert">';
                         echo $error_del;
                         echo '</div>';
                      
                  }
                    

                  
              }
              
              
/*              if(isset($_GET['download']))
              {
                  
                  $multidownload = $_GET['checkbox'];
                  
                  if(!empty($multidownload))
                  {
                      
                      foreach($multidownload as $file_item)
                      {
                          
                          echo '<pre' . $file_item . '</pre>';
                          
                      }
                      
                  }
                  
                  
              }*/
              

              ?>
        
                <?php 
        $fkid = $_SESSION['bruger_id'];
        $sqlfiles = "SELECT * FROM files WHERE fk_user_id = '$fkid'";
        $filesresult = mysqli_query($conn, $sqlfiles);
        while($row = mysqli_fetch_assoc($filesresult))
        {
        $filetype = $row['file_type'];
        ?>
      <tr class="showitem">
          <td>
              <input name="checkbox[]" type="checkbox" value="<?php echo $row['file_id']; ?>">
              </td>
                  
<script>
    
     $(".showitem").click(function(){
   $('#showitem').modal('show');
 });
    
    </script>

                  
              
          <?php 
          /*######################################## Fil type image #########################################*/
          
        if (strpos($filetype, 'image') !== false)
        {
            echo ' <td><span class="glyphicon glyphicon-picture"></span></td>';
        }
        if (strpos($filetype, 'audio') !== false)
        {
            echo ' <td><span class="glyphicon glyphicon-music"></span></td>';
        }
                if (strpos($filetype, 'application') !== false)
        {
            echo ' <td><span class="glyphicon glyphicon-file"></span></td>';
        }
                        if (strpos($filetype, 'video') !== false)
        {
            echo ' <td><span class="glyphicon glyphicon-film"></span></td>';
        }
                                if (strpos($filetype, 'text') !== false)
        {
            echo ' <td><span class="glyphicon glyphicon-text-color"></span></td>';
        }
        
        
          ?>
        <td><a href="img/<?php echo $row['file_name']; ?>"><?php echo $row['file_name']; ?></a></td>
        <td><?php echo formatSizeUnits($row['file_size']); ?></td>
        <td><?php 
        
        /*######################################## Fil type beskrivelse #########################################*/


        if (strpos($filetype, 'image') !== false)
        {
            echo 'image';
        }
        if (strpos($filetype, 'audio') !== false)
        {
            echo 'audio';
        }
              if (strpos($filetype, 'video') !== false)
        {
            echo 'Video';
        }
                      if (strpos($filetype, 'application') !== false)
        {
            echo 'application';
        }
                              if (strpos($filetype, 'text') !== false)
        {
            echo 'Document';
        }

        ?></td></a>
        <td><?php echo $row['upload_date']; ?></td>
        <td><a href="img/<?php echo $row['file_name']; ?>" download class="btn btn-blue btn-xs">Download</a>
        <a href="delete_file.php?file_id=<?php echo $row['file_id']; ?>"<button onclick="return deleletconfig()" class="btn btn-blue btn-xs">Delete</button></a></td>
        
                                      <script>
                                      function deleletconfig(){
                                                                            
                                      var del=confirm('Are you sure you want to delete the file? This action cannot be undone!');
                                      if (del==true){
                                        
                                        alert ('The file has been deleted')
                                        
                                      }
                                      return del;
                                      }
                                      </script>
      </tr></a>
      <?php 
        }
      ?>
     </form>

    </tbody>
  </table>

      
      
      	<script type="text/javascript" src="includes\jquery.tablesorter.js"></script> 
	<script type="text/javascript">
		$(document).ready(function() { 
        	$("#file").tablesorter(); 
    	});
	</script>

                        
                        
                        
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