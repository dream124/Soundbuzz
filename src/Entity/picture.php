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
 * @ORM\Table(name="picture")
 * @ORM\Entity
 *
 */
class Picture {
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
     */
    private $title;
    /**
     * @var string
     *
     * @ORM\OneToOne(targetEntity="track", inversedBy="picture")
     * @ORM\JoinColumn(name="track_id", referencedColumnName="id")
     *
     *@Assert\NotBlank(message="Upload the picture as a jpg or png file.")
     *@Assert\File(
     * maxSize = "2048k",
     * mimeTypes = {"image/png", "image/jpg", "image/jpeg", "image/gif"},
     * mimeTypesMessage = "Please upload a valid Picture"
     *)
     */
    private $track_pic; 
    public function getTrackPic(){
        return $this->track_pic;
    }
    public function setTrackPic($track_pic){
        $this->track_pic = $track_pic;
        return $this;
    }
  
    /**
     * @var boolean
     *
     * @ORM\Column(name="killed", type="boolean", options={"default"=0})
     */
    private $killed = false;

    
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
}