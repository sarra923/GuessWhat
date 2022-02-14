<?php

namespace App\Tests\Core;

use App\Core\CardGame;
use PHPUnit\Framework\TestCase;
use App\Core\Card;

class CardTest extends TestCase
{

  public function testName()
  {
    $card = new Card('As', 'Trefle');
    $this->assertEquals('As', $card->getName());
    $card = new Card('2', 'Trefle');
    $this->assertEquals('2', $card->getName());

  }

  public function testColor()
  {
    $card = new Card('As', 'Trefle');
    $this->assertEquals('Trefle', $card->getColor());
    $card = new Card('As', 'Pique');
    $this->assertEquals('Pique', $card->getColor());
  }

  public function testCompareSameCard()
  {
    $card1 = new Card('As', 'Trefle');
    $card2 = new Card('As', 'Trefle');
    $this->assertEquals(0, CardGame::compare($card1,$card2));
  }

  public function testCompareSameNameNoSameColor()
  {
      $card1 = new Card('As', 'Trefle');
      $card2 = new Card('As', 'Pique');
      $this->assertEquals(-1, CardGame::compare($card1, $card2));
  }

  public function test CompareNoSameNameSameColor()
  {
      $card1 = new Card('As', 'Trefle');
      $card2 = new Card('2', 'Trefle');
      $this->assertEquals(1, CardGame::compare($card1, $card2));
  }

  public function testCompareNoSameNameNoSameColor()
  {
      $card1 = new Card('As', 'Trefle');
      $card2 = new Card('2', 'Pique');
      $this->assertEquals(1, CardGame::compare($card1, $card2));
  }

  public function testToStringCard(){
    $card = new Card('2', 'Pique');
    $this->assertEquals('2 de Pique', $card->__toString());
  }

}