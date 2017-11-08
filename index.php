<?php
session_start();
/*session_start();
if (isset($_SESSION['upload_success'])) {
 }
 * 
 */
include('func/display.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Food_Reviewer</title>
        <link rel="stylesheet" href="http://localhost/CEG4110_Project/css/normalize.css"> 
        <link rel="stylesheet" href="http://localhost/CEG4110_Project/css/main.css"> 
        <base href="http://localhost/CEG4110_Project/index.php">
     </head>
 <body>
        <div class="container">
            <header>
            <h1>Food Review</h1>
            </header>
            <nav>
  <ul>
      <li><a href="func/write.php">Upload an image</a></li><br>
      <li><a href="silly.php">Silly</a></li>
  </ul>
</nav>
 
  <?php
  $files = glob("funcimages/*.*");
  //display images as descending order
  rsort($files);
 //call display function to display images
  display_items($files);      
  ?>
            
<footer>Copyright &copy; CEG4110_Team8</footer>

        </div>
    </body>
    </html>
