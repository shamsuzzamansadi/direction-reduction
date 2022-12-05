<?php

namespace App\Controller;

use LDAP\Result;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DirectionController extends AbstractController
{
    #[Route('/direction', name: 'app_direction')]

    public function dirReduc(): Response
    {
        $directions = ["NORTH", "SOUTH", "SOUTH", "EAST", "WEST", "NORTH", "WEST", "NORTH"];
        
        // $directionDictionary basically a mapping on the directions in an Array. 
        // As arrays in PHP more of like a mapping.
        $directionDictionary = [ "NORTH" => "SOUTH", 
                                 "SOUTH" => "NORTH",
                                 "EAST"  => "WEST" ,
                                 "WEST"  => "EAST"
                            ];

        $result = [];
        foreach($directions as $direction){
            if($result && $directionDictionary[$direction] == $result[-1]){
                array_pop($result);
            }
            else{
                array_push($result[$direction]);
            }
        }

        return $this->json( [
            "result" => $result
        ]);
    }
}
