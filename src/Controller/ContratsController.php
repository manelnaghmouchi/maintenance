<?php

namespace App\Controller;
use App\Entity\Contrats;
use App\Entity\Societes;
use App\Entity\ContratsMachines;
use App\Entity\Machines;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Annotation\Route;
class ContratsController extends AbstractController
{
    private $em;
    private $slugger;

    public function __construct(SluggerInterface $slugger, EntityManagerInterface $em)
    {

        $this->em = $em;
        $this->slugger = $slugger;
    }
    /**
     * @throws TransportExceptionInterface
     * @Route("/client", name="get_clients", methods={"GET"})
     */
    public  function getClients()
    {
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $em = $this->getDoctrine()->getManager()->getRepository(Contrats::class)->findAll();
        $normalizer = new ObjectNormalizer($classMetadataFactory);
        $serializer = new Serializer([$normalizer]);
        $data = $serializer->normalize($em, null, ['groups' => 'clients']);


        $societe = $this->getDoctrine()->getManager()->getRepository(Societes::class)->findAll();
        $data1 = $serializer->normalize($societe, null, ['groups' => 'societes']);

        $societeTable=[];
        foreach ($data as $item){
        foreach ($data1 as $item1){

            if ($item1['id'] == $item['societesId']){
                $societeTable[]= $item1;
            }
            }

        }


      return $this->render('clients/client.html.twig', [
           'clients' => $data,'societe' => $societeTable,
        ]);

    }
    /**
     * @throws TransportExceptionInterface
     * @Route("/client/{id}", name="get_client_By_Id", methods={"GET"})
     */
    public  function getClientsById($id)
    {
        $client = $this->getDoctrine()->getRepository(Contrats::class)->findOneBy(['id' => $id]);
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $normalizer = new ObjectNormalizer($classMetadataFactory);
        $serializer = new Serializer([$normalizer]);
        $data = $serializer->normalize($client, null, ['groups' => 'clients']);
        $societe = $this->getDoctrine()->getManager()->getRepository(Societes::class)->findAll();
        $data1 = $serializer->normalize($societe, null, ['groups' => 'societes']);
        $contrat = $this->getDoctrine()->getManager()->getRepository(ContratsMachines::class)->findAll();
        $data2 = $serializer->normalize($contrat, null, ['groups' => 'contrat']);
        $machine = $this->getDoctrine()->getManager()->getRepository(Machines::class)->findAll();
        $data3 = $serializer->normalize($machine, null, ['groups' => 'machines']);


        return $this->render('clients/view.html.twig', [
            'clients' => $data,'societe' => $data1,'contrat' => $data2,'machine' => $data3,
        ]);

    }
}