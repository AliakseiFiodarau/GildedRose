<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    private GildedRose $gildedRose;

    protected function setUp(): void {
        $items = [
            new Item('+5 Dexterity Vest', 10, 20),
            new Item('Aged Brie', 2, 0),
            new Item('Elixir of the Mongoose', 5, 7),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', -1, 80),
            new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20),
            new Item('Backstage passes to a TAFKAL80ETC concert', 10, 49),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
            new Item('Conjured Mana Cake', 3, 6),
        ];

        $this->gildedRose = new GildedRose($items);
    }

    public function testUpdateQuality(): void {
        for ($i = 0; $i < 10; $i++) {
            $this->gildedRose->updateQuality();
        }
        $this->assertEqualsCanonicalizing(['+5 Dexterity Vest', 0, 10], json_decode(json_encode($this->gildedRose->items[0]), true));
        $this->assertEqualsCanonicalizing(['Aged Brie', -8, 18], json_decode(json_encode($this->gildedRose->items[1]), true));
        $this->assertEqualsCanonicalizing(['Elixir of the Mongoose', -5, 0], json_decode(json_encode($this->gildedRose->items[2]), true));
        $this->assertEqualsCanonicalizing(['Sulfuras, Hand of Ragnaros', 0, 80], json_decode(json_encode($this->gildedRose->items[3]), true));
        $this->assertEqualsCanonicalizing(['Sulfuras, Hand of Ragnaros', -1, 80], json_decode(json_encode($this->gildedRose->items[4]), true));
        $this->assertEqualsCanonicalizing(['Backstage passes to a TAFKAL80ETC concert', 5, 35], json_decode(json_encode($this->gildedRose->items[5]), true));
        $this->assertEqualsCanonicalizing(['Backstage passes to a TAFKAL80ETC concert', 0, 50], json_decode(json_encode($this->gildedRose->items[6]), true));
        $this->assertEqualsCanonicalizing(['Backstage passes to a TAFKAL80ETC concert', -5, 0], json_decode(json_encode($this->gildedRose->items[7]), true));
        $this->assertEqualsCanonicalizing(['Conjured Mana Cake', -7, 0], json_decode(json_encode($this->gildedRose->items[8]), true));

        for ($i = 0; $i < 10; $i++) {
            $this->gildedRose->updateQuality();
        }
        $this->assertEqualsCanonicalizing(['+5 Dexterity Vest', -10, 0], json_decode(json_encode($this->gildedRose->items[0]), true));
        $this->assertEqualsCanonicalizing(['Aged Brie', -18, 38], json_decode(json_encode($this->gildedRose->items[1]), true));
        $this->assertEqualsCanonicalizing(['Elixir of the Mongoose', -15, 0], json_decode(json_encode($this->gildedRose->items[2]), true));
        $this->assertEqualsCanonicalizing(['Sulfuras, Hand of Ragnaros', 0, 80], json_decode(json_encode($this->gildedRose->items[3]), true));
        $this->assertEqualsCanonicalizing(['Sulfuras, Hand of Ragnaros', -1, 80], json_decode(json_encode($this->gildedRose->items[4]), true));
        $this->assertEqualsCanonicalizing(['Backstage passes to a TAFKAL80ETC concert', -5, 0], json_decode(json_encode($this->gildedRose->items[5]), true));
        $this->assertEqualsCanonicalizing(['Backstage passes to a TAFKAL80ETC concert', -10, 0], json_decode(json_encode($this->gildedRose->items[6]), true));
        $this->assertEqualsCanonicalizing(['Backstage passes to a TAFKAL80ETC concert', -15, 0], json_decode(json_encode($this->gildedRose->items[7]), true));
        $this->assertEqualsCanonicalizing(['Conjured Mana Cake', -17, 0], json_decode(json_encode($this->gildedRose->items[8]), true));

        for ($i = 0; $i < 10; $i++) {
            $this->gildedRose->updateQuality();
        }
        $this->assertEqualsCanonicalizing(['+5 Dexterity Vest', -20, 0], json_decode(json_encode($this->gildedRose->items[0]), true));
        $this->assertEqualsCanonicalizing(['Aged Brie', -28, 50], json_decode(json_encode($this->gildedRose->items[1]), true));
        $this->assertEqualsCanonicalizing(['Elixir of the Mongoose', -25, 0], json_decode(json_encode($this->gildedRose->items[2]), true));
        $this->assertEqualsCanonicalizing(['Sulfuras, Hand of Ragnaros', 0, 80], json_decode(json_encode($this->gildedRose->items[3]), true));
        $this->assertEqualsCanonicalizing(['Sulfuras, Hand of Ragnaros', -1, 80], json_decode(json_encode($this->gildedRose->items[4]), true));
        $this->assertEqualsCanonicalizing(['Backstage passes to a TAFKAL80ETC concert', -15, 0], json_decode(json_encode($this->gildedRose->items[5]), true));
        $this->assertEqualsCanonicalizing(['Backstage passes to a TAFKAL80ETC concert', -20, 0], json_decode(json_encode($this->gildedRose->items[6]), true));
        $this->assertEqualsCanonicalizing(['Backstage passes to a TAFKAL80ETC concert', -25, 0], json_decode(json_encode($this->gildedRose->items[7]), true));
        $this->assertEqualsCanonicalizing(['Conjured Mana Cake', -27, 0], json_decode(json_encode($this->gildedRose->items[8]), true));
    }
}
