<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EquipsController extends AbstractController
{

    private $equipsArray = array (
        array("codi" => "1", 
            "nom" => "Equip Roig", 
            "cicle" =>"DAW",
            "curs" =>"22/23", 
            "membres" => array("Elena","Vicent","Joan","Maria")),
        array("codi" => "2", 
            "nom" => "Equip Blau", 
            "cicle" =>"DAM",
            "curs" =>"22/23", 
            "membres" => array("Alberto","Victor","Anton","Mar")),
        array("codi" => "3", 
            "nom" => "Equip Verd", 
            "cicle" =>"ASIX",
            "curs" =>"22/23", 
            "membres" => array("Alvaro","Victoria","Anna","Martin")),
        array("codi" => "4", 
            "nom" => "Equip Blau", 
            "cicle" =>"DAM",
            "curs" =>"22/23", 
            "membres" => array("Alicia","Victoria","Carmen","Marina"))
    );

    #[Route('/equip/{codi}', name: 'dades_equip')]
    public function equip($codi) {
        $resultat = array_filter($this->equipsArray,
            function($equip) use ($codi){
                return $equip["codi"] == $codi;
            });

            if(count($resultat) > 0) {
                $resposta = "";
                $resultat = array_shift($resultat);
                
                $resposta .= 
                    "<ul> 
                        <li>" . $resultat["codi"] . "</li>" .
                        "<li>" . $resultat["nom"] . "</li>" . 
                        "<li>" . $resultat["cicle"] . "</li>" . 
                        "<li>" . $resultat["curs"] . "</li>" . 
                        "<li> <ul>";

                        foreach ($resultat["membres"] as $membre) {
                            $resposta .= "<li>" . $membre . "</li>"; 
                        } 
                            
                        $resposta .= "</ul> </li> 
                    </ul>"; //   "<li>" . $resultat["membres"] . "</li> 
                
                return new Response("<html>
                    <body>
                        $resposta
                    </body>
                </html>");
            } 
            else {
                return new Response ("No s’ha trobat l’equip: $codi");
            }
    }
}
