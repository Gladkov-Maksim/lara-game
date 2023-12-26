<?php

use Item\ObstacleTool\ObstacleToolInterface;
use Item\Shield\ShieldInterface;

final class Hero
{
    private int $health;

    private int $power;

    private int $armor;

    private ?ObstacleToolInterface $obstacleTool;

    private ?ShieldInterface $shield;

    public function isAlive(): bool
    {

    }

    public function getDamage(): void
    {

    }

    public function setObstacleTool(ObstacleToolInterface $tool): void
    {

    }

    public function setShield(ShieldInterface $shield): void
    {

    }
}