<?php
       
        function displayCostume($randomValue, $pos)
        {
       
        switch ($randomValue)
        {
            case 0:  $symbol = "costume1";
            break;
            
            case 1:  $symbol = "costume2";
            break;
           
            case 2: $symbol = "costume3";
            break;
            
            case 3: $symbol = "costume4";
            break;
            
            case 4: $symbol = "costume5";
            break;
            
            case 5: $symbol = "costume6";
            break;
            
        }
        echo "<img id='reel$pos' src='img/$symbol.jpeg' alt='$symbol' title='". ucfirst($symbol). "' width='125'>";
        }
        
        
            
                echo "<h3> Happy Halloween! </h3>";
            
            echo "</div>";
        
            
            function play()
            {
                for ($i=1; $i<4; $i++)
                {
                    ${"randomValue". $i} = rand(0,5);
                    displayCostume(${"randomValue". $i}, $i);
                }
            }
        ?>


