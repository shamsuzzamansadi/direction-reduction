<?php

namespace App\Controller\Test;


use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;


class DirectionControllerTest extends TestCase
{
    protected ContainerInterface $cotainer;

    public function setup(): void{
        parent::setUp();
        $this->container = static::createClient()->getcontainer();
    }

    /** @test */
    public function dirReducTest(): void
    {
        
        $directionController = $this->container->get(DirectionController::class);
       
        $result = $directionController->dirReduc(Request $request);
    
        $this->assertEquals(["WEST","NORTH"],$result->dirReduc("NORTH", "SOUTH", "SOUTH", "EAST", "WEST", "NORTH", "WEST", "NORTH"));
        $this->assertEquals([],$result->dirReduc("NORTH","SOUTH","SOUTH","EAST","WEST","NORTH"));
        $this->assertEquals(["NORTH"],$result->dirReduc("NORTH","SOUTH","SOUTH","EAST","WEST","NORTH","NORTH"));

    }
}
