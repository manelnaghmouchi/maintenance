<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{

    private $jwtEncoder;
    private $em;

    public function __construct(JWTEncoderInterface $jwtEncoder, EntityManagerInterface $em)
    {
        $this->jwtEncoder = $jwtEncoder;
        $this->em = $em;

    }
    /**
     * @Route("/register", name="register", methods={"POST"})

     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {

        $user = new User();
       
        $email = $request->get("email");
        $password = $encoder->encodePassword($user, $request->get("password"));

        $user->setPassword($password);
        $user->setEmail($email);
        $user->setUsername($email);
        
        $this->em->persist($user);
        $this->em->flush();

        $response = array(
            'code' => 201,
            'message' => 'created',
            'result' => 'success'
        );

        return new JsonResponse($response, 201);
    }


}
