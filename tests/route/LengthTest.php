<?php declare(strict_types=1);
namespace TicketToRide;

use PHPUnit\Framework\TestCase;

final class LengthTest extends TestCase
{
	public function testCanBeLengthOne(): void
	{	
		$length = Length::one();
		
		// $this->assertTrue($length->length()->equalTo(Length::one()));

		$this->assertEquals(1, $length->asInteger());
	}
}