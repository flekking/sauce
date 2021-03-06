<?php

namespace Fk\Sauce\Foundation\Console\Commands\Macro;

use Fk\Sauce\Console\NamelessGeneratorCommand;
use Illuminate\Console\Concerns\CreatesMatchingTest;
use Symfony\Component\Console\Input\InputOption;

class KernelMakeCommand extends NamelessGeneratorCommand
{
    use CreatesMatchingTest;

    /**
     * The console command name.
     * 
     * @var string
     */
    protected $signature = 'sauce:make:macro:kernel';

    /**
     * The console command description.
     * 
     * @var string
     */
    protected $description = 'Make Macro Kernel';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Macro Kernel';

    /**
     * The class default name.
     * 
     * @var string
     */
    protected $className = '\\App\\Macro\\Kernel';

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
        return $this->resolveStubPath('/stubs/kernel.stub');
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
        return $rootNamespace.'\\Macro';
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
