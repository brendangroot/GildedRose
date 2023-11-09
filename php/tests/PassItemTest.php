<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class PassItemTest extends TestCase
{
    public function testSellInAndQualityTenDaysOrMore(): void
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 20, 1)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        $this->assertEquals(19, $items[0]->sellIn);
        $this->assertEquals(2, $items[0]->quality);
    }

    public function testSellInAndQualityTenDaysOrLess(): void
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 10, 1)];
        $gildedRose = new GildedRose($items);   
        $gildedRose->updateQuality();

        $this->assertEquals(9, $items[0]->sellIn);
        $this->assertEquals(3, $items[0]->quality);
    }

    public function testSellInAndQualityFiveDaysOrLess(): void
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 5, 1)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        $this->assertEquals(4, $items[0]->sellIn);
        $this->assertEquals(4, $items[0]->quality);
    }

    public function testQualityZeroDays(): void
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 0, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $gildedRose->updateQuality();

        $this->assertEquals(-2, $items[0]->sellIn);
        $this->assertEquals(0, $items[0]->quality);
    }

    public function testQualityNotExceedingMax(): void
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 1, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        $this->assertEquals(0, $items[0]->sellIn);
        $this->assertEquals(50, $items[0]->quality);
    }
}
