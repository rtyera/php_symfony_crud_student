<?php

namespace App\Controller;

use App\Student\Application\SearchStudent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SearchStudentGetController extends AbstractController
{

    public function __construct(private SearchStudent $searchStudent){
        
    }

    public function __invoke(Request $request){
        $id=$request->get('id');
        $student=$this->searchStudent->__invoke($id);
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($student));
        $response->setStatusCode(Response::HTTP_OK);
        return $response;
    }

}