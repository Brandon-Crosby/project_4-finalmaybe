<?php
session_start();
if ($_POST['start']) {
   unset($_SESSION['selected']);
   unset($_SESSION['phrase']);
}
include "inc/Game.php";
include "inc/Phrase.php";


//$_SESSION[selected]=array();
if (isset($_SESSION['selected']) && isset($_POST['key'])) {
    $_SESSION['selected'][] = $_POST['key'];
} else {
    $_SESSION['selected'] = [];
}
//$_SESSION['phrase'] = 'start small';
//var_dump($game);

$phrase = new Phrase($_SESSION['phrase'], $_SESSION['selected']);

$_SESSION['phrase'] = $phrase->currentPhrase;
$game = new Game($phrase);
//echo $phrase->currentPhrase;
//$phrase->numberLost();
//var_dump($_SESSION);
//while
//session_destroy();

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <title>Phrase Hunter</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="css/styles.css" rel="stylesheet">
   <link href="css/animate.css" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>

<body>
<div class="main-container">
   <div id="banner" class="section">
       <h2 class="header">Phrase Hunter</h2>
  <!--      <h1 class="header">(night mode)</h1>  -->
   </div>
<!--   <form method= 'POST' action='play.php'> -->

<?php

    // var_dump($_SESSION);
     echo $phrase->addPhraseToDisplay();
     echo $game->displayKeyboard();
     echo $game->displayScore();
     echo $game->gameOver();



     //var_dump($_POST);
     //var_dump($phrase->checkLetter('l'));
     ?>
<!--</form>-->

<?php


//include "myfunctions/functions.php";


//$phrase = new Phrase();
//$game = new Game();

//var_dump($phrase);
//var_dump($game);

//echo $phrase->addPhraseToDisplay();

//echo $phrase->addPhraseToDisplay();
//echo $game->displayKeyboard();
//echo $game->displayScore();

//var_dump($_GET);

//$char=read_stdin();
//echo $char;

//var_dump($_GET);
//var_dump($_POST);
//$_SESSION['phrase'] = 'start small';
//var_dump($_SESSION);
//var_dump($game);
?>
