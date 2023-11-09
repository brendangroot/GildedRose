<?php

declare(strict_types=1);

namespace GildedRose;

class PassItem
{
    static public function getSteps(Item $item): array
    {
        $sellInStep = -1;
        $qualityStep = 1;
        $maxQuality = 50;

        if ($item->sellIn < 11) {
            $qualityStep = 2;
        }
        if ($item->sellIn < 6) {
            $qualityStep = 3;
        }
        if ($item->sellIn <= 0) {
            $qualityStep = -$item->quality;
        }
        if ($item->quality === $maxQuality) {
            $qualityStep = 0;
        }

        return [
            'sellInStep' => $sellInStep,
            'qualityStep' => $qualityStep
        ];
    }
}