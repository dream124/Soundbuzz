<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Criteria;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * 
 * @author ezechiel.kounougnan
 * 
 * soundbuzz
 * 
 * @ORM\Table(name="track")
 * @ORM\Entity
 *
 */
class Track {
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
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Please,add a title to your track.")
     */
    private $title;
        /**
     * @var string
     *
     * @ORM\OneToOne(targetEntity="picture", mappedBy="track")
     * 
     */
    private $coverpicture; 

    /**
     * @var string
     *
     * @ORM\Column(name="song", type="string")
     * 
     *
     *@Assert\NotBlank(message="Upload the track as a jpg or png file.")
     *@Assert\File(
     * mimeTypes = {"tracks/mp3", "tracks/wav"},
     * mimeTypesMessage = "Please upload a valid Picture"
     *)
     */
    private $song; 

    /**
     * @var boolean
     *
     * @ORM\Column(name="explicit", type="boolean", options={"default"=0})
     */
    private $explicit;
    /**
     * @var boolean
     *
     * @ORM\Column(name="download", type="boolean", options={"default"=0})
     */
    private $download;
    /**
     * @var boolean
     *
     * @ORM\Column(name="killed", type="boolean", options={"default"=0})
     */
    private $killed = false;

    /** @ORM\Column(type="datetime") */
    private $created;
   
    public function __construct(\DateTime $createDate)
    {
        $this->created = $createDate;
    }
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return user
     */
    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }
    /**
     * Get title
     *
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }
   
    /**
     * Get killed
     *
     * @return boolean
     */
    public function getKilled() {
        return $this->killed;
    }
    /**
     * Set killedDate
     *
     * @param \DateTime $killedDate
     *
     * @return user
     */
    public function setKilledDate($killedDate) {
        $this->killedDate = $killedDate;
        return $this;
    }
    /**
     * Get killedDate
     *
     * @return \DateTime
     */
    public function getKilledDate() {
        return $this->killedDate;
    }
 
    /**
     * Get track
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTrack() {
        return $this->track;
    }
    public function getSong(){
        return $this->song;
    }
    public function setSong($song)
    {
        $this->song = $song;
        return $this;
    }

}