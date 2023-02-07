<?php

namespace App\Controller;

use App\Student\Application\CreateStudent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentPutController extends AbstractController
{

    public function __construct(private CreateStudent $createStudent){
        
    }

    public function __invoke(Request $request){
        $jsonCode=json_decode($request->getContent(), true);
        $this->createStudent->__invoke($jsonCode['name'], $jsonCode['mail']);
        return new Response('',Response::HTTP_CREATED);
    }

}