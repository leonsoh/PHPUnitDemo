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

	/**
     * @dataProvider routeLengthProvider
     */

	public function testCanHaveLength(Length $length, int $expected): void
	{

		$city1 = new City("Paris");
		$city2 = new City("Tokyo");

		$route = new Route($city1, $city2, Color::blue(), $length);

		$this->assertEquals($expected, $route->length()->asInteger());
	}


	/**
     * @dataProvider routeColorProvider
     */

	public function testCanHaveColor(Color $color, String $expected): void
	{
		$city1 = new City("Paris");
		$city2 = new City("Tokyo");

		$route = new Route($city1, $city2, $color, Length::two());

		$this->assertEquals($expected, $route->color()->asString());
	}


	public function routeLengthProvider(): array
    {
        return [
            'one' => [Length::one(), 1],
            'two' => [Length::two(), 2],
            'three' => [Length::three(), 3],
            'four' => [Length::four(), 4],
            'five' => [Length::five(), 5],
            'six' => [Length::six(), 6],
        ];
    }


    public function routeColorProvider(): array
    {
    	 return [
            'blue' => [Color::blue(), "blue"],
            'white' => [Color::white(), "white"],
            'purple' => [Color::purple(), "purple"],
            'yellow' => [Color::yellow(), "yellow"],
            'orange' => [Color::orange(), "orange"],
            'red' => [Color::red(), "red"],
            'green' => [Color::green(), "green"],
            'black' => [Color::black(), "black"],
            'wildcard' => [Color::wildcard(), "wildcard"],
        ];
    }


}