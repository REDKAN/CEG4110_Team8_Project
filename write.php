<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Food_Reviewer</title>
        <link rel="stylesheet" href='/css/normalize.css'> 
        <link rel="stylesheet" href='/css/main.css'> 
    </head>
 <body>
        <div class="container">
            <header>
            <h1>Bon Appetit</h1>
            </header>
            <nav>
  <ul>
      <li><a href="index.php">Main Page</a></li><br>
      <li><a href="silly.php">Silly</a></li>
  </ul>
</nav>
<form action="upload.php" method="post" autocomplete="on" enctype="multipart/form-data">
<table>
 	<tr><td><input type="file" name="image"></td></tr>
 	<tr><td><input name="submit" type="submit" value="Upload image">
       </td></tr>
 </table>	
 </form>