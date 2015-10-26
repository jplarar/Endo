<?php

namespace EndoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class DashboardController extends Controller
{
    public function mainAction()
    {

        return $this->render('EndoBundle:Dashboard:main.html.twig', array(

        ));
    }

}
