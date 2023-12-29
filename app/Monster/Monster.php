<?php

namespace App\Monster;

class Monster implements MonsterInterface
{
    private int $health;
    private string $welcomePhrase = "Привет, я монстр. Тебе ...!\n";

    public function __construct(string $difficultyLevel)
    {
        switch ($difficultyLevel) {
            case 'easy':
                $this->health = 20;
                break;
            case 'medium':
                $this->health = 50;
                break;
            case 'hard':
                $this->health = 80;
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
     * Обработка смерти монстра
     */
    public function die(): void
    {
        echo 'ахррррр' . "\n"; // Далее необходимо сделать ее рандомной из таблицы, как и приветствие
        echo "Монстр повержен";
    }
}
