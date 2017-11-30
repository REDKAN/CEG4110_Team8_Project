<html>
    <head>
		<base href="index.php">
    </head>
    <body>
        <?php
		//read and check the extension of the image 
        function getExtension($str) 
		{
                $s = strrpos($str,".");
                if (!$s) {
                return ""; 
                }
            $t = strlen($str) - $s;
            $ext = substr($str, $s+1, $t);
            return $ext;
        }
        // set no error to 0, error to 1
        $error=0;
		
        // if upload is submitted
        if(isset($_POST['submit'])) 
        {
			 /* Bug 1 - review file cannot be opened.
			 $r_name = $_POST["r_name"];
             $loc = $_POST["loc"];
             $w_review = $_POST["review"];
			 $r_file = "review.txt";
             $fp = fopen($r_file, 'a') or die("Could not open the file");
			 fwrite($fp, $r_name."/".$loc."/".$w_review."\r\n");
			 fclose($fp);
			 */
			$image=$_FILES['image']['name'];
			if($image) 
			{
			
			  $filename = stripslashes($_FILES['image']['name']);
			//get the extension of the file in a lowercase-format
			   $ext = getExtension($filename);
			   $ext = strtolower($ext);
			   
                  
                    // use unix time format as a file name
                    $image_name=time().'.'.$ext;
					// temporary image repository folder //need to remove files after moving to each folders.
					$temp_name = "funcimages/".$image_name;
					$func_imgs = copy($_FILES['image']['tmp_name'], $temp_name);
					// python script here
                    $command = escapeshellcmd('python find_food.py '.$temp_name);
                    $output = shell_exec($command);
                   
					//open the scores file that have a positive or negative value
					$myfile = fopen("scores.txt", 'r');
					$contents = fread($myfile,filesize("scores.txt"));
					fclose($myfile);
					$rename = "";
					//contents >= 0 : food image 
					if ($contents <= 0)
					{
						$rename = "silly_img/".$image_name;
						$nextURL = "/silly.php";
					}   
					//contents < 0 : not food image
					else {
						$rename = "main_img/".$image_name;
						$nextURL = "/";
					}
				   //move the file from tmp folder to the path
                    $moved = move_uploaded_file($_FILES['image']['tmp_name'], $rename);
					
					     if (!$moved) 
                              {
								  echo '<h2>Image file has a problem, Please try again</h2>';
                                  $error=1;
							      header("Refresh: 1;url=write.php");
                              }                   
                        
						 header('Refresh: 2;url='.$nextURL);
                  }
                    }
					  // upload is done and redirect to the main page
                             if(isset($_POST['submit']) && !$error) 
                             {
                                    echo " <p> <font color=red font face='arial' size='15pt'>The image score is $contents</font></p>";
                                       // echo "The image score is ".$contents;
                                //        header("Refresh: 2;url=index.php");
                             }
							 

 ?>
 </body>
 </html>
 