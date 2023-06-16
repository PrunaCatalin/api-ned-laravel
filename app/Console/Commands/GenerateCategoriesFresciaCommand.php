<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GenerateCategoriesFresciaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:categories-frescia';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = Storage::get('resource/categories/categories.txt');
        $categories = explode("\n", $data);

        $categories_tree = [];
        $id_counter = 1;
        $order_list_counter = 1;
        foreach ($categories as $category) {
            $parts = explode('>', $category);
            $parent = &$categories_tree;

            foreach ($parts as $part) {
                if (!isset($parent[$part])) {
                    $parent[$part] = ['_meta' => ['id' => $id_counter++, 'name' => $part]];
                }
                $parent = &$parent[$part];
            }
        }
        $insert_queries = $this->generateInsertQueries($categories_tree, null, $order_list_counter);
        $final_queries = implode("\n", $insert_queries);
        Storage::put("resource/categories/categories_query.txt" , $final_queries);
    }
    private function generateInsertQueries($tree, $parentId = null, &$order_list_counter, $position = 0): array
    {
        $queries = [];
        foreach ($tree as $key => $value) {
            if ($key === '_meta') {
                continue;
            }
            $meta = $value['_meta'];
            $id = $meta['id'];
            $name = $meta['name'];
            $slug = Str::slug($name, '-');
            $order_list = $parentId ? $position++ : $order_list_counter++;
            $queries[] = "INSERT INTO wd_product_categories (id, id_parent, order_list, position, name, url_seo)
            VALUES ('$id', " . ($parentId ? "'$parentId'" : 0) . ", '$order_list', '$position', '$name', '$slug');";
            $queries = array_merge($queries, $this->generateInsertQueries($value, $id, $order_list_counter, $position));
        }
        return $queries;
    }
}
