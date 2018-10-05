<?php declare(strict_types=1);
namespace TicketToRide;

use PHPUnit\Framework\TestCase;

final class RouteTest extends TestCase
{
	public function testCannotBeSameCities(): void
	{
	
		$this->expectException(InvalidArgumentException:: class);


		$city1 = new City("Berlin");
		$city2 = new City("Berlin");


		$route = new Route($city1, $city2, Color::purple(), Length::one());
	
	}

	public function testCanBeTwoDifferentCities(): void
	{
	

		$city1 = new City("Berlin");
		$city2 = new City("London");

		

		$route = new Route($city1, $city2, Color::purple(), Length::one());

		$this->assertTrue($route->firstCity()->name() != $route->secondCity()->name());
		
	}

	public function testCanBePurpleColor(): void
	{
		
		$city1 = new City("Paris");
    	$city2 = new City("Tokyo");

    	$color = Color::purple();

    	$route = new Route($city1, $city2, $color, Length::two());

		$this->assertEquals($color, $route->color());

	}

	public function testHasALengthOfOne(): void
	{
		$city1 = new City("Paris");
		$city2 = new City("Tokyo");

		$length = Length::one();

		$route = new Route($city1, $city2, Color::blue(), $length);

		$this->assertEquals($length, $route->length());
	}


	public function testHasSameLengthAndColor(): void
	{
		$city1 = new City("Paris");
		$city2 = new City("Tokyo");

		$route = new Route($city1, $city2, Color::blue(), Length::two());

		$this->assertContains(needle, haystack);
	}


	public function testCanHaveLength(Length $length, int $expected)
	{

		$city1 = new City("Paris");
		$city2 = new City("Tokyo");

		$route = new Route($city1, $city2, Color::blue(), $length);

		$this->assertEquals($expected, $route->length()->asInteger());
	}

	public function testCanHaveColor(Color $color, Color $expected)
	{
		$city1 = new City("Paris");
		$city2 = new City("Tokyo");

		$route = new Route($city1, $city2, $color, Length::two());

		$this->assertEquals($expected, $route->color());
	}


}