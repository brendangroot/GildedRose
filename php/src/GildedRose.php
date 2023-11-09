<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    const TYPE_BRIE = 'Aged Brie';
    const TYPE_PASS = 'Backstage passes to a TAFKAL80ETC concert';
    const TYPE_LEGENDARY = 'Sulfuras, Hand of Ragnaros';

    /**
     * @param Item[] $items
     */
    public function __construct(
        private array $items
    ) {
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            switch ($item->name) {
                case self::TYPE_BRIE:
                    $steps = BrieItem::getSteps($item);
                    break;
                case self::TYPE_PASS:
                    $steps = PassItem::getSteps($item);
                    break;
                case self::TYPE_LEGENDARY:
                    $steps = LegendaryItem::getSteps($item);
                    break;
                default:
                    $steps = NormalItem::getSteps($item);
                break;
            }
            $item->sellIn += $steps['sellInStep'];
            $item->quality = max(0, $item->quality + $steps['qualityStep']);
        }
    }
}
