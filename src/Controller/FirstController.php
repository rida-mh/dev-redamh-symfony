<?php

namespace App\Controller;
use App\Entity\User;
use App\Form\PetsType;
//use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Persistence\ObjectManager;

use App\Repository\PetRepository;
use App\Entity\Owner;
use App\Entity\Pet;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

use Symfony\Component\HttpFoundation\Request;



/**
 * @Route("/admin")
 */

class FirstController extends AbstractController
{


private $Repository;

public function __construct(PetRepository $Repository, EntityManagerInterface  $em)
{
	$this->Repository = $Repository;
	$this->em = $em;
}


    /**
     * @Route("/", name="admin")
     * @return ResponseAlias
     */

    public function index()
{

    $pet= $this->Repository->findAll();
    return $this->render('admin/pet/index.html.twig', compact('pet'));

}

    /**
     * @Route("/add", name="admin.pet.add")
     * @param Request $request
     */

public function add(Request $request)
{
        $Pet = new Pet();
    $form = $this->createForm(PetsType::class, $Pet);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($Pet);
            $em->flush();

            return $this->redirectToRoute('admin');
        }

        return $this->render('admin/pet/ajouter.html.twig', [
            'Pet' => $Pet,
            "form" => $form->createView()
        ]);


}

    /**
     * @Route("/{id}/edit", name="pet_edit", methods={"GET","POST"})
     * @param Pet $pet
     * @param Request $request
     * @return ResponseAlias
     */

    public function edit(Pet $pet, Request $request)
    {
      $form =  $this->createForm(PetsType::class, $pet);
      $form->handleRequest($request);

      if($form->isSubmitted() && $form->isValid())
      {
          $this->em->flush();
          return $this->render('admin/pet/index.html.twig', [
          'pet' => $pet,
            'form' => $form->createView()
        ]);
      }

        return $this->render('admin/pet/edit.html.twig', [
            'pet' => $pet,
            'form' => $form->createView()
        ]);


    }


    /**
     * @Route("/{id}/delete", name="pet_delete")
     * @param Pet $pet
     * @return RedirectResponse
     */
    public function delete(Pet $pet): RedirectResponse
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($pet);
        $em->flush();

        return $this->redirectToRoute("admin");
    }




}