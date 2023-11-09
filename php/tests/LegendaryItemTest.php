<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class LegendaryItemTest extends TestCase
{
    public function testSellInAndQuality(): void
    {
        $items = [new Item('Sulfuras, Hand of Ragnaros', 1, 80)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        $this->assertEquals(1, $items[0]->sellIn);
        $this->assertEquals(80, $items[0]->quality);
    }
}
