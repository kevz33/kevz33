<?php
  include 'api/getPetInfo.php';
  $records = getData();
?>

<!DOCTYPE html>
<html>
    <head>
        <title> CSUMB Pet Shelter: Adoptions </title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        <style>
            body {
                text-align: center;
            }
        </style>
   
    </head>
    <body>
        
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">CSUMB</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="index.php">Home</a>
      <a class="nav-item nav-link" href="pets.php">Adoptions<span class="sr-only">(current)</span></a>
    </div>
  </div>
</nav>
<div id="header"></div>

<img src="img/loading.gif" class="loading" style="display:none;"/>
<div class="modal" tabindex="-1" role="dialog" id="myModal" aria-hiden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php
  for($i=0; $i<count($records); $i++){
    echo '<div class="card" style="width: 50rem; height: 7rem; margin:0 auto;">';
    echo '<div class="card-body">';
    echo '<div style="text-align: left">';
    echo 'Name: <button style="color: blue; border: none; background-color: inherit;" class="adoptButton" value="' . $records[$i]["name"] . '">' . $records[$i]["name"] . '</button>';
    echo '<br>Type: ' . $records[$i]["type"];
    echo '</div>';
    echo '<a class="btn btn-primary" style="float: right; display: block; margin: 0 auto;">Adopt Me!</a>';
    echo '</div>';
    echo '</div>';
  }
?>
        <script>
          $(".adoptButton").click(onButtonClicked);
          
          function onButtonClicked(e){
            
            $(".loading").show();
            var jsonData ={
              "pet": e.target.value
            };
            
            $.ajax({
              url:"api/getPetInfo.php",
              type: "POST",
              dataType: "json",
              contentType: "application/json",
              data: JSON.stringify(jsonData),
              
            })
            .done(function(data){
              //console.log(data);
              $('#myModal').modal('show');
              $('#myModal .modal-title').text(data["data"][0][1]);
              $('#myModal .modal-body').html("<img src='img/" + data["data"][0][6] + "'> <br> Age: " + (2018 - data["data"][0][4]) + " years" + "<br>Breed: " + data["data"][0][3] + "<br>" + data["data"][0][7]);
            })
            .always(function(xhr,status){
              $(".loading").hide();
            });
          }
        </script>
       