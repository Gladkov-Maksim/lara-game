<?php

namespace App;

use App\Collection\LevelCollection;
use App\Level\LevelInterface;
use App\Hero;

final class ProcessorGame
{
    private LevelCollection $levelCollection;
    private ?LevelInterface $currentLevel = null;

    private Hero $hero;

    /**
     * Инициализация игры
     */
    public function init()
    {
        $this->hero = new Hero();
        // нужно заполнить коллекцию уровней
        $this->levelCollection = new LevelCollection($this->hero); // Выглядит крайне глупо. Просто не знаю как в уровне по-другому можно получить доступ к герою
        $this->startGame();
    }

    /**
     * Запуск игры
     */
    private function startGame()
    {
        echo "Игра началась!\n";
        $this->changeLevel();
    }

    private function changeLevel()
    {
        if (!$this->levelCollection->getCount()) {
            $this->finishGame();
        }

        if ($this->currentLevel) {
            $this->levelCollection->remove($this->currentLevel);
        }

        $this->currentLevel = $this->levelCollection->first();
        $this->currentLevel->run();
    }

    /**
     * Обработка конца игры
     */
    private function finishGame()
    {
        echo "Игра закончена!\n";
        die();
    }
}
