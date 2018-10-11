<?php
  $backgroundImage = "img/sea.jpg";
  
  if (isset($_GET['keyword']))
  {
    include 'api/pixabayAPI.php';
    $keyword = $_GET['keyword'];
    $imageURLs = getImageURLs($keyword);
    $backgroundImage = $imageURLs[array_rand($imageURLs)];
  }
?>
<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title>Image Carousel</title>
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel= "styles">
    
    <style>
      @import url("css/styles.css");
      body 
      {
        background-image: url('<?=$backgroudImage ?>');
      }
    </style>
    
  </head>
  <body>
  <br>
  <?php
  
      if(!isset($imageURLs))
      {
        echo "<h2> Type a keyword to display a slideshow <br /> with random images from Pixabay.com </h2>";
      }
        else 
        {
  ?>
  
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <?php
          for ($i = 0; $i < 7; $i++)
          {
            echo "<li data-target= '#carousel-example-generic' data-slide-to='$i'";
            echo ($i == 0) ? "class='active'":"";
            echo"></li>";
          }
      ?>
    </ol>
    </div>
  <div class=" carousel-inner" role="listbox">
    <?php
          for ($i = 0; $i < 7; $i++)
          {
            do
            {
              $randomIndex = rand(0, count($imageURLs));
            }
            while(!isset($imageURLs[$randomIndex]));
            echo '<div class="item';
            echo '">';
            echo ($i == 0) ? "active" : "";
            echo '<img src="' . $imgURLs[$randomIndex] . '"';
            unset($imageURLs[$randomIndex]);
          }
        
  
  ?>
  </div>
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide= "prev">
    <span class="glyphican glyphican-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <div>
    <?php
        }
    ?>
  </div>
  
  <form>
      <input type="text" name="keyword" placeholder="keyword" value="<?=$_GET['keyword']?>"/>
      <input type="radio" id="lhorizontal" name="layout" value="horizontal">
      <label type="Horizontal"></label><label for="lhorizontal"> Horizontal</label>
      <input type="radio" id="lvertical" name="layout" value="vertical">
      <label type="Vertical"></label><label for="lvertical"> Vertical</label>
      <select name="category">
        <option value="">Select One</option>
        <option value="">Ocean</option>
        <option>Forest</option>
        <option>Mountain</option>
        <option>Snow</option>
      </select>
      <input type="submit" value="Search"/> 
  </form>
  
  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  
  </body>
</html>