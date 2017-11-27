<?php
/**
 * Created by PhpStorm.
 * User: chokri
 * Date: 25/11/17
 * Time: 09:50
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Course
 * @package AppBundle\Entity
 * @ORM\Entity()
 * @ORM\Table(name="course")
 */
class Course
{
    public function __toString()
    {
        return (string)$this->getLibCourse();
    }
    /**
     * @var integer $id
     *
     * @ORM\Column(name="num_course", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numCourse;
    /**
     * @ORM\Column(name="lib_course", type="string", length=20, nullable=false)
     */
    private $libCourse;
    /**
     * @ORM\Column(name="ville_course", type="string", length=45, nullable=false)
     */
    private $villeCOurse;
    /**
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Participe", mappedBy="course", cascade={"persist"})
     */
    private $participes;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->participes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get numCourse
     *
     * @return integer
     */
    public function getNumCourse()
    {
        return $this->numCourse;
    }

    /**
     * Set libCourse
     *
     * @param string $libCourse
     *
     * @return Course
     */
    public function setLibCourse($libCourse)
    {
        $this->libCourse = $libCourse;

        return $this;
    }

    /**
     * Get libCourse
     *
     * @return string
     */
    public function getLibCourse()
    {
        return $this->libCourse;
    }

    /**
     * Set villeCOurse
     *
     * @param string $villeCOurse
     *
     * @return Course
     */
    public function setVilleCOurse($villeCOurse)
    {
        $this->villeCOurse = $villeCOurse;

        return $this;
    }

    /**
     * Get villeCOurse
     *
     * @return string
     */
    public function getVilleCOurse()
    {
        return $this->villeCOurse;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Course
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }



    /**
     * Add participe
     *
     * @param \AppBundle\Entity\Participe $participe
     *
     * @return Course
     */
    public function addParticipe(\AppBundle\Entity\Participe $participe)
    {
        $this->participes[] = $participe;

        return $this;
    }

    /**
     * Remove participe
     *
     * @param \AppBundle\Entity\Participe $participe
     */
    public function removeParticipe(\AppBundle\Entity\Participe $participe)
    {
        $this->participes->removeElement($participe);
    }

    /**
     * Get participes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParticipes()
    {
        return $this->participes;
    }
}
