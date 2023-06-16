<?php

/*
 * salesforce-laravel | acl.php
 * https://www.webdirect.ro/
 * Copyright 2022 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 11/10/2022 9:16 AM
*/

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\Acl;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

Route::group([
    'middleware' => ['cors', 'json.response' , 'prefix' => 'api' , 'json.force'],
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
], function () {
    Route::prefix('v1')->group(function () {
        Route::prefix('administration')->group(function () {
            Route::prefix('cpanel')->group(function () {
                Route::prefix('acl')->group(function () {
                    //Roles
                    Route::post(
                        '/roles',
                        [Acl\AclRolesController::class, 'getRoles']
                    )->name('cpanel.acl.role.list');
                    Route::put(
                        '/action-role',
                        [Acl\AclRolesController::class, 'actionRole']
                    )->name('cpanel.acl.role.action');
                    Route::post(
                        '/delete-role',
                        [Acl\AclRolesController::class, 'deleteRole']
                    )->name('cpanel.acl.role.delete');

                    //Permissions Role
                    Route::post(
                        '/permissions-role',
                        [Acl\AclRolesController::class, 'getPermissionRoles']
                    )->name('cpanel.acl.permission-role.list');
                    Route::patch(
                        '/permission-update',
                        [Acl\AclRolesController::class, 'updatePermissionRole']
                    )->name('cpanel.acl.permission-update');
                    Route::post(
                        '/permission-delete',
                        [Acl\AclRolesController::class, 'deletePermissionRole']
                    )->name('cpanel.acl.permission-delete');
                });
            });
        });
    });
});
