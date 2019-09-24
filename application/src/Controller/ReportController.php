<?php

namespace App\Controller;

use App\Entity\Event;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ReportController extends AbstractController
{
    /**
     * @Route("/api/report", name="report")
     */
    public function index(Request $request, EntityManagerInterface $entityManager)
    {

        $groupBy = $request->get('group_by');

        $query = "SELECT $groupBy, COUNT($groupBy) as `count` 
                    FROM event
                    GROUP BY $groupBy";

        $statement = $entityManager->getConnection()->prepare($query);
        $statement->execute();
        $report = $statement->fetchAll();


        return $this->render('report/index.html.twig', [
            'report' => $report,
        ]);


    }
}
