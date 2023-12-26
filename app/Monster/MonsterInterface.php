<?php

namespace Monster;

use Enum\MonsterPowerTypeEnum;

interface MonsterInterface
{
    public function getPowerType(): MonsterPowerTypeEnum;

    public function isAlive(): bool;

    public function getDamage(): void;

    public function getGreeting(): string;

    public function getSoundOfPunch(): string;

    public function getDeathRattle(): string;
}