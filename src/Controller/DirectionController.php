<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class DirectionController extends AbstractController
{
    #[Route('/direction', methods:['GET','HEAD'], name: 'app_direction')]

    public function dirReduc(): Response
    {
        //  /**
        //   * @var request Symfony\Component\HttpFoundation\Request
        //   */
        // $directions = $requests->request->all();
        // $directions = array($directions);
        $directions = ["NORTH", "SOUTH", "SOUTH", "EAST", "WEST", "NORTH", "WEST", "NORTH"];
       

        $result = [];
        foreach($directions as $direction){
            if(!$result){
                array_push($result,$direction);
                
            }
            else{
                if(end($result) == "NORTH"){
                    if($direction == "SOUTH"){
                        array_pop($result);
                    }
                    else{
                        array_push($result,$direction);
                    }
                }
                elseif (end($result) == "SOUTH") {
                    if($direction == "NORTH"){
                        array_pop($result);
                    }
                    else{
                        array_push($result,$direction);
                    }
                }
                elseif (end($result) == "EAST") {
                    if($direction == "WEST"){
                        array_pop($result);
                    }
                    else{
                        array_push($result,$direction);
                    }
                }
                elseif (end($result) == "WEST") {
                    if($direction == "EAST"){
                        array_pop($result);
                    }
                    else{
                        array_push($result,$direction);
                    }
                }
                
                // array_push($result[$direction],$directions);
            }
        }

        return $this->json( [
            "result" => $result
        ]);
    }
}
