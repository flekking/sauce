<?php

namespace Fk\Sauce\Foundation\Console\Commands\Task\Traits;

use Illuminate\Support\Str;

trait ModelNameContent
{
    /**
     * @param  string  $name
     * @return array
     */
    protected function getContentToBeReplaced($name)
    {
        $additionalContents = method_exists($this, 'getAdditionalContentToBeReplaced') 
            ?   $this->getAdditionalContentToBeReplaced($name)
            :   [];

        return [
            'modelNamespace' => $this->getModelNamespaceContent(),
            'modelName' => $this->getModelNameContent(),
            'modelVariable' => $this->getModelVariableContent(),
            ...$additionalContents
        ];
    }

    /**
     * @param  string  $name
     * @return string
     */
    protected function getModelNamespaceContent($name)
    {
        return trim(implode('\\', array_slice(explode('\\', $name), 0, -1)), '\\');
    }

    /**
     * @param  string  $name
     * @return string
     */
    protected function getModelNameContent($name)
    {
        return implode('', array_slice(explode('\\', $name), -1, 1));
    }

    /**
     * @param  string  $name
     * @return string
     */
    protected function getModelVariableContent($name)
    {
        return Str::camel($this->getModelNameContent());
    }
}
