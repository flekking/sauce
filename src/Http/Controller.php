<?php

namespace Fk\Sauce\Http;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Fk\Sauce\Database\Traits\{
    BuildWhere,
    BuildExtent,
    Transaction,
};
use Fk\Sauce\Service\Traits\ManageService;
use Fk\Sauce\Task\Traits\TransmitTask;
use Fk\Sauce\Widget\Traits\RevealWidget;
use Fk\Sauce\Report\Traits\GrabReport;
use Fk\Sauce\Export\Traits\CrateExport;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    use BuildWhere, BuildExtent, ManageService, TransmitTask, RevealWidget,
        GrabReport, CrateExport, Transaction;
}
