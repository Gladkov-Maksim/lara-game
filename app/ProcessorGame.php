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
        stdoutSlow("Игра началась!\n");
        while ($this->levelCollection->getCount()) {
            $this->currentLevel = $this->levelCollection->first();
            $this->levelCollection->remove($this->currentLevel);
            $this->currentLevel->run();
        }
        $this->finishGame();
    }

    /**
     * Обработка конца игры
     */
    private function finishGame()
    {
        stdoutSlow("Игра закончена");
        die();
    }
}
