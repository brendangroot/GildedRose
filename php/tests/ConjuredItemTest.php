<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class ConjuredItemTest extends TestCase
{
    public function testSellInAndQuality(): void
    {
        $items = [new Item('Conjured Mana Cake', 1, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        $this->assertEquals(0, $items[0]->sellIn);
        $this->assertEquals(8, $items[0]->quality);
    }

    public function testQualityNotNegative(): void
    {
        $items = [new Item('Conjured Mana Cake', 0, 1)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        $this->assertEquals(-1, $items[0]->sellIn);
        $this->assertEquals(0, $items[0]->quality);
    }

    public function testQualityDegradesDoublyAfterSellInPassed(): void
    {
        $items = [new Item('Conjured Mana Cake', 0, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        $this->assertEquals(-1, $items[0]->sellIn);
        $this->assertEquals(6, $items[0]->quality);
    }
}
