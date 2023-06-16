<?php

namespace Database\Seeders;

use App\Models\ApplicationLinks\WdApplicationLinks;
use Illuminate\Database\Seeder;

class WdApplicationLinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //clean and feed table
        WdApplicationLinks::create(["name" => "Dashboard", "position" => 0,
            "href" => "/", "icon" => "icon-devices_other"]);
        $lastId = WdApplicationLinks::create(["name" => "Importer", "position" => 1,
            "href" => "/import/", "icon" => "icon-devices_other"]);
        WdApplicationLinks::create([
            "name" => "Import Players", "position" => 0, "parent" => $lastId->id,
            "href" => "players", "icon" => "icon-devices_other"]);
        WdApplicationLinks::create([
            "name" => "Import Configuration", "position" => 1, "parent" => $lastId->id,
            "href" => "configuration", "icon" => "icon-devices_other"]);
        $lastId = WdApplicationLinks::create(["name" => "Users", "position" => 2,
            "href" => "/user/", "icon" => "icon-devices_other"]);
        WdApplicationLinks::create([
            "name" => "User list", "position" => 1, "parent" => $lastId->id,
            "href" => "user-list", "icon" => "icon-devices_other"]);
        $lastId = WdApplicationLinks::create(["name" => "Control Panel", "position" => 3,
            "href" => "/cpanel/", "icon" => "icon-devices_other"]);
        WdApplicationLinks::create([
            "name" => "Config Sidebar", "position" => 1, "parent" => $lastId->id,
            "href" => "config-sidebar", "icon" => "icon-devices_other"]);
        WdApplicationLinks::create([
            "name" => "Config ACL", "position" => 2, "parent" => $lastId->id,
            "href" => "config-acl", "icon" => "icon-devices_other"]);
    }
}
