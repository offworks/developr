<?php
namespace Devlife\App\Controllers\Flow;

use Devlife\Abstracts\BaseController;

class FlowController extends BaseController
{
    /**
     * @path /setting
     */
    public function groupSetting()
    {
        return SettingFlowController::class;
    }
}