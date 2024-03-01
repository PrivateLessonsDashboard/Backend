<?php

namespace Tests\Unit;

use Illuminate\View\ViewServiceProvider;
use PHPUnit\Framework\TestCase;
use Tests\CreatesApplication;

class ExampleTest extends TestCase
{

    use CreatesApplication;
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $app = $this->createApplication();
        $this->assertFalse($app->providerIsLoaded(ViewServiceProvider::class));
    }
}
