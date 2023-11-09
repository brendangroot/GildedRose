<?php

declare(strict_types=1);

namespace GildedRose;

class ConjuredItem
{
    static public function getSteps(Item $item): array
    {
        $sellInStep = -1;
        $qualityStep = -2;

        if ($item->sellIn <= 0) {
            $qualityStep = -4;
        }
        if ($item->quality <= 0) {
            $qualityStep = 0;
        }

        return [
            'sellInStep' => $sellInStep,
            'qualityStep' => $qualityStep
        ];
    }
}