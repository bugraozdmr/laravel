<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-user {name?} {--message=hello}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name') ?? $this->ask('What is your name?');

        $message = $this->option('message') ?? 'hello';

        $this->info("{$message} {$name}");

        // Progress bar başlat (toplam 10 adım)
        $this->output->progressStart(10);

        // Progres barı adım adım ilerlet
        for ($i = 0; $i < 10; $i++) {
            sleep(1); // her bir adımda 1 saniye bekle

            $this->output->progressAdvance();
        }

        // Progress bar bittiğinde tamamlandığını göster
        $this->output->progressFinish();

        $this->info("User {$name} has been created successfully!");
    }
}
