<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(ProduitRepository $repo, SessionInterface $session): Response
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'produits' => $repo->findAll()
        ]);
    }


    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, EntityManagerInterface $manager)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact->setCreated(new \DateTime());

            $contact->setContactDate(new \DateTime());


            $manager->persist($contact);
            $manager->flush();

            return $this->redirectToRoute('index/index.html.twig');
        }
        return $this->render('contact/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     *@route("/produits_liste", name="produits_liste") 
     */
    public function produits_liste(ProduitRepository $repo)
    {
        return $this->render('produit/produit_liste.html.twig', [
            'produits' => $repo->findAll()
        ]);
    }

    /**
     *@route("/produits/{id}", name="produit") 
     */
    public function produits($id, ProduitRepository $repo)
    {
        return $this->render('produit/produit.html.twig', [
            'produits' => $repo->findAll($id)
        ]);
    }

    /**
     *@route("/index_panier", name="panier") 
     */

    public function index_panier(SessionInterface $session, ProduitRepository $produitRepository)
    {
        $panier = $session->get('panier',[]);
        $panierinfo = [];
        foreach($panier as $id => $quantity){
            $panierinfo[]=[ 
                'product'=> $produitRepository->find($id),
                'quantity' => $quantity
            ];
        }

        return $this->render('index/index.html.twig', [
            'items' => $panierinfo
        ]);
    }
    /**
     * @route("/panier/add/{id}", name="add_panier")
     */
    public function add($id, SessionInterface $session)
    {
        $panier = $session->get('panier', []);
        if (!empty($panier[$id])) {
            $panier[$id]++;
        } else {
            $panier[$id] = 1;
        }
        $session->set('panier', $panier);
        dd($session->get('panier'));
    }
}
