<?php
/**
 * File Name: auth.php
 * Author: CATALIN PRUNA
 * Created: 6/17/2023
 *
 * License:
 * --------------
 * SC WEBDIRECT TEHNOLOGIES SRL
 *
 * Change Log:
 * --------------
 * Date         | Author         | Description
 * 6/17/2023 | CATALIN PRUNA | Initial version
 *
 */

use Modules\Tenants\Http\Controllers\Auth\TenantAuthController;

Route::post('login', [TenantAuthController::class, 'login'])->name('tenants.action.login');
Route::get('logout', [TenantAuthController::class, 'logout'])->name('tenants.action.logout');

