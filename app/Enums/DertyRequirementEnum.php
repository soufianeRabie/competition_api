<?php

namespace App\Enums;

enum  DertyRequirementEnum:int
{
    case CAN_EAT_ANYTHING = 0;
    case VEGETARIAN_EGGS_FISH = 1;
    case VEGETARIAN_NO_EGGS_FISH = 2;
    case VEGAN = 3;
    case ALLERGIC = 4;
    case LACTOSE_FREE = 5;
    case GLUTEN_FREE = 6;
    case MEAT = 7;

    public static function getDescription(int $value): string
    {
        return match ($value) {
            self::CAN_EAT_ANYTHING => 'Can Eat Anything',
            self::VEGETARIAN_EGGS_FISH => 'Vegetarian (Eggs/Fish)',
            self::VEGETARIAN_NO_EGGS_FISH => 'Vegetarian (No Eggs/Fish)',
            self::VEGAN => 'Vegan',
            self::ALLERGIC => 'Allergic',
            self::LACTOSE_FREE => 'Lactose-Free',
            self::GLUTEN_FREE => 'Gluten-Free',
            self::MEAT => 'Meat',
            default => 'Unknown',
        };
    }
}
