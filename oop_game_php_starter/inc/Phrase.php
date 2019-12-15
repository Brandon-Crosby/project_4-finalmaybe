<?php
 class Phrase
 {

public $currentPhrase;
public $selected = array();
public $phrases =
[
  'Propane and Propane Accessories',
  'Cringe',
  'The adventure begins',
  'Love without limits',
  'I like Pizza',
  'King of The Hill',
  'Ancient English',
  'HANGMAN',
  'Guess the Phrase',
  'The Steve Mod',
  'Five Nights at Freddys',
  'Orchestra Sucks',
  'Theres a Snake in my Boot',
  'To infinity and beyond',
  'Water Boy',
  'If theres Coke theres hope',
  'PIRATES OF THE CARIBBEAN',
  'GavinYeahCreates',
  'YABADABADOO',
  'Taste the rainbow',
  'Sody Pops',
  'Feminism',
  'Absolutely Revolting',
  'Pickles on Pizza is worse than Pineapples on Pizza',
  'Aldis',
  'PEWDIEPIE',
  'Minecraft is The Superior Game',
  'The only things that are culture is Angry Birds and Meat Balls',
  'Pop goes a Weasel',
  'STOP Im only Seven',
  'Sour then Sweet',
  'Doh',
  'Look behind you',
  'Captain Underpants and The Invasion of The Incredibly Naughty Caferteria Ladies from Outer Space And the Subsequent Assault of The Equally Evil Lunchroom Zombie Nerds',
  'Alien Invasion',
  'Harry Potter',
  'Parry Hotter',
  'Gravity Falls',
  'THE MAGIC SCHOOL BUS',
  'PINGU',
  'FBI OPEN UP',
  'Who Moved My Cheese',
  'Made with Smiles and Enriched Wheat Flour',
  'KO',
  'pneumonoultramicroscopicsilicovolcanoconiosis',
  'Supercalifragilisticexpialidocious',
];

public function __construct($phrase=null, $selected= null )
{
    if (!empty($phrase)) {
              $this->currentPhrase = $phrase;
    }
    if (!empty($selected)){
      $this->selected = $selected;
    }
    if (!isset($phrase)) {
        $random = rand(0, 46);
        $this->currentPhrase = $this->phrases[$random];
    }
  }

public function addPhraseToDisplay()
  {
    $characters = str_split(strtolower($this->currentPhrase));
    $output = "<div class='section' id='phrase' >";
    $output .= "<ul>";
    foreach ($characters as $character) {
    if (in_array($character, $this->selected)) {
        $output .= "<li class='show letter'>" . $character . "</li>";
    } else if ($character == " ") {
        $output .= "<li class='space'>" . $character . "</li>";
    } else {
      $output .= "<li class='hide letter'>" . $character . "</li>";
      }

    }
    $output .= "</ul>";
    $output .= "</div>";
    return $output;
    //echo $phrase->addPhraseToDisplay();

  }

  public function getLetterArray() {
      return array_unique(str_split(str_replace(' ', '', strtolower($this->currentPhrase))));
  }

  public function checkLetter($letter)
  {
      if (in_array($letter, $this->getLetterArray())) {
          return true;
      } else {
          return false;
      }
  }

public function numberLost()
{
  return count(array_diff($this->selected, $this->getLetterArray()));
}

}
//$Phrase = new Phrase;

?>
