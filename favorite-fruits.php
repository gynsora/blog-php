<?php

$favorite_fruits = ["pomme", "poire", "banane", "orange", "raisin"];

?>

<ul>
    <?php
        /*
        foreach($favorite_fruits as $fruits){
            echo "<li>" .$fruits . "</li>";
    }
    */
    ?>


    <?php foreach($favorite_fruits as $fruit) : ?>
        
        <li><?php echo $fruit; ?></li>

    <?php endforeach; ?>
</ul>
