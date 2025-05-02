<?php

namespace Tests\Unit\Domain\Driver\Entity;

use App\Domain\Driver\Entity\Driver;
use PHPUnit\Framework\TestCase;

class DriverTest extends TestCase
{
    public function testCanCreateDriverWithAttributes()
    {
        $name = 'Max Verstappen';
        $nationality = 'Dutch';
        $number = 1;

        $driver = new Driver($name, $nationality, $number);

        $this->assertSame($name, $driver->name());
        $this->assertSame($nationality, $driver->nationality());
        $this->assertSame($number, $driver->number());
    }
}

?>