<?php

namespace Domain;

abstract class BaseStats
{
    protected const STAT_MIN = 0;
    protected const STAT_MAX = 100;

    protected function clamp(int $value): int
    {
        return max(self::STAT_MIN, min(self::STAT_MAX));
    }
}