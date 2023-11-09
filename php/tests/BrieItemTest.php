<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class BrieItemTest extends TestCase
{
    public function testSellInAndQuality(): void
    {
        $items = [new Item('Aged Brie', 1, 1)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        $this->assertEquals(0, $items[0]->sellIn);
        $this->assertEquals(2, $items[0]->quality);
    }

    public function testQualityDoubleIncrease(): void
    {
        $items = [new Item('Aged Brie', 0, 1)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        $this->assertEquals(-1, $items[0]->sellIn);
        $this->assertEquals(3, $items[0]->quality);
    }

    public function testQualityNotExceedingMax(): void
    {
        $items = [new Item('Aged Brie', 1, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        $this->assertEquals(0, $items[0]->sellIn);
        $this->assertEquals(50, $items[0]->quality);
    }
}
