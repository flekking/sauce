<?php

namespace Fk\Sauce\Export\Process;

trait PdfProcessing
{
    /**
     * @return void
     */
    protected function processPdf()
    {
        $file = \PDF::loadView($this->options['view'], $this->data);

        return ($this->download ?? false)
            ? $file->download($this->options['fileName'])
            : $file;
    }
}
