<?php

namespace Fk\Sauce\Foundation\Console\Commands\Macro;

use Fk\Sauce\Console\GeneratorCommand;
use Illuminate\Console\Concerns\CreatesMatchingTest;
use Symfony\Component\Console\Input\InputOption;
use Illuminate\Support\Str;

class ForeignBlueprintMakeCommand extends GeneratorCommand
{
    use CreatesMatchingTest;

    /**
     * The console command name.
     * 
     * @var string
     */
    protected $name = 'sauce:make:macro:blueprint:foreign';

    /**
     * The console command description.
     * 
     * @var string
     */
    protected $description = 'Make Foreign Blueprint Macro';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Foreign Blueprint Macro';

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
        return $this->resolveStubPath('/stubs/blueprint.foreign.stub');
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
        return $rootNamespace.'\\Macro\\Blueprint\\Foreign';
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
     * @param  string  $name
     * @return array
     */
    protected function getContentToBeReplaced($name)
    {
        $name = explode('\\', $name);
        
        $defaultFieldName = $name[count($name) - 1];
        $defaultFieldName = Str::endsWith($defaultFieldName, 'Blueprint')
            ?   Str::replaceLast('Blueprint', '', $defaultFieldName)
            :   $defaultFieldName;
        $table = Str::snake(Str::plural($defaultFieldName));
        $defaultFieldName = Str::snake($defaultFieldName).'_id';
        
        return [
            'defaultFieldName' => $defaultFieldName,
            'table' => $table,
        ];
    }
}
