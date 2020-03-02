<?php

namespace App\Controller;

use App\Entity\ShopUser;
use App\Entity\SyliusShopUser;
use App\Entity\ShopUser as ShopUserMain;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Doctrine\ORM\EntityManagerInterface;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils,EntityManagerInterface $em): Response
    {

        if ($this->getUser()) {
            return $this->redirectToRoute('sonata_admin_redirect');
        }

        $users = $this->getDoctrine()
        ->getRepository(SyliusShopUser::class)
        ->findAll();

//         // $shopUser = new  ShopUser();
//         // $em->persist($shopUser);
//         // $em->flush($shopUser);
//       // dd($shopUser);

        $customers = $this->getDoctrine()
        ->getRepository(SyliusShopUser::class, 'customer')
        ->findAll();

        $entityManager = $this->get('doctrine')->getManager('customer');
    
        foreach($customers as $c){
            $c->setUsername('usernam12e');
            $entityManager->persist($c);
        }
        $entityManager->flush();
        
        // dd($entityManager,$customers);

 
        // dd($users,$customers);
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('index/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
    }

}
