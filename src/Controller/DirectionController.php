<?php

namespace App\Controller;

use LDAP\Result;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class DirectionController extends AbstractController
{
    #[Route('/direction={requests}', methods:['GET','HEAD'], name: 'app_direction')]

    public function dirReduc($requests): Response
    {
         /**
          * @var request Symfony\Component\HttpFoundation\Request
          */
        $directions = $requests->request->all();
        
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
