<?php
session_start();
include('display.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Food_Reviewer</title>
        <link rel="stylesheet" href='/css/normalize.css'> 
        <link rel="stylesheet" href='/css/main.css'> 
        <base href= 'index.php'>
     </head>
 <body>
        <div class="container">
            <header>
            <h1>Food Review</h1>
            </header>
            <nav>
  <ul>
      <li><a href="write.php">Upload an image</a></li><br>
      <li><a href="silly.php">Silly</a></li>
  </ul>
</nav>
 
  <?php
  //read img files food_imgs
  $files = glob("main_img/*.*");
  //display images as descending order
  rsort($files);
 //call display function to display images
  display_items($files);      
  ?>
            
<footer>Copyright &copy; CEG4110_Team8</footer>

        </div>
    </body>
    </html>
