<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Criteria;

/**
 * 
 * @author ezechiel.kounougnan
 * 
 * soundbuzz
 * 
 * @ORM\Table(name="categorie")
 * @ORM\Entity
 *
 */
class Categorie {
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", options={"unsigned":true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=255, nullable=true)
     */
    private $genre;


  
    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

   


    
}