<?php

namespace App\Collection;

use App\Monster\Monster;

class MonsterCollection
{
    private \Ramsey\Collection\Collection $collection;

    public function __construct(int $monstersCount, string $difficultyLevel)
    {
        $this->collection = new \Ramsey\Collection\Collection('App\\Monster\\MonsterInterface');

        for ($i = 0; $i < $monstersCount; $i++) {
            $this->collection->add(new Monster($difficultyLevel));
        }
    }


    /**
     * Получение всех элементов коллекции
     */
    public function getAll(): \Ramsey\Collection\Collection
    {
        return $this->collection;
    }
}
