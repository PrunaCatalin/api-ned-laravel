<?php

namespace App\Console\Commands;

use App\Services\RecoverData\RecoverDataService;
use Illuminate\Console\Command;
use Modules\Tenants\Entities\Customer\CustomerAccountAddress;
use Modules\Tenants\Entities\Customer\CustomerCompanyDetails;
use Modules\Tenants\Entities\Customer\CustomerDetails;
use Modules\Tenants\Entities\CustomerAccounts;

class RecoverNedDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recover:data';

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
    public function handle(RecoverDataService $recoverDataService)
    {
//        $allCustomers = CustomerAccounts::all();
//        foreach ($allCustomers as $customer) {
//            $customer->email = $recoverDataService->decrypt($customer->email);
//            $customer->save();
//        }

//        $allCustomers = CustomerAccountAddress::all();
//        foreach ($allCustomers as $customer) {
//            $customer->street = $recoverDataService->decrypt($customer->street);
//            $customer->building = $recoverDataService->decrypt($customer->building);
//            $customer->postal_code = $recoverDataService->decrypt($customer->postal_code);
//            $customer->save();
//        }

//        $allCustomers = CustomerDetails::all();
//        foreach ($allCustomers as $customer) {
//            $customer->firstname = $recoverDataService->decrypt($customer->firstname);
//            $customer->lastname = $recoverDataService->decrypt($customer->lastname);
//            $customer->birthday = $recoverDataService->decrypt($customer->birthday);
//            $customer->phone_number = $recoverDataService->decrypt($customer->phone_number);
//            if($customer->full_address)
//                $customer->full_address = $recoverDataService->decrypt($customer->full_address);
//            $customer->save();
//        }

    }
}
