<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Criteria;

/**
 * 
 * @author ezechiel.kounougnan
 * 
 * user soundbuzz
 * 
 * @ORM\Table(name="playlist")
 * @ORM\Entity
 *
 */
class Playlist {
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
     * @var text
     *
     * @ORM\Column(name="description", type="text", length=500, nullable=true)
     */
    private $description;


/**
     *  one playslist contains multiple tracks 
     * 
     * @ORM\OneToMany(targetEntity="track",mappedBy="user")
     * @ORM\JoinTable (name="track",
     *      joinColumns={@ORM\JoinColumn (name="playlist_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="track_id", referencedColumnName="id")}
     * )
     * 
     */
    private $tracks;

    public function __construct()
    {
        $this->tracks = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     *  multiple playlists have one owner
     * 
     * @ORM\ManyToOne(targetEntity="user")
     * @ORM\JoinColumn(name="playlist_id", referencedColumnName="id")
     * 
     */
    private $owner;
    /**
     * @var boolean
     *
     * @ORM\Column(name="killed", type="boolean", options={"default"=0})
     */
    private $killed = false;
    /**
     * @var datetime
     *
     * @ORM\Column(name="killed_date", type="datetime", nullable=true)
     */
    private $killedDate;
    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }
    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Influencer
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
     * Get killedDate
     *
     * @return \DateTime
     */
    public function getKilledDate() {
        return $this->killedDate;
    }
    /**
     * Add track
     *
     * @param \Soundbuzz\Entity\Playlist $track
     *
     * @return Playlist
     */
    public function addTrack(\Soundbuzz\Entity\Playlist $track) {
        $this->playlist[] = $track;
        return $this;
    }

    
}