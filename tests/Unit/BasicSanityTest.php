<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

/**
 * Basic sanity checks used by CI to validate the codebase before
 * building and pushing a Docker image. Extend this suite with real
 * unit/feature tests as coverage grows.
 */
class BasicSanityTest extends TestCase
{
    public function test_composer_autoloader_is_present(): void
    {
        $this->assertFileExists(__DIR__ . '/../../vendor/autoload.php');
    }

    public function test_environment_example_file_exists(): void
    {
        $this->assertFileExists(__DIR__ . '/../../.env.example');
    }

    public function test_common_helper_functions_are_loaded(): void
    {
        $this->assertTrue(function_exists('str_random') || class_exists(\Illuminate\Support\Str::class));
    }
}
