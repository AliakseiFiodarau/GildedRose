<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    /**
     * Item names string constants.
     */
    const NAME_AGED_BRIE = 'Aged Brie';
    const NAME_BACKSTAGE_PASSES = 'Backstage passes to a TAFKAL80ETC concert';
    const NAME_SULFURAS = 'Sulfuras, Hand of Ragnaros';
    const NAME_CONJURED = 'Conjured';

    /**
     * Min and max quantity values.
     */
    const MAX_QUALITY = 50;
    const MIN_QUALITY = 0;

    /**
     * @param Item[] $items
     */
    public function __construct(
        private array $items
    ) {
    }

    /**
     * @return void
     */
    public function updateQuality(): void {
        foreach ($this->items as $item) {

            $sellIn = &$item->sellIn;
            $quality = &$item->quality;
            $name = $item->name;

            if ($name === self::NAME_SULFURAS) {
                continue;
            }

            $sellIn--;
            $qualityDecreaseRate = $sellIn < 0 ? 2 : 1;

            if ($name === self::NAME_AGED_BRIE) {
                $quality += $qualityDecreaseRate;
                $quality = min($quality, self::MAX_QUALITY);
                continue;
            }

            if ($name === self::NAME_BACKSTAGE_PASSES) {
                switch ($sellIn) {
                    case $sellIn >= 10:
                        $quality++;
                        break;
                    case $sellIn < 10 && $sellIn > 3:
                        $quality += 2;
                        break;
                    case $sellIn <= 3 && $sellIn > 0:
                        $quality += 3;
                        break;
                    case $sellIn < 1:
                        $quality = 0;
                }

                $quality = min($quality, self::MAX_QUALITY);
                continue;
            }

            if ($name === self::NAME_CONJURED) {
                $qualityDecreaseRate *= 2;
            }

            $quality -= $qualityDecreaseRate;
            $quality = max($quality, self::MIN_QUALITY);
        }
    }
}
