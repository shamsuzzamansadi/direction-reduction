<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class DirectionController extends AbstractController
{
    #[Route('/direction={requests}', methods:['GET','HEAD'], name: 'app_direction')]

    public function dirReduc($requests ): Response
    {
         /**
          * @var Symfony\Component\HttpFoundation\Request
          */
        
        $directions = explode(",",$requests);

        // This is the dictionary mapping for the directions.
        $reductionMapping = [
            'NORTH' => 'SOUTH',
            'SOUTH' => 'NORTH',
            'WEST' => 'EAST',
            'EAST' => 'WEST'
                
        ];
            
        $result = []; 
        
        foreach($directions as $direction){
            if($result && $reductionMapping[$direction] === end($result)){
                array_pop($result);
            } else {
                array_push($result, $direction);
            }
        }
        

        return $this->json( [
            "result" => $result
        ]);
    }
}
