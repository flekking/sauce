<?php

namespace Fk\Sauce\Export\Traits;

use Fk\Sauce\Export\Export;

trait CrateExport
{
    /**
     * @param  \Fk\Sauce\Export\Export  $export
     * @param  mixed  $data
     * @param  string  $format
     * @param  bool  $download
     * @param  \Illuminate\Http\Request  $request
     * @param  ...$args
     * @return void
     */
    public function crate(
        Export $export,
        $data,
        string $format,
        bool $download,
        $request,
        ...$args
    )
    {
        $export->with($data)
            ->setFormat($format)
            ->setDownload($download);

        return $export->done();
    }
}
