<?php

namespace App\Controller;

use App\Student\Application\DeleteStudent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RemoveStudentDeleteController extends AbstractController
{

    public function __construct(private DeleteStudent $deleteStudents){
        
    }

    public function __invoke(Request $request){
        $id = $request->get('id');
        $this->deleteStudents->__invoke($id);
        $response = new Response();
        $response->setStatusCode(Response::HTTP_OK);
        return $response;
    }

}