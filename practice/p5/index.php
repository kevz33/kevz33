<?php
  session_start();
  $_POST["numPasswords"];
  $_POST["lenght"];
  
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Password Generator</title>
    <link href="./styles.css" rel="stylesheet">
  </head>
  <body>
  
  <div class="rectangle">
      <h1> Custom Password Generator </h1>
      How many passwords? <input = "number" name="numPasswords" size="2"> (No more than 8)
      
      <?php
        $size = 0;
        for($i=0; $i < $_POST["numPasswords"]; $i++)
        {
          if ($_POST["numPasswords"]>8)
          {
            echo "ERROR number of passwords cannot exceed 8";
            break;
          }
          $size++;
          
        }
        $numOfPasswords = array($size);
      ?>
      
      <h2><strong>Password Length</strong></h2>
      
      <input type="radio" name="length" id="item1" value="6"> 
        <label for="item1">6 characters</label>
      <input type="radio" name="length" id="item2" value="8"> 
        <label for="item2">8 characters</label>
      <input type="radio" name="length" id="item3" value="10"> 
        <label for="item3">10 characters</label>
        
      
      <br> </br>
      <input type="checkbox" name="digits" value="1"> Include digits (up to 3 digits will be part of the password)
      <br> </br>
      
      <?php
            if( $_POST['value'] == '6')
            {
              if(isset($_POST['digits']))
              {
                chr(rand(65,91));
              }
              else
              {
                
              }
            }
            else if($_POST['value'] == '8')
            {
              if(isset($_POST['digits']))
              {
                
              }
              else
              {
                
              }
            }
            else if($_POST['value'] == '10')
            {
              if(isset($_POST['digits']))
              {
                
              }
              else
              {
                
              }
            }
        ?>
      
      <input type="submit" value="Create Password!">
      <br> <br> 
      <input type="submit" value="Display Password History">
 </div>
 
  </body>
</html>