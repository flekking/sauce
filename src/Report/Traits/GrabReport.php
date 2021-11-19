<?php

namespace Fk\Sauce\Report\Traits;

use Fk\Sauce\Report\Report;

trait GrabReport
{
    /**
     * @param  \Fk\Sauce\Report\Report  $report
     * @param  \Illuminate\Http\Request  $request
     * @param  ...$args
     * @return void
     */
    public function grab(Report $report, $format, $download, $request, ...$args)
    {
        $report->setFormat($format)
            ->setDownload($download)
            ->calculate($request, ...$args);

        return $report->done();
    }
}
