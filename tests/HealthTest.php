<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use Alumnot\PennylessTrack\Health;

class HealthTest extends TestCase {
    public function testHealth(): void     {
        $this->assertSame(['status' => 'ok'], Health::status());
    }
}
?>