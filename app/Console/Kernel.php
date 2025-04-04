<?php
namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel {
/**
* Define os comandos Artisan personalizados da aplicação.
*/
protected $commands = [
\App\Console\Commands\MakeRepository::class,
];

/**
* Define a programação dos comandos Artisan.
*/
protected function schedule(Schedule $schedule) {
// Defina tarefas agendadas aqui, se necessário
}

/**
* Registra os comandos personalizados da aplicação.
*/
protected function commands() {
$this->load(__DIR__.'/Commands');
require base_path('routes/console.php');
}
}
