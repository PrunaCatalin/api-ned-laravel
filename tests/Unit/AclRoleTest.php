<?php

namespace Tests\Unit;

use App\Models\Acl\AclRoles;
use PHPUnit\Framework\TestCase;

class AclRoleTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        //role = Developer
        AclRoles::truncate();

        $this->assertTrue(true);
    }
}
