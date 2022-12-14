<?php

namespace App\Tests\Unit\Controller;

use App\Controller\DirectionController;
use PHPUnit\Framework\TestCase;


class DirectionControllerTest extends TestCase
{
 
    /** @test */
    public function dirReducTest(): void
    {
        
        $directionController = new DirectionController();
 
    
        $this->assertEquals(['WEST','NORTH'],$directionController->dirReduc(['NORTH', 'SOUTH', 'SOUTH', 'EAST', 'WEST', 'NORTH', 'WEST', 'NORTH']));
        $this->assertEquals([],$directionController->dirReduc(['NORTH','SOUTH','SOUTH','EAST','WEST','NORTH']));
        $this->assertEquals(['NORTH'],$directionController->dirReduc(['NORTH','SOUTH','SOUTH','EAST','WEST','NORTH','NORTH']));

    }
}
