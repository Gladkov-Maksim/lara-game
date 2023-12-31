<?php

namespace App\Monster;

use App\Hero;

class Monster implements MonsterInterface
{
    private int $health;
    private int $power;
    private string $welcomePhrase = "Привет, я монстр. Тебе ...!\n";

    public function __construct(string $difficultyLevel)
    {
        switch ($difficultyLevel) {
            case 'easy':
                $this->health = 200;
                $this->power = 40;
                break;
            case 'medium':
                $this->health = 50;
                $this->power = 20;
                break;
            case 'hard':
                $this->health = 80;
                $this->power = 30;
                break;
        }
    }

    /**
     * Геттер здоровья монстра
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * Сеттер здоровья монстра
     */
    public function setHealth(int $value): void
    {
        if ($value < 0) {
            $this->health = 0;
            return;
        }

        $this->health = $value;
    }

    /**
     * Получение приветственной фразы монстра
     */
    public function getWelcomePhrase(): string
    {
        return $this->welcomePhrase;
    }

    /**
     * Обработка атаки монстра
     */
    public function attack(Hero $hero): void
    {
        $hero->setHealth($hero->getHealth() - $this->power);
    }

    /**
     * Обработка смерти монстра
     */
    public function die(): void
    {
        echo 'ахррррр' . "\n"; // Далее необходимо сделать ее рандомной из таблицы, как и приветствие
        echo "Монстр повержен";
    }
}
