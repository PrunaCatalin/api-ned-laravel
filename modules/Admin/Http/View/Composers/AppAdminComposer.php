<?php
/*
 * webdirect | AppAdminComposer.php
 * https://www.webdirect.ro/
 * Copyright 2023 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 5/12/2023 5:33 PM
*/

namespace Modules\Admin\Http\View\Composers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Modules\FresciaStore\Services\ConfigService;
use Modules\FresciaStore\Services\ToolsServices;

class AppAdminComposer
{
    protected $configCompany;
    protected $google;
    protected $tools;

    public function __construct(ConfigService $configService, ToolsServices $toolsServices)
    {
        $this->configCompany = $configService->getCompanyData();
        $this->google = $configService->getGoogleData();
        $this->tools = $toolsServices;
    }

    public function compose(View $view)
    {
//        dd(Auth::guard('web')->user());
        $view->with('WDConfigCompany', $this->configCompany);
        $view->with('WDConfigGoogle', $this->google);
        $view->with('WDTools', $this->tools);
        $view->with('WDAdmin', Auth::guard('web')->user());

    }
}
