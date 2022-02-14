<?php

namespace App\Tests\Core;

use App\Core\Card;
use App\Core\CardGame;
use PHPUnit\Framework\TestCase;

class CardGameTest extends TestCase
{

  public function testToString2Cards()
  {
    $jeudecarte = new CardGame([new Card('As', 'Pique'), new Card('Roi', 'Coeur')]);
    $this->assertEquals('CardGame : 2 carte(s)',$jeudecarte->__toString());
  }

  public function testToString1Card()
  {
    $jeudecarte = new CardGame([new Card('As', 'Pique')]);
    $this->assertEquals('CardGame : 1 carte(s)',$jeudecarte->__toString());
  }

  public function testCompare()
  {
    $card1 = new Card('4', 'Pique');
    $card2 = new Card('3', 'Coeur');
    $jeudecarte = new CardGame([$card1, $card2]);
    $this->assertEquals(1, $jeudecarte->compare($card1, $card2));
    $this->assertEquals(-1, $jeudecarte->compare($card2, $card1));

  }

  public function testShuffle()
  {
    $card1 = new Card('2', 'Pique');
    $card2 = new Card('3', 'Coeur');
    $card3 = new Card('4', 'Trefle');
    $jeudecarte = new CardGame([$card1, $card2, $card3]);
    $this->assertNotEquals($jeudecarte, $jeudecarte->shuffle());
  }

  public function testGetCard()
  {
    $card1 = new Card('2', 'Pique');
    $card2 = new Card('3', 'Coeur');
    $card3 = new Card('4', 'Trefle');
    $jeudecarte = new CardGame([$card1, $card2, $card3]);
    $this->assertEquals($card2,$jeudecarte->getCard(1));
  }

  public function testFactoryCardGame32()
  {
    $jeu32 = CardGame::factory32Cards();
    $this->assertEquals(32, count($jeu32), 'erreur fonction');
  }

  public function testReOrder()
  {
    $card1 = new Card('2', 'Pique');
    $card2 = new Card('3', 'Coeur');
    $card3 = new Card('4', 'Trefle');
    $jeudecarte = new CardGame([$card1, $card2, $card3]);
    $this->assertNotEquals($jeudecarte, $jeudecarte->reOrder());
  }

}