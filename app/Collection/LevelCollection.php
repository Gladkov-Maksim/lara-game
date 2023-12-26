<?php

namespace App\Collection;

use App\Level\Level1;

class LevelCollection
{
    private \Ramsey\Collection\Collection $collection;

    public function __construct()
    {
        $this->collection = new \Ramsey\Collection\Collection('App\\Level\\LevelInterface');
        $this->collection->add(new Level1());
    }

    /**
     * Получение длины коллекции
     */
    public function getCount(): int
    {
        return $this->collection->count();
    }

    /**
     * Удаление элемента коллекции
     */
    public function remove(\App\Level\LevelInterface $level): void
    {
        $this->collection->remove($level);
    }

    /**
     * Получение первого элемента коллекции
     */
    public function first(): \App\Level\LevelInterface
    {
        return $this->collection->first();
    }
}
