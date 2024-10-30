<?php

namespace App\Console\Commands\MakeRepository;

use Illuminate\Console\Command;

class MakeRepositoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new Repository and RepositoryInterface classes';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->callSilent('create:repository-interface', ['name' => $this->argument('name')]);
        $this->callSilent('create:repository', ['name' => $this->argument('name')]);

        $this->info('Create Repository success');
    }
}
