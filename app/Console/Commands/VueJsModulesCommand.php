<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VueJsModulesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vue:makeModule {--route=} {--module=} {--children=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected array $stubVariables = [];

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $modulePath = env('VUEJS_MODULE_PATH');
        $module = $this->getClassName($this->option('module'));
        $fullPath = $modulePath . $module;
        //check folder already exists (avoid to overwrite)
        if ($module) {
            if (!Storage::disk('resources')->exists($fullPath)) {
                $this->createInitStructure($module);
                $this->getStubVariables($fullPath);
                $this->compileModule($module);
            }
            $this->output->write('Module already exist with that name', true);
            //get Templates from scratch
        }
        return 0;
    }
    /*
     **
     * Map the stub variables present in stub to its value
     *
     * @return void
     *
     */
    private function getStubVariables(string $fullPath): void
    {
        $module = $this->getClassName($this->option('module'));
        $this->stubVariables =  [
            'path'                          => strtolower($module),
            'lowerClassNameStore'           => strtolower($module) . 'Store',
            'classNameStore'                => $module . 'Store',
            'classNameRouter'               => $module . 'Router',
            'classNameService'              => $module . 'Service',
            'componentName'                 => $module . 'Component'
        ];
        $children = $this->getChildren($module, $fullPath);
        $this->stubVariables['importComponents'] = $children['importComponents'];
        $this->stubVariables['childrenComponents'] = $children['childrenComponents'];
        $this->stubVariables['childrenComponentsClass'] =  $children['childrenComponentsClass'];
        $this->stubVariables['childrenComponentsClassWidget'] = $children['childrenComponentsClassWidget'];
        $this->stubVariables['childrenRoute'] = $children['childrenRoute'];
//        dd($this->stubVariables);
    }

    /**
     * @param string $module
     * @return void
     */
    private function compileModule(string $module)
    {
        $modulePath = env('VUEJS_MODULE_PATH') . $module . DIRECTORY_SEPARATOR;
        $templateRouter = Storage::disk('templates')->get("modules/Router.stub");
        $this->output->write('##--Module View[' . $module . ']--##', true);
        $templateView = Storage::disk('templates')->get("modules/View.stub");
        $templateView = str_replace(
            [
                "@childrenComponentsClassWidget", "@componentName", "@childrenComponentsClass",
                "@lowerClassNameStore", "@classNameStore", "@importChildrenComponent",
            ],
            [
                implode("\n\t", $this->stubVariables['childrenComponentsClassWidget']),
                $module . "Component",
                implode(", ", $this->stubVariables['childrenComponentsClass']),
                $this->stubVariables['lowerClassNameStore'],
                $this->stubVariables['classNameStore'],
                implode("\n", $this->stubVariables['childrenComponents']),
            ],
            $templateView
        );
        Storage::disk('resources')->put(
            $modulePath .  DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . $module . 'Component.vue',
            $templateView
        );
        $this->output->write('##--Router [' . $module . ']--##', true);
        $templateRouter = str_replace(
            [ "@importComponents",  "@classNameRouter", "@path", "@childrenRouteComponent" ],
            [
                implode("\n", $this->stubVariables['importComponents']),
                $this->stubVariables['classNameRouter'],
                $this->stubVariables['path'],
                implode(",\n", $this->stubVariables['childrenRoute'])
            ],
            $templateRouter
        );
        Storage::disk('resources')->put(
            $modulePath .  DIRECTORY_SEPARATOR . 'router.js',
            $templateRouter
        );
        $this->output->write('##--Store [' . $this->stubVariables['classNameStore'] . ']--##', true);
        $templateStore = Storage::disk('templates')->get("modules/Store.stub");
        $templateStore = str_replace(
            [ "@classNameService", "@classNameStore" , "@className"],
            [ $this->stubVariables['classNameService'], $this->stubVariables['classNameStore'], $module],
            $templateStore
        );
        Storage::disk('resources')->put(
            $modulePath .  DIRECTORY_SEPARATOR . 'store' . DIRECTORY_SEPARATOR .
            $this->stubVariables['classNameStore'] . '.js',
            $templateStore
        );
        $this->output->write('##--Service [' . $this->stubVariables['classNameService'] . ']--##', true);
        $templateService = Storage::disk('templates')->get("modules/Service.stub");
        $templateService = str_replace(
            "@classNameService",
            $this->stubVariables['classNameService'],
            $templateService
        );
        Storage::disk('resources')->put(
            $modulePath .  DIRECTORY_SEPARATOR . 'service' . DIRECTORY_SEPARATOR .
            $this->stubVariables['classNameService'] . '.js',
            $templateService
        );
        $this->output->write('##--Index []--##', true);
        $templateIndex = Storage::disk('templates')->get("modules/Index.stub");
        $templateIndex = str_replace(
            [ "@classNameRouter", "@classNameStore"  ],
            [ $this->stubVariables['classNameRouter'], $this->stubVariables['classNameStore'] ],
            $templateIndex
        );
        Storage::disk('resources')->put(
            $modulePath .  DIRECTORY_SEPARATOR  . 'index.js',
            $templateIndex
        );
    }
    /**
     * @param string $module
     * @return string[]
     */
    private function getChildren(string $module, string $fullPath): array
    {
        $this->output->write('############START [CHILDREN]##############', true);
        $childrenObjects = [
            'importComponents' => [],
            'childrenComponents' => [],
            'childrenComponentsClass' => [],
            'childrenComponentsClassWidget' => [],
            'childrenRoute' => []
        ];
        //@childrenName
        $argsChildren = $this->option('children');
        $childrenObjects['importComponents'][] = 'import ' . $this->stubVariables['componentName'] .
            ' from \'./components/' .  $this->stubVariables['componentName'] . '\';';
        $templateChildRoute = Storage::disk('templates')->get("modules/RouterChild.stub");
        $templateChildRoute = str_replace(
            [
                "@routeChildName", "@childrenName", "@path"
            ],
            [
                $module , $module . "Component" , $module
            ],
            $templateChildRoute
        );
        $childrenObjects['childrenRoute'][] = $templateChildRoute;
        if ($argsChildren) {
            $splitChildren = explode(",", $argsChildren);
            $templateChild = Storage::disk('templates')->get("modules/ViewChild.stub");
            foreach ($splitChildren as $child) {
                $classChild = $this->getClassName($child);
                $classChildComponent = $this->getClassName($child) . 'Component';
                $childPath = $fullPath . "/components/" . $classChild;
                $childPathLocal = 'import ' . $classChildComponent . ' from \'./' .
                    $classChild . '/' . $classChildComponent . '\';';
                $this->makeChildren(
                    $childPath,
                    $classChildComponent,
                    $templateChild
                );
                $childrenObjects['childrenComponentsClass'][] = $classChildComponent;
                $childrenObjects['childrenComponentsClassWidget'][] = "<" . $classChildComponent . "/>";
                $childrenObjects['childrenComponents'][] = $childPathLocal;
            }
        }
        //Replace router
        return $childrenObjects;
    }

    /**
     * @param string $childPath
     * @param string $classChildComponent
     * @param string $templateChild
     * @return void
     */
    private function makeChildren(
        string $childPath,
        string $classChildComponent,
        string $templateChild
    ): void {
        Storage::disk('resources')->makeDirectory($childPath);
        $this->output->write('############START [Make Children]##############', true);
        $templateChild = str_replace("@childrenName", $classChildComponent, $templateChild);
        //@routeChildName
        $templateChild = str_replace(
            [
                '@lowerClassNameStore' , '@classNameStore'
            ],
            [
                $this->stubVariables['lowerClassNameStore'], $this->stubVariables['classNameStore']
            ],
            $templateChild
        );

        $this->output->write('##--Template[' . $classChildComponent . '] Start--##', true);
        Storage::disk('resources')->put(
            $childPath .  DIRECTORY_SEPARATOR . $classChildComponent . '.vue',
            $templateChild
        );
        $this->output->write('##--Template[' . $classChildComponent . '] End--##', true);
        $this->output->write('############END [Make Children]##############', true);
    }
    /**
     * @param string $module
     * @return void
     */
    private function createInitStructure(string $module): void
    {
        $this->output->write('############START [INIT STRUCTURE]##############', true);
        $module = $this->getClassName($module);
        $modulePath = env('VUEJS_MODULE_PATH') . $module . DIRECTORY_SEPARATOR;
        $componentsVue = $modulePath . "components" . DIRECTORY_SEPARATOR;
        $componentsService = $modulePath . "service" . DIRECTORY_SEPARATOR;
        $componentsStore = $modulePath . "store" . DIRECTORY_SEPARATOR;
        Storage::disk('resources')->makeDirectory($componentsVue);
        Storage::disk('resources')->makeDirectory($componentsService);
        Storage::disk('resources')->makeDirectory($componentsStore);
    }
    /**
     * @param $name
     * @return string
     */
    private function getClassName($name): string
    {
        return Str::toPascalName($name);
    }
}
