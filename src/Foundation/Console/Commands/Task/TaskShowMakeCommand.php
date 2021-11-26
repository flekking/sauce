<?php

namespace Fk\Sauce\Foundation\Console\Commands\Task;

use Fk\Sauce\Console\GeneratorCommand;
use Fk\Sauce\Foundation\Console\Commands\Task\Traits\ModelNameContent;
use Illuminate\Console\Concerns\CreatesMatchingTest;
use Symfony\Component\Console\Input\InputOption;

class TaskShowMakeCommand extends GeneratorCommand
{
    use CreatesMatchingTest;
    use ModelNameContent;

    /**
     * The console command name.
     * 
     * @var string
     */
    protected $name = 'sauce:make:task:show';

    /**
     * The console command description.
     * 
     * @var string
     */
    protected $description = 'Make Show Task';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Show Task';

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
        return $this->resolveStubPath('/stubs/task.show.stub');
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

    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getNameInput()
    {
        return trim($this->argument('name')).'\\ShowTask';
    }
}
