<?php
session_start();

if(isset($_POST['destroy']))
{
    session_destroy();
    session_start();
}
if (!isset($_SESSION['randomVal']))
{
    $_SESSION['randomVal'] = rand(1,100);
}

$prevGuess = array();




?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Random Number</title>
  </head>
  <body>
      Guess the number between(1,100)<br>
    Random Number:<?php echo $_SESSION['randomVal']?><br>
    Your guess:<textarea id="guess" cols="10" rows="1"></textarea>
    <input type="submit" name="submit">
    <?php
    
    ?>
   <form method="post">
   <input type="submit" name="destroy" value="Start Over">
   </form>
  </body>
</html>