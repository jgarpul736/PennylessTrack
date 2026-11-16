<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use Alumnot\PennylessTrack\Version;

class VersionTest extends TestCase {
    public function testVersionTieneFormatoXY(): void     {
        $this->assertMatchesRegularExpression('/^\d+\.\d+$/', Version::get());
    }
}
?>