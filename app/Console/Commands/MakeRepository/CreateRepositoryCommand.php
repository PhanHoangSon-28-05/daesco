<?php

namespace App\Console\Commands\MakeRepository;

use Illuminate\Support\Str;
use Illuminate\Console\GeneratorCommand;

class CreateRepositoryCommand extends GeneratorCommand
{
    protected $signature = 'create:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Repository class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository';

    /**
     * Determine if the class already exists.
     *
     * @param  string  $rawName
     * @return bool
     */
    protected function alreadyExists($rawName)
    {
        return class_exists($rawName);
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/Stubs/repository.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        $folder = Str::plural($this->argument('name'));
        return $rootNamespace.'\Repositories\\'.$folder;
    }

    /**
     * Replace the namespace for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return $this
     */
    protected function replaceNamespace(&$stub, $name)
    {
        $model = $this->argument('name');

        $stub = str_replace(
            [
                'DummyFolder',
                'DummyModel',
                'DummyRepository',
                'DummyRepositoryInterface'
            ],
            [
                Str::plural($model),
                $model,
                $model.'Repository',
                $model.'RepositoryInterface',
            ],
            $stub
        );

        return $this;
    }
    
    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getNameInput()
    {
        return trim($this->argument('name')).'Repository';
    }
}
