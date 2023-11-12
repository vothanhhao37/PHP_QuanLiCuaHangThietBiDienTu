
<?php
    $n = rand(1,100);
    echo "<br> các số chẵn < $n là: ";
    for ($i = 0; $i < $n; $i++)
        if($i % 2 == 0)
            echo "$i";
            
?>
