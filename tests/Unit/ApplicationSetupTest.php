<?php

namespace Tests\Unit;

use Illuminate\View\ViewServiceProvider;
use PHPUnit\Framework\TestCase;
use Tests\CreatesApplication;

class ApplicationSetupTest extends TestCase
{

    use CreatesApplication;

    /**
     * A basic test example.
     */
    public function test_view_provider_is_not_loaded(): void
    {
        $app = $this->createApplication();
        $this->assertFalse($app->providerIsLoaded(ViewServiceProvider::class));
    }
}
