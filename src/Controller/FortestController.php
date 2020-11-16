<?php


namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class FortestController extends AbstractController
{

    /**
     * @Route("/noroles", name="no_roles")
     */
    public function noRoles()
    {
        return new ResponseAlias(
            '<html><body>no roles yet</body></html>'
        );


    }




}