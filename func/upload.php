<html>
    <head>
        <base href="http://localhost/CEG4110_Project/index.php">
    </head>
    <body>
        <?php
        //read and check the extension of the image 
        function getExtension($str) {
                $s = strrpos($str,".");
                if (!$s) {
                return ""; 
                }
            $t = strlen($str) - $s;
            $ext = substr($str, $s+1, $t);
             return $ext;
          }
        // set no error to 0, error will be 1
        $error=0;
        // if upload submitted
        if(isset($_POST['submit'])) 
        {
 	//read the name 
 	$image=$_FILES['image']['name'];
 	// not empty
 	if ($image) 
 	{
 	//get the original file name
  	  $filename = stripslashes($_FILES['image']['name']);
 	//get the extension of the file in a lowercase-format
                     $ext = getExtension($filename);
 	   $ext = strtolower($ext);
       //             $size=filesize($_FILES['image']['tmp_name']);

                    /*  python script here
                    $command = escapeshellcmd('http://localhost/CEG4110_Project/python/find_food.py ');
                    $output = shell_exec($command);
                    echo $output;
                    */
                    
                    // use unix time format as a file name
                    $image_name=time().'.'.$ext;
/* This part will be applied on AWS server to find image files of the path                    
//$rename=$_SERVER['DOCUMENT_ROOT']."/CEG4110_Project/funcimages/".$image_name;
*/
                    $rename="../funcimages/".$image_name;
                    //check if upload is succeed or not.
                    $copied = move_uploaded_file($_FILES['image']['tmp_name'], $rename);
                              if (!$copied) 
                              {
                                  echo '<h2>Image file has a problem, Please try again</h2>';
                                  $error=1;
                                  header("Refresh: 1;url=func/write.php/");
                              }                   
                         
                  }
                                 
                    }
                       // upload is done and redirect to the main page
                             if(isset($_POST['submit']) && !$error) 
                             {
                                        echo "<h1> File Uploaded </h1>";
                                        header("Refresh: 1;url=../index.php/");
                            }

 ?>
    </body>
</html>
