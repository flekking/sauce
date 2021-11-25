<?php

namespace Fk\Sauce\Console;

use Illuminate\Console\GeneratorCommand as Command;
use Illuminate\Support\Str;

abstract class GeneratorCommand extends Command
{
    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        return $this
            ->replaceContent($stub, $name)
            ->replaceNamespace($stub, $name)
            ->replaceClass($stub, $name);
    }

    /**
     * Replace the specified contents.
     * 
     * @param  string  $stub
     * @param  string  $name
     * @return \Fk\Sauce\Console\GeneratorCommand
     */
    protected function replaceContent(&$stub, $name)
    {
        $data = $this->getContentToBeReplaced($name);

        foreach ($data as $index => $value) {
            $index = '{{ '.$index.' }}';
            $stub = Str::replace($index, $value, $stub);
        }

        return $this;
    }

    /**
     * Generate content to be replaced on stub.
     * 
     * @param  string  $name
     * @return array
     */
    protected function getContentToBeReplaced($name)
    {
        return [];
    }
}
