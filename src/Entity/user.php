<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Criteria;

/**
 * 
 * @author ezechiel.kounougnan
 * 
 * Soundbuzz
 * 
 * 
 * @ORM\Table(name="user")
 * @ORM\Entity
 *
 */
class User {
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
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     */
    private $firstname;
    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     */
    private $lastname;
        /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;


    
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
    public function setFirstname($firstname) {
        $this->firstname = $firstname;
        return $this;
    }
    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname() {
        return $this->firstname;
    }
    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname) {
        $this->lastname = $lastname;
        return $this;
    }
    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname() {
        return $this->lastname;
    }
    /**
     * Set gender
     *
     * @param integer $gender
     *
     * @return User
     */
    public function setGender($gender) {
        $this->gender = $gender;
        return $this;
    }
    /**
     * Get gender
     *
     * @return integer
     */
    public function getGender() {
        return $this->gender;
    }
    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     *
     * @return User
     */
    public function setBirthdate($birthdate) {
        $this->birthdate = $birthdate;
        return $this;
    }
 
    /**
     * Set killed
     *
     * @param boolean $killed
     *
     * @return User 
     */
    public function setKilled($killed) {
        $this->killed = $killed;
        return $this;
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
     * @return User
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
   
}