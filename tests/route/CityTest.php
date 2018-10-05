<?php declare(strict_types=1);
namespace TicketToRide;

use PHPUnit\Framework\TestCase;

final class CityTest extends TestCase
{
	public function testCanBeCityName(): void
	{
		
		$city = new City("London");

		// $this->assertEquals("London", $name->__construct("London"));

		$this->assertEquals("London", $city->name());
		

	}


	public  function testCanBeNonEmptyName(): void
	{

		$this->expectException(InvalidArgumentException::class);

		$city = new City("");

	}

}