<?php

declare(strict_types=1);

namespace GildedRose;

class LegendaryItem
{
    static public function getSteps(Item $item): array
    {
        $sellInStep = 0;
        $qualityStep = 0;

        return [
            'sellInStep' => $sellInStep,
            'qualityStep' => $qualityStep
        ];
    }
}