<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class DirectionController extends AbstractController
{

    #[Route('/', name: 'app_directions_index', methods:['GET'])]

    public function index(Request $request): Response
    {
        $directions = $request->query->get('directions');
        if(!$directions) return $this->json(['result' => []]);

        $directionsArray = explode(",",$directions);

        $result = $this->dirReduc($directionsArray);

        return $this->json( [
            "result" => $result
        ]);
    }

    public function dirReduc($directions )
    {
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

        return $result;
    }
}