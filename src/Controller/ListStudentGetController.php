<?php

namespace App\Controller;

use App\Student\Application\ListStudents;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ListStudentGetController extends AbstractController
{

    public function __construct(private ListStudents $listStudents){
        
    }

    public function __invoke(Request $request){
        $students=$this->listStudents->__invoke();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($students));
        $response->setStatusCode(Response::HTTP_OK);
        return $response;
    }

}