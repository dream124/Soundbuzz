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
 * @ORM\Table(name="commentaire")
 * @ORM\Entity
 *
 */
class Commentary {
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
     * @ORM\Column(name="text", type="string", length=255, nullable=true)
     */
    private $text;
    /**
     * @var boolean
     *
     * @ORM\Column(name="killed", type="boolean", options={"default"=0})
     */
    private $killed = false;
    /**
     *  many commentary have one commentator
     * 
     * @ORM\ManyToOne(targetEntity="user")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * 
     */
    private $commentator;
  
    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }
        /**
     * Set lastname
     *
     * @param string $text
     *
     * @return Influencer
     */
    public function setText($text) {
        $this->text = $text;
        return $this;
    }
    /**
     * Get firstname
     *
     * @return string
     */
    public function getText() {
        return $this->text;
    }
    /**
     * Set commentarydate
     *
     * @param \DateTime $createdDate
     *
     * @return user
     */
    public function setCommentaryDate($commentaryDate) {
        $this->commentaryDate = $commentaryDate;
        return $this;
    }

   


    
}