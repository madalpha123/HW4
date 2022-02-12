<?php

function determineGuessColors($guessedWord, $wordToGuess)  {
    $guessColors = array('gray','gray','gray','gray','gray');

    for ($i = 0; $i < 5; $i++) {
        if($guessedWord[$i] == $wordToGuess[$i]) {
            $guessColors[$i] = 'green';
        }
    }
    
    for ($i=0; $i < 5; $i++){
        if ($guessColors[$i] != 'green') {
            for ($j = 0; $j < 5; $j++){
                if (($wordToGuess[$i] === $guessedWord[$j]) && ($guessColors[$j] === 'gray')){
                    $guessColors[$j] = 'yellow';
                }
            }
        }
    }
    error_log(print_r($guessColors, True));
    return($guessColors);
}

$wordToGuess = "today";
$guessedWord = $_GET["guess"];
$result = determineGuessColors($guessedWord, $wordToGuess);

$jsonToSend = json_encode($result);
error_log("sending JSON: ". $jsonToSend);
echo $jsonToSend;

?>

