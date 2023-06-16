<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function output(string $title, mixed $object)
    {
        fwrite(STDERR, $title . " : " . print_r($object, true));
    }
}
