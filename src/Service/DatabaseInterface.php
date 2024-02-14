<?php


// Là ou la classe est déclarée (où son fichier se trouve)
namespace App\Service;
use App\Entity\Lego;



class DatabaseInterface
{

    private array $legos = [];
    
    public function getAllLegos()
    {
        $sql = 'SELECT * FROM lego';

        $pdo = new \PDO('mysql:host=tp-symfony-mysql;dbname=lego_store', 'root', 'root');
        $statement = $pdo->query('SELECT * FROM lego');
        $legosData = $statement->fetchAll();
        

        foreach ($legosData as $legoData) {
            $lego = new Lego(
                $legoData["id"],
                $legoData["name"],
                $legoData["collection"]
            );
            $lego->setDescription($legoData["description"]);
            $lego->setPrice($legoData["price"]);
            $lego->setPieces($legoData["pieces"]);
            $lego->setBoxImage($legoData["imagebox"]);
            $lego->setLegoImage($legoData["imagebg"]);
            $this->legos[] = $lego;
        }
        return $this->legos;        
    }   



    public function getLegoByCollection(string $collection)
    {
        return array_filter($this->legos, function ($lego) use ($collection) {
            return $lego->getCollection() === $collection;
        });
        
    }

}