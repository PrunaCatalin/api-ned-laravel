<?php

namespace Database\Seeders;

use App\Models\Acl\AclModules;
use App\Models\Tenants\Domains;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

class AclModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $routes = Route::getRouteList();
        foreach ($routes as $route) {
            if (preg_match("/^api\//", $route['uri'])) {
                $action = $route['action'];
                if ($route['uri'] !== "Closure") {
                    $action = str_replace("App\\Http\\Controllers\\", "", $action);
                    if (preg_match('/(?<group>\w+)\\\\(?<controller>\w+)\@(?<action>\w+)/', $action, $matches)) {
                        $required = ["group", "controller", "action"];
                        if (count(array_intersect_key(array_flip($required), $matches)) === count($required)) {
                            $domain = Domains::where("domain", $route['host'])->first();
                            if (
                                $domain && !AclModules::where(function ($q) use ($domain, $matches) {
                                    $q->where("module_name", $matches['controller']);
                                    $q->where("pretty_name", $matches['action']);
                                    $q->where("group_name", $matches['group']);
                                    $q->where("domain_id", $domain->id);
                                })->first()
                            ) {
                                AclModules::create([
                                    "module_name" => $matches['controller'],
                                    "pretty_name" => $matches['action'],
                                    "group_name" => $matches['group'],
                                    "domain_id" => $domain->id,
                                ]);
                            }
                        }
                    }
                }
            }
        }
    }


}
