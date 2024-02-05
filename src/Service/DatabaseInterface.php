<?php


// Là ou la classe est déclarée (où son fichier se trouve)
namespace App\Service;
use App\Entity\Lego;

class DatabaseInterface
{

    private array $legos = [];
    
    public function getAllLegos()
    {
        $data = file_get_contents(__DIR__ . '../../data.json');
        $legosData = json_decode($data);

        foreach ($legosData as $legoData) {
            $lego = new Lego(
                $legoData->id,
                $legoData->name,
                $legoData->collection
            );
            $lego->setDescription($legoData->description);
            $lego->setPrice($legoData->price);
            $lego->setPieces($legoData->pieces);
            $lego->setBoxImage($legoData->images->box);
            $lego->setLegoImage($legoData->images->bg);
            $this->legos[] = $lego;
        }
        return $this->legos;
    }   
}