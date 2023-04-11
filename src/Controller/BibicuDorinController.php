<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BibicuDorinController extends AbstractController
{
    #[Route('/index')]
    public function index(): Response
    {
        return $this->render('bibicu_dorin/index.html.twig', [
            'studentName' =>'Bibicu Dorin',
            'tagLine' => 'Follow your Vision. Be excellent to Yourself and Others',
            'joburi' => [
                [ 'name'=>'2000-2001 Profesor de matematică la Liceul Sfanta Maria Galati' ],
                [ 'name'=>'2001-2002 Profesor de matematică la Dunarea Galati' ],
                [ 'name'=>'2002-2004 Profesor de matematică la Liceul Eremia Grigorescu Tg. Bujor, Galati' ],
		[ 'name'=>'2004-2008 Profesor de informatica la Liceul Radu-Negru, Galati' ],
                [ 'name'=>'2008-prezent Profesor, gradul I, de informatica la Liceul Dunarea, Galati' ],
            ],

            'hobbies' => [
                ['name' => 'Listening to podcasts', 'icon'=>'fa-headphones'],
                ['name' => 'Football', 'icon'=>'fa-futbol'],
                ['name' => 'Traveling', 'icon'=>'fa-suitcase'],
                ['name' => 'Music', 'icon'=>'fa-music']
            ],
            'education' => [
                [
                    'schoolName'=>'Universitatea "Dunărea de Jos din Galați", Facultatea de Științe',
                    'description'=>'Licenta matematică-fizică',
                    'startYear'=>'1996',
                    'endYear'=>'2000'
                ],
                [
                    'schoolName'=>'Universitatea "Dunărea de Jos din Galați", Facultatea de Științe și Universitatea Le Havre, Franța',
                    'description'=>'Master Unde, vibrații și tehnici de control nedistructiv',
                    'startYear'=>'2001',
                    'endYear'=>'2002'
                ],
                [
                    'schoolName'=>'Universitatea "Dunărea de Jos din Galați", Facultatea de Științe',
                    'description'=>'Postunivesritare de specializare în informatică',
                    'startYear'=>'2002',
                    'endYear'=>'2004'
                ],
                [
                    'schoolName'=>'Universitatea "Dunărea de Jos din Galați", Facultatea de Științe și Laboratorul de Dinamică și Imagistică Cardiovasculară din Leuven, Belgia',
                    'description'=>'Doctorat Dezvoltarea de sisteme independente CAD pentru procesarea complexă a imaginilor 2D/3D',
                    'startYear'=>'2010',
                    'endYear'=>'2013'
                ]
            ]
                    
        ]);
    }

#[Route('/home')]
public function home(): Response
    {
        return $this->render('bibicu_dorin/index.html.twig', [
            'studentName' =>'Bibicu Dorin',
            'tagLine' => 'Follow your Vision. Be excellent to Yourself and Others',
            'joburi' => [
                [ 'name'=>'2000-2001 Profesor de matematică la Liceul Sfanta Maria Galati' ],
                [ 'name'=>'2001-2002 Profesor de matematică la Dunarea Galati' ],
                [ 'name'=>'2002-2004 Profesor de matematică la Liceul Eremia Grigorescu Tg. Bujor, Galati' ],
		        [ 'name'=>'2004-2008 Profesor de informatica la Liceul Radu-Negru, Galati' ],
                [ 'name'=>'2008-prezent Profesor, gradul I, de informatica la Liceul Dunarea, Galati' ],
            ]   
        ]);
    }

#[Route('/biografie')]
public function biografie(): Response
    {
        return $this->render('bibicu_dorin/biografie.html.twig', [
            'studentName' =>'Bibicu Dorin',
            'tagLine' => 'Follow your Vision. Be excellent to Yourself and Others',
            'joburi' => [
                [ 'name'=>'2000-2001 Profesor de matematică la Liceul Sfanta Maria Galati' ],
                [ 'name'=>'2001-2002 Profesor de matematică la Dunarea Galati' ],
                [ 'name'=>'2002-2004 Profesor de matematică la Liceul Eremia Grigorescu Tg. Bujor, Galati' ],
		        [ 'name'=>'2004-2008 Profesor de informatica la Liceul Radu-Negru, Galati' ],
                [ 'name'=>'2008-prezent Profesor, gradul I, de informatica la Liceul Dunarea, Galati' ],
            ]   
        ]);
    }


#[Route('/activitateaStiintifica')]
public function activitateaStiintifica(): Response
    {
        return $this->render('bibicu_dorin/activitateaStiintifica.html.twig', [
            'studentName' =>'Bibicu Dorin',
            'tagLine' => 'Follow your Vision. Be excellent to Yourself and Others',
            'joburi' => [
                [ 'name'=>'2000-2001 Profesor de matematică la Liceul Sfanta Maria Galati' ],
                [ 'name'=>'2001-2002 Profesor de matematică la Dunarea Galati' ],
                [ 'name'=>'2002-2004 Profesor de matematică la Liceul Eremia Grigorescu Tg. Bujor, Galati' ],
		        [ 'name'=>'2004-2008 Profesor de informatica la Liceul Radu-Negru, Galati' ],
                [ 'name'=>'2008-prezent Profesor, gradul I, de informatica la Liceul Dunarea, Galati' ],
            ]   
        ]);
    }

#[Route('/activitateaDidactica')]
public function activitateaDidactica(): Response
    {
        return $this->render('bibicu_dorin/activitateaDidactica.html.twig', [
            'studentName' =>'Bibicu Dorin',
            'tagLine' => 'Follow your Vision. Be excellent to Yourself and Others',
            'joburi' => [
                [ 'name'=>'2000-2001 Profesor de matematică la Liceul Sfanta Maria Galati' ],
                [ 'name'=>'2001-2002 Profesor de matematică la Dunarea Galati' ],
                [ 'name'=>'2002-2004 Profesor de matematică la Liceul Eremia Grigorescu Tg. Bujor, Galati' ],
		        [ 'name'=>'2004-2008 Profesor de informatica la Liceul Radu-Negru, Galati' ],
                [ 'name'=>'2008-prezent Profesor, gradul I, de informatica la Liceul Dunarea, Galati' ],
            ]   
        ]);
    }

#[Route('/contact')]
public function contact(): Response
    {
        return $this->render('bibicu_dorin/contact.html.twig', [
            'studentName' =>'Bibicu Dorin',
            'tagLine' => 'Follow your Vision. Be excellent to Yourself and Others',
            'joburi' => [
                [ 'name'=>'2000-2001 Profesor de matematică la Liceul Sfanta Maria Galati' ],
                [ 'name'=>'2001-2002 Profesor de matematică la Dunarea Galati' ],
                [ 'name'=>'2002-2004 Profesor de matematică la Liceul Eremia Grigorescu Tg. Bujor, Galati' ],
		        [ 'name'=>'2004-2008 Profesor de informatica la Liceul Radu-Negru, Galati' ],
                [ 'name'=>'2008-prezent Profesor, gradul I, de informatica la Liceul Dunarea, Galati' ],
            ]   
        ]);
    }


}

