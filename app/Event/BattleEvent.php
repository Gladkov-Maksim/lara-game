<?php

namespace App\Event;

//use App\Event\EventInterface;
use App\Collection\MonsterCollection;
use App\Hero;
//use App\Models\Question;

class BattleEvent implements EventInterface
{
    private MonsterCollection $monsterCollection;
    private int $count;
    private string $difficultyLevel;
    private Hero $hero;

    public function __construct(int $count, string $difficultyLevel, Hero $hero)
    {
        $this->count = $count;
        $this->difficultyLevel = $difficultyLevel;
        $this->hero = $hero;
        $this->monsterCollection = new MonsterCollection($count, $difficultyLevel);
    }

    public function run(): void
    {
        echo "Вы встретили монстра. Сражайтесь!!!\n";
        foreach ($this->monsterCollection->getAll() as $monster) {
            echo $monster->getWelcomePhrase();

            start:
            $command = readline('Введите "S", чтобы открыть магазин или "A" для атаки' . "\n");
            if ($command !== 'S' && $command !== 'A') goto start;
            if ($command === "A") {
                while (true) {
                    if (!$this->hero->getWeaponCount()) {
                        echo "У вас закончились шары. Идите в магазин";
                        // Здесь в дальнейшем нужно сделать проверку: а есть ли у него деньги на покупку хотя бы одного шара
                        goto start;
                    }
                    echo "Получай, монстр\n";
                    $this->hero->attack($monster);
                    if (!$monster->getHealth()) {
                        $monster->die();
                        break;
                    }

                    sleep(1);
                    $monster->attack($this->hero);
                    if (!$this->hero->getHealth()) {
                        $this->hero->die();
                    }
                }
            }
            elseif ($command === "S")  {
                echo 'Открываем магазин';
                // Здесь нужно будет сделать обработку открытия магазина
            }
        }
    }
}
