<?php
    session_start();
    
    function order()
    {
        session_destroy();
        if(isset($_POST['Save'])) 
        {
            
            $name = $_POST['name'];
            $pizzas = $_POST['pizzas'];
            $pepperoni = $_POST['pepperoni'];
            $cheese = $_POST['cheese'];
            $combo = $_POST['combo'];
            $selection = $_POST['selection'];
            
            $order = array();
            
            if(isset($_POST['name']))
            {
                echo "Order for " . "$name" . ": ";
                echo "<br> <br>";
            }
            else
            {
                echo "Please enter your name!";
                echo "<br>";
            }
             if($pizzas == 1)
            {
                echo "1";
                echo "<br>";
            }
            else if($pizzas == 2)
            {
                echo "2";
                echo "<br>";
            }
            else if($pizzas == 3)
            {
                echo "3";
                echo "<br>";
            }
            else
            {
                echo "No selection for number of pizzas!";
                echo "<br>";
            }
            if($selection == small)
            {
                echo "Small pizza ";
            }
            else if($selection == medium)
            {
                echo "Medium pizza";
            }
            else if($selection == large)
            {
                echo "Large pizza";
            }
            else 
            {
                 echo "Please enter the size of the meal!";
                 echo "<br>";
            }
            
            
            echo "<br> Pizza Type: <br>";
            
            if(isset($_POST['pepperoni']))
            {
                echo "pepperonies <br>";
            }
            if(isset($_POST['cheese']))
            {
                echo "Cheese <br>";
            }
            if(isset($_POST['combo']))
            {
                echo "combo <br>";
            }
            if(!isset($_POST['pepperoni']) && !isset($_POST['cheese']) && !isset($_POST['combo']))
            {
                echo "Please add at least one ingredient to your order <br>";
            }
            
            
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Castillo's Burger Shop</title>
    </head>
    <link href="styles.css" rel="stylesheet" type="text/css">
    
    <body>
        <div class="container">
            <h1> Pizza Castle</h1>
            <form method="POST">
                <h2>Name:</h2>
                
                <input type="text" id="textstyle" size="12" name="name" value=" <?php echo isset($_POST['name']) ? $_POST['name']: '' ?>" />
                <br>
                
                <h3>Number Of Pizzas</h3>
                <input type="radio" name="pizzas" id="buttons" value="1" <?php if(isset($_POST['pizzas']) && $_POST['pizzas'] == 1) echo ' checked= "checked"'; ?> />
                <label for="buttons">One Pizza</label>
                <input type="radio" name="pizzas" id="buttons" value="2" <?php if(isset($_POST['pizzas']) && $_POST['pizzas'] == 2) echo ' checked= "checked"'; ?> />
                <label for="buttons">Two Pizzas</label>
                <input type="radio" name="pizzas" id="buttons" value="3" <?php if(isset($_POST['pizzas']) && $_POST['pizzas'] == 3) echo ' checked= "checked"'; ?> />
                <label for="buttons">Three Pizzas</label>
                <br>
                
                <h4>Pizza Type:</h4>
                <input type="checkbox" name="pepperoni" value="Pepperoni" <?php if(isset($_POST['pepperoni']) && $_POST['pepperoni'] == 'Pepperoni') echo ' checked= "checked"'; ?> />
                Pepperoni <br>
                <input type="checkbox" name="cheese" value="Cheese" <?php if(isset($_POST['cheese']) && $_POST['cheese'] == 'Cheese') echo ' checked= "checked"'; ?> />
                Cheese <br>
                <input type="checkbox" name="combo" value="Combo" <?php if(isset($_POST['combo']) && $_POST['combo'] == 'combo') echo ' checked= "checked"'; ?> />
                Combo <br>
                
                <h5>What Size?</h5>
                <select name="selection">
                    
                    <option value="small">Small</option>
                    <option value="medium">Medium</option>
                    <option value="large">Large</option>
                    
                </select>
                
                <br> </br>
                <input type="submit" value="Complete Order" name="Save"/>
                <br>
            </form>
        </div>
        
        <div class="order">
            <?php
              order();  
            ?>    
        </div>
    </body>
</html>