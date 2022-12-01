<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    var_dump($_GET);
    $filteredArr = $hotels;

    if(array_key_exists('radioPark',$_GET)){
        if($_GET['radioPark'] === 'onlyPark'){
            foreach($filteredArr as $key => $hotel){
                if($hotel['parking'] === false){
                    unset($filteredArr[$key]);
                }
            }
        };
    };

    if(array_key_exists('bestRating', $_GET)){
            foreach($filteredArr as $key => $hotel){
                if( intval($hotel['vote']) < 3){
                    unset($filteredArr[$key]);
                }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>PHP Hotel</title>
</head>
<body>

<div class="container">
    <form class="row " action="./index.php" method="GET">
        <div class="col-2">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="radioPark" value="all" checked>
                <label class="form-check-label" for="flexRadioDefault1">
                    Tutti
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="radioPark" value="onlyPark">
                <label class="form-check-label" for="radioOnlyPark">
                    Solo con parcheggio
                </label>
            </div>
        </div>
        <div class="col-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="true" name="bestRating">
                <label class="form-check-label" for="rating">
                    Rating 3+
                </label>
            </div>
        </div>
        <div class="col-2">
            <input class="btn btn-primary" type="submit" value="Submit">
            <input class="btn btn-primary" type="reset" value="Reset">
        </div>
    </form>
    <div class="row">
        <div class="col"></div>
        <table class="table">
            
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Parcheggio</th>
                    <th scope="col">Voti</th>
                    <th scope="col">Distanza dal Centro</th>
                </tr>
            </thead>
            <tbody>
                <?php
                            foreach($filteredArr as $key => $element){
                                $numb = $key+1;
                                echo '<tr>';
                                echo "<th scope=\"row\">$numb</th>";
                                foreach($element as $key => $el){
                                    $toPrint = $el;
                                    if (is_bool($el)){
                                        $toPrint = ($el)?'Si':'No';
                                    }
                                    echo "<td>$toPrint</td>";
                                }
                                echo '</tr>';
                                
                            }
                            ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>