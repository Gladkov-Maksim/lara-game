<?php

namespace App;

use App\Collection\LevelCollection;
use App\Level\LevelInterface;

final class ProcessorGame
{
    private LevelCollection $levelCollection;
    private ?LevelInterface $currentLevel = null;

    private Hero $hero;

    public function init()
    {
        // нужно заполнить коллекцию уровней
        $this->levelCollection = new LevelCollection();
        $this->changeLevel();
    }

    private function changeLevel()
    {
        if (!$this->levelCollection->getCount()) {
            $this->finishGame();
            die();
        }

        if ($this->currentLevel) {
            $this->levelCollection->remove($this->currentLevel);
        }

        $this->currentLevel = $this->levelCollection->first();
        $this->currentLevel->run();
    }

    private function finishGame()
    {

    }
}
