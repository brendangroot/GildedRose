<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class NormalItemTest extends TestCase
{
    public function testSellInAndQuality(): void
    {
        $items = [new Item('Normal Item', 1, 1)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        $this->assertEquals(0, $items[0]->sellIn);
        $this->assertEquals(0, $items[0]->quality);
    }

    public function testQualityNotNegative(): void
    {
        $items = [new Item('Normal Item', 1, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        $this->assertEquals(0, $items[0]->sellIn);
        $this->assertEquals(0, $items[0]->quality);
    }

    public function testQualityDegradesDoublyAfterSellInPassed(): void
    {
        $items = [new Item('Normal Item', 0, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        $this->assertEquals(-1, $items[0]->sellIn);
        $this->assertEquals(8, $items[0]->quality);
    }
}
