<?php

namespace App\Controller;

use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiGetController extends AbstractController
{
    /**
     * @Route("/api/get", name="app_api_get", methods={"GET"})
     */
    public function index(StudentRepository $studentRepository): Response
    {
        return $this->json($studentRepository->findAll(), 200, [], ['groups' => 'student:read']);
    }
}
