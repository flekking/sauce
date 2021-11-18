<?php

namespace Fk\Sauce\Export\Process;

use Barryvdh\DomPDF\Facade as PDF;

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
