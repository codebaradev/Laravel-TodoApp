<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Psr\Log\LoggerInterface;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected LoggerInterface $logger;

    protected function setUp(): void
    {
        parent::setUp();

        $this->logger = Log::channel('testing');

        DB::delete("DELETE FROM todos");
        DB::delete("DELETE FROM users");
    }
}
