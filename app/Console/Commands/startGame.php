<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\ProcessorGame;

class startGame extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Запуск консольной игры "Путь к офферу"';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $game = new ProcessorGame();
        $game->init();
        return 0;
    }
}
