<?php

namespace App\Controller;
use App\Form\PetsType;
//use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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

class FirstController extends AbstractController
{


private $Repository;

public function __construct(PetRepository $Repository, EntityManagerInterface  $em)
{
	$this->Repository = $Repository;
	$this->em = $em;
}


    /**
     * @Route("/admin", name="admin")
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
     * @Route("/admin/{id}", name="admin.pet.edit")
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
     * @Route("/acceuil", name="show")
     */

public function show() : ResponseAlias
{
    $pet = $this->Repository->findbygender();
//$pet[0] = setcrossed('1');
	$this->em = flush();

	//dump($pet);


	/*
	 $owner1 = $this->getDoctrine()
        ->getRepository(Owner::class)
        ->findAll();

    if (!$owner1) {
        throw $this->createNotFoundException(
            'No owner1 found for id'
        );
    }
	
	var_dump($owner1);
	*/
	
	/*
$em = $this->getDoctrine()->getManager();
$query = $em->createQuery('SELECT * FROM pet LIMIT 10');
//$users = $query->getResult(); // array of ForumUser objects

return $query->getResult();
//print_r($query);


$em = $this->getDoctrine()->getManager();
$query = $em->createQuery(
    'SELECT * FROM pet LIMIT 10');
 
$products = $query->getResult();
*/ 



/*
 $owner1 = $this->getDoctrine()
        ->getRepository(Owner::class)
        ->findAll();

    if (!$owner1) {
        throw $this->createNotFoundException(
            'No owner1 found for id'
        );
    }

 $pet1 = $this->getDoctrine()
        ->getRepository(Pet::class)
        ->findAll();

    if (!$pet1) {
        throw $this->createNotFoundException(
            'No pet1 found for id'
        );
    }


*/

 //print_r($owner1);
 
 //return $this->render('acceuil/show.html.twig', ['owner1' => $owner1,'pet1' => $pet1]);
 return $this->render('acceuil/show.html.twig');




   // return new Response('Check out this great owner: '.$owner->getName());
    //return  $owner;






    // or render a template
    // in the template, print things with {{ owner.name }}
    // return $this->render('owner/show.html.twig', ['owner' => $owner]);
}


}