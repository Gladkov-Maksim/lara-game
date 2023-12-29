<?php

namespace App;

//use Item\ObstacleTool\ObstacleToolInterface;
//use Item\Shield\ShieldInterface;
use App\Monster\Monster;

final class Hero
{
    private int $health = 100;

    private int $power = 20;

    private int $weaponCount = 2;

    private int $armor = 10;

    private int $money = 0;

    /**
     * Геттер для денег
     */
    public function getMoney(): int // Не до конца понимаю зачем нужны геттеры и сеттеры, но здесь это реализовал
    {
        return  $this->money;
    }

    /**
     * Сеттер для денег
     */
    public function setMoney(int $value): void
    {
        if ($value < 0) {
            $this->money = 0;
            return;
        }

        $this->money = $value;
    }

    /**
     * Геттер для оружия
     */
    public function getWeaponCount(): int
    {
        return  $this->weaponCount;
    }

    /**
     * Геттер для здоровья
     */
    public function getHealth(): int
    {
        return  $this->health;
    }


    /**
     * Вывод информации о состоянии героя
     */
    public function showState(): void
    {
        echo "Деньги: {$this->money}, Здоровье: {$this->health}, Оружие: {$this->weaponCount}\n";
    }

    /**
     * Обработка смерти героя
     */
    public function die(): void
    {
        echo "Вы убиты. Игра закончена";
        die();
    }

    /**
     * Обработка атаки героя
     */
    public function attack(Monster $monster): void
    {
        $monster->setHealth($monster->getHealth() - $this->power);
    }

//    private ?ObstacleToolInterface $obstacleTool;
//
//    private ?ShieldInterface $shield;

//    public function isAlive(): bool
//    {
//
//    }

//    public function getDamage(): void
//    {
//
//    }

//    public function setObstacleTool(ObstacleToolInterface $tool): void
//    {
//
//    }

//    public function setShield(ShieldInterface $shield): void
//    {
//
//    }
}
