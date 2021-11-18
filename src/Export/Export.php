<?php

namespace Fk\Sauce\Export;

use Fk\Sauce\Report\Process\{
    PdfProcessing,
};
use Fk\Sauce\Report\Report;
use Illuminate\Support\Str;

abstract class Export
{
    use PdfProcessing;
    
    /**
     * Store the available formats.
     * 
     * @var array
     */
    const AVAILABLE_FORMATS = [
        'pdf'
    ];

    /**
     * Store the export format.
     * 
     * @var string
     */
    protected string $format = '';

    /**
     * Store the value whether the file is downloadable.
     * 
     * @var bool
     */
    protected bool $download = false;

    /**
     * Store the option for the export.
     * 
     * @var array
     */
    protected array $options = [];

    /**
     * Store the data calculation result.
     * 
     * @var array
     */
    protected $data = [];

    /**
     * Store the report.
     * 
     * @var \Fk\Sauce\Report\Report
     */
    protected Report $report;

    /**
     * Static function to check format availability.
     * 
     * @static
     * @param  string  $format
     * @return void
     * @throws \Fk\Sauce\Export\ExportException
     */
    protected static function checkFormat($format)
    {
        if ( ! in_array($format, self::AVAILABLE_FORMATS)) {
            throw ExportException::new()
                ->problem('format_invalid', [
                    'format' => $format,
                    'available' => self::AVAILABLE_FORMATS,
                ])
                ->toss();
        }
    }

    /**
     * Set the export format.
     * 
     * @param  string  $format
     * @return \Fk\Sauce\Export\Export
     */
    public function setFormat(string $format)
    {
        self::checkFormat($format);
        $this->format = $format;

        return $this;
    }

    /**
     * Set the download value.
     * 
     * @param  bool  $download
     * @return \Fk\Sauce\Export\Export
     */
    public function setDownload(bool $download)
    {
        $this->download = $download;

        return $this;
    }

    /**
     * Set options based on index to avoid index deletion.
     * 
     * @param  string  $index
     * @param  mixed  $value
     * @return \Fk\Sauce\Export\Export
     */
    protected function setOptions(string $index, $value) {
        $this->options[$index] = $value;

        return $this;
    }

    /**
     * Data setter.
     * 
     * @param  mixed  $data
     * @return \Fk\Sauce\Export\Export
     */
    protected function setData($data) {
        $this->data = $data;

        return $this;
    }

    /**
     * Report setter.
     * 
     * @param  \Fk\Sauce\Report\Report  $report
     * @return \Fk\Sauce\Export\Export
     */
    protected function setReport(Report $report)
    {
        $this->report = $report;

        return $this;
    }

    /**
     * Prettier version of setData().
     * 
     * @param  mixed  $data
     * @return \Fk\Sauce\Export\Export
     */
    public function with($data) {
        return $data instanceof Report
            ?   $this->setReport($data)
            :   $this->setData($data);
    }

    /**
     * Finish the export processing.
     * 
     * @return void
     */
    public function done()
    {
        self::checkFormat($this->format);
        return $this->{'process'.Str::studly($this->format)}();
    }
}
