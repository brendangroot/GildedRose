<?php

declare(strict_types=1);

namespace GildedRose;

class BrieItem
{
    static public function getSteps(Item $item): array
    {
        $sellInStep = -1;
        $qualityStep = 1;
        $maxQuality = 50;

        if ($item->sellIn <= 0 && $item->quality < $maxQuality - 1) {
            $qualityStep = 2;
        }
        if ($item->quality >= $maxQuality) {
            $qualityStep = 0;
        }

        return [
            'sellInStep' => $sellInStep,
            'qualityStep' => $qualityStep
        ];
    }
}