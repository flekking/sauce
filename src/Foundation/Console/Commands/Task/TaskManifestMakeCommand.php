<?php

namespace Fk\Sauce\Foundation\Console\Commands\Task;

use Fk\Sauce\Console\GeneratorCommand;
use FK\Sauce\Console\Traits\CleanNamespace;
use Fk\Sauce\Foundation\Console\Commands\Task\Traits\ModelNameContent;
use Illuminate\Console\Concerns\CreatesMatchingTest;
use Symfony\Component\Console\Input\InputOption;

class TaskManifestMakeCommand extends GeneratorCommand
{
    use CreatesMatchingTest;
    use CleanNamespace;
    use ModelNameContent;

    /**
     * The console command name.
     * 
     * @var string
     */
    protected $name = 'sauce:make:task:manifest';

    /**
     * The console command description.
     * 
     * @var string
     */
    protected $description = 'Make Manifest Task';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Manifest Task';

    /**
     * Execute the console command.
     * 
     * @return void
     */
    public function handle()
    {
        parent::handle();
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->resolveStubPath('/stubs/task.manifest.stub');
    }

    /**
     * Resolve the fully-qualified path to the stub.
     *
     * @param  string  $stub
     * @return string
     */
    protected function resolveStubPath($stub)
    {
        return file_exists($customPath = $this->laravel->basePath(trim($stub, '/')))
            ? $customPath
            : __DIR__.$stub;
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\\Tasks';
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            // ['all', 'a', InputOption::VALUE_NONE, 'Generate a migration, seeder, factory, policy, and resource controller for the model'],
        ];
    }
}
