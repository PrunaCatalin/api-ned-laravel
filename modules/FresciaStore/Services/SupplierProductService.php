<?php

namespace Modules\FresciaStore\Services;

use Illuminate\Support\Facades\Log;

class SupplierProductService
{
    /**
     * @var string
     */
    private ?string $service;

    public function __construct(string $service)
    {
        $this->service = $service;
    }

    /**
     * @return void
     */
    public function callService(): void
    {
        if ($this->service) {
            $className = __NAMESPACE__ . "\\Import\\" . $this->service . "Service";
            $instance = new $className();
            if (!method_exists($instance, 'run')) {
                Log::stack(['slack'])->error("Function run is missing", [
                    "file" => __FILE__  ,
                    "line" => __LINE__,
                    "class_missing" => "run",
                    "module_check" => $className
                ]);
                return;
            }
            $instance->run();
        } else {
            Log::stack(['slack'])->error("Service is not defined", [
                "file" => __FILE__  ,
                "line" => __LINE__,
                "class_missing" => "callService"
            ]);
        }
    }
}
