<?php

$favorite_fruits = [
    [
        "nom" => "pomme",
        "couleur" => "rouge"
    ],
    [
        "nom" => "banane",
        "couleur" => "jaune"
    ],
    [
        "nom" => "clémentine",
        "couleur" => "orange"
    ]
];

?>

<ul>
    <?php foreach($favorite_fruits as $fruit) :?>
    <li><?php echo $fruit["nom"];?> de couleur <?php echo $fruit["couleur"]; ?> </li> 
    <?php endforeach ?>
</ul>