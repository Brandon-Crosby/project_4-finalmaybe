<?php
 class Game
 {

private $phrase;
private $lives = 5;
//$stdin = fopen('php://stdin', 'r');

public function __construct($phrase)
{
$this->phrase= $phrase;
}

public function displayKeyboard()
{
$output = " ";
    $output .= "<form method='post' action='play.php'>";
    $output .= "<div id='qwerty' class='section'>";
    $output .= "<div class='keyrow'>";
    $output .= $this->key('q');
    $output .= $this->key('w');
    $output .= $this->key('e');
    $output .= $this->key('r');
    $output .= $this->key('t');
    $output .= $this->key('y');
    $output .= $this->key('u');
    $output .= $this->key('i');
    $output .= $this->key('o');
    $output .= $this->key('p');

    $output .= "</div>";
    $output .= "<div class='keyrow'>";
    $output .= $this->key('a');
    $output .= $this->key('s');
    $output .= $this->key('d');
    $output .= $this->key('f');
    $output .= $this->key('g');
    $output .= $this->key('h');
    $output .= $this->key('j');
    $output .= $this->key('k');
    $output .= $this->key('l');

    $output .= "</div>";
    $output .= "<div class='keyrow'>";
    $output .= $this->key('z');
    $output .= $this->key('x');
    $output .= $this->key('c');
    $output .= $this->key('v');
    $output .= $this->key('b');
    $output .= $this->key('n');
    $output .= $this->key('m');
    $output .= "</div>";
    $output .= "</div>";
    $output .= "</form>";
    return $output;
}
/*
public function displayKeyboard2()
{
$this->html = '';
    $this->html .= "<form method='post' action='play.php'>";
    $this->html .= '<div id="qwerty" class="section">';
    $this->html .= '<div id="qwerty" class="section">';
    $this->html .= '<div class="keyrow">';
    $this->html .= '<button name= "key" value= class="key">q</button>';
    $this->html .= '<button name="key" value="w" class="key">w</button>';
    $this->html .= '<button name="key" value="e" class="key">e</button>';
    $this->html .= '<button name="key" value="r" class="key">r</button>';
    $this->html .= '<button name="key" value="t" class="key" style="background-color: red" disabled>t</button>';
    $this->html .= '<button name="key" value="y" class="key">y</button>';
    $this->html .= '<button name="key" value="u" class="key">u</button>';
    $this->html .= '<button name="key" value="i" class="key">i</button>';
    $this->html .= '<button name="key" value="o" class="key">o</button>';
    $this->html .= '<button name="key" value="p" class="key">p</button>';
    $this->html .= '</div>';

    $this->html .= '<div class="keyrow">';
    $this->html .= '<button name="key" value="a" class="key">a</button>';
    $this->html .= '<button name="key" value="s" class="key">s</button>';
    $this->html .= '<button name="key" value="d" class="key">d</button>';
    $this->html .= '<button name="key" value="f" class="key">f</button>';
    $this->html .= '<button name="key" value="g" class="key">g</button>';
    $this->html .= '<button name="key" value="h" class="key">h</button>';
    $this->html .= '<button name="key" value="j" class="key">j</button>';
    $this->html .= '<button name="key" value="k" class="key">k</button>';
    $this->html .= '<button name="key" value="l"  class="key">l</button>';
    $this->html .= '</div>';

    $this->html  .= '<div class="keyrow">';
    $this->html  .= '<button name="key" value="z" class="key">z</button>';
    $this->html  .= '<button name="key" value="x" class="key">x</button>';
    $this->html  .= '<button name="key" value="c" class="key">c</button>';
    $this->html  .= '<button name="key" value="v" class="key">v</button>';
    $this->html  .= '<button name="key" value="b" class="key">b</button>';
    $this->html  .= '<button name="key" value="n" class="key">n</button>';
    $this->html  .= '<button name="key" value="m" class="key">m</button>';
    $this->html  .='</div></div></form>';
    return $this->html ;
}*/

public function key($letter)
    {
      if (!in_array($letter, $this->phrase->selected)) {
            return "<input id='". $letter ."'type ='submit'  name='key' value='". $letter ."' class='key'>" ;
        } else {
          if ($this->phrase->checkLetter($letter)) {
          return "<input id='". $letter ."'type ='submit' name='key' value='". $letter ."' class ='key correct' disabled>";
        } else {
          return "<input id='". $letter ."'type ='submit'  name='key' value='". $letter ."' class ='key incorrect' disabled>";
        }
}
    }

public function displayScore()
{
    $output = '';
    $output .= '<div id="scoreboard" class="section">';
    $output  .=  '<ol>';
    for ($i=1; $i <= $this->phrase->numberLost(); $i++) {
            $output .= '<li class="tries"><img src="images/lostHeart.png" height="35px" width="30px"></li>';
        }
        for ($i = 1; $i <= ($this->lives - $this->phrase->numberLost()); $i++) {
          $output .=      '<li class="tries"><img src="images/liveHeart.png" height="35px" widght="30px"></li>';
        }
    $output   .=  '</ol>';
    $output .= '</div>';
    return $output;
}

public function checkForLose()
  {
    if ($this->phrase->numberLost() == $this->lives) {
        return true;
    } else {
        return false;
        }
    }

public function checkForWin()
      {
        if (count(array_intersect($this->phrase->selected, $this->phrase->getLetterArray())) == count($this->phrase->getLetterArray())) {
            return true;
        } else {
            return false;
            }
        }
public function gameOver()
{
    if ($this->checkForLose() == true){
      echo '<div id="overlay" class="main-container lose">';
      echo '<h1 id="game-over-message">The phrase was: "'.  $this->phrase->currentPhrase . '". <br>Better luck next time!</br></h1>';
      echo "<form action='play.php' method='POST'>";
      echo "<input id='btn__reset' name='start' type='submit' value='Try Again?' />";
      echo "</form>";
    }elseif ($this->checkForWin() == true){
      echo '<div id="overlay" class="main-container win">';
      echo '<h1 id="game-over-message">Congratulations on guessing: "'.  $this->phrase->currentPhrase . '" .</h1>';
      echo "<form action='play.php' method='POST'>";
      echo "<input id='btn__reset' name='start' type='submit' value='Try Again?' />";
      echo "</form>";
      echo '</div id="overlay" class="main-container">';
    }
  }


}


//$phrase =;
?>
