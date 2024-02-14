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

/* le nom de la classe doit être cohérent avec le nom du fichier */
class LegoController extends AbstractController
{
    private array $legos = [];

    #[Route('/')]
    public function home(DatabaseInterface $database)
    {   
        $this->legos = $database->getAllLegos();

        return $this->render('/lego.html.twig', [
            'legos' => $this->legos,
        ]);
    }


    #[Route('/{collection}', 'filter_by_collection', requirements: ['collection' => 'Creator|Star Wars|Creator Expert|Harry Potter'])]
    public function filter(DatabaseInterface $database, string $collection): Response
    {
        $legos = $database->getLegoByCollection($collection);
        return $this->render('/lego.html.twig', [
            'legos' => $legos,
        ]);
    }

    #[Route('/credits', 'credits')]
    public function credits(CreditsGenerator $credits): Response
    {
        return new Response($credits->getCredits());
    }


   // L’attribute #[Route] indique ici que l'on associe la route
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


