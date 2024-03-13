<?php


/* indique où "vit" ce fichier */
namespace App\Controller;

/* indique l'utilisation du bon bundle pour gérer nos routes */
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use stdClass;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Lego;
use App\Service\CreditsGenerator;
use App\Service\DatabaseInterface;
use Symfony\Component\VarDumper\Cloner\Data;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Entity;
use App\Repository\LegoCollectionRepository;
use App\Entity\LegoCollection;

// public function findByCollection($value): array
// {
//     return $this->createQueryBuilder('l')
//         ->andWhere('l.exampleField = :val')
//         ->setParameter('val', $value)
//         ->orderBy('l.id', 'ASC')
//         ->setMaxResults(10)
//         ->getQuery()
//         ->getResult()
//     ;
// }

/* le nom de la classe doit être cohérent avec le nom du fichier */
class LegoController extends AbstractController
{
    private array $legos = [];

    // mettre à jour votre Controller pour remplacer l’ancien service DatabaseInterface par celui de Doctrine PopulateDatabaseCommand
    // Commencez par mettre à jour la route principale (“/”) sachant que tout MachinRepository possède une méthode findAll() qui retourne un tableau de toutes les entités Machin disponibles dans la base
    #[Route('/')]
    public function home(EntityManagerInterface $legoManager): Response
    {
        $legos = $legoManager->getRepository(Lego::class)->findAll();
        $collections = $legoManager->getRepository(LegoCollection::class)->findAll();

        return $this->render('/lego.html.twig', [
            'legos' => $legos,
            'collections' => $collections,
        ]);
    }

#[Route('/{name}', 'filter_by_collection', requirements: ['name' => 'Creator|Star Wars|Creator Expert|Harry Potter'])]
public function filterByCollection(LegoCollection $collection, LegoCollectionRepository $collectionRepository): Response
{
    $legos = $collection->getLego();
    $collections = $collectionRepository->findAll();

    return $this->render('/lego.html.twig', [
        'legos' => $legos,
        'collections' => $collections,
    ]);
}

    #[Route('/credits', 'credits')]
    public function credits(CreditsGenerator $credits): Response
    {
        return new Response($credits->getCredits());
    }

    #[Route('/test', 'test')]
    public function createProduct(EntityManagerInterface $legoManager): Response
    {
        // chargez le json, créez un Lego pour chaque modèle et sauvegardez le dans votre base.
        // php bin/console app:populate-database src/Data/data.json
        $json = file_get_contents(__DIR__ . '/../Data/data.json');
        $legos = json_decode($json, true);
        
        
        foreach ($legos as $lego) {
            $l = new Lego($lego['id'], $legoManager);
            $l->setName($lego['name']);
            $l->setCollection($lego['collection']);
            $l->setDescription($lego['description']);
            $l->setPrice($lego['price']);
            $l->setPieces($lego['pieces']);
            $l->setBoxImage($lego['imagebox']);
            $l->setLegoImage($lego['imagebg']);
            $legoManager->persist($l);
        }
    
        $legoManager -> flush();

        return new Response("Lego ajouté avec comme id : " . $l->getId());
        
    }

    #[Route('/test/{name}', 'test')]
    public function test(LegoCollection $collection): Response
    {
        dd($collection);
    }





//    Lattribute #[Route] indique ici que lon associe la route
   // "/" à la méthode home pour que Symfony l'exécute chaque fois
   // que l'on accède à la racine de notre site.

    // #[Route('/')]
    // public function home()
    // {   
    //     $cocci = new stdClass();
    //     $cocci->collection = "Creator Expert";
    //     $cocci->id = 10252;
    //     $cocci->name = "La coccinelle Volkwagen";
    //     $cocci->description = "Construis une réplique LEGO® Creator Expert de l'automobile la plus populaire au monde. Ce magnifique modèle LEGO est plein de détails authentiques qui capturent le charme et la personnalité de la voiture, notamment un coloris bleu ciel, des ailes arrondies, des jantes blanches avec des enjoliveurs caractéristiques, des phares ronds et des clignotants montés sur les ailes.";
    //     $cocci->price = 94.99;
    //     $cocci->pieces = 1167;
    //     $cocci->boxImage = "LEGO_10252_Box.png";
    //     $cocci->legoImage = "LEGO_10252_Main.jpg";

    //     return $this->render('/lego.html.twig', [
    //         'cocci' => $cocci,
    //     ]);
    // }



   #[Route('/me', )]
   public function Me()
   {
       die("Get lost.");
   }
}


