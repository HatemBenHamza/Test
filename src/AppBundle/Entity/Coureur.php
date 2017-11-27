<?php
/**
 * Created by PhpStorm.
 * User: chokri
 * Date: 25/11/17
 * Time: 10:02
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Coureur
 * @package AppBundle\Entity
 * @ORM\Entity()
 * @ORM\Table(name="coureur")
 */
class Coureur
{
    public function __toString()
    {
        return (string)$this->getNomCoureur();
    }

    /**
     * @var integer $id
     *
     * @ORM\Column(name="num_coureur", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numCoureur;
    /**
     * @ORM\Column(name="nom_coureur", type="string", length=30, nullable=false)
     */
    private $nomCoureur;
    /**
     * @ORM\Column(name="ville_coureur", type="string", length=30, nullable=false)
     */
    private $villeCoureur;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Entraineur",  cascade={"persist"})
     * @ORM\JoinColumn(name="num_entr", referencedColumnName="num_entr", nullable=true, onDelete="SET NULL")
     */
    private $entraineur;
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Participe", mappedBy="coureur", cascade={"persist"})
     */
    private $participes;

    /**
     * Get numCoureur
     *
     * @return integer
     */
    public function getNumCoureur()
    {
        return $this->numCoureur;
    }

    /**
     * Set nomCoureur
     *
     * @param string $nomCoureur
     *
     * @return Coureur
     */
    public function setNomCoureur($nomCoureur)
    {
        $this->nomCoureur = $nomCoureur;

        return $this;
    }

    /**
     * Get nomCoureur
     *
     * @return string
     */
    public function getNomCoureur()
    {
        return $this->nomCoureur;
    }

    /**
     * Set villeCoureur
     *
     * @param string $villeCoureur
     *
     * @return Coureur
     */
    public function setVilleCoureur($villeCoureur)
    {
        $this->villeCoureur = $villeCoureur;

        return $this;
    }

    /**
     * Get villeCoureur
     *
     * @return string
     */
    public function getVilleCoureur()
    {
        return $this->villeCoureur;
    }

    /**
     * Set entraineur
     *
     * @param \AppBundle\Entity\Entraineur $entraineur
     *
     * @return Coureur
     */
    public function setEntraineur(\AppBundle\Entity\Entraineur $entraineur = null)
    {
        $this->entraineur = $entraineur;

        return $this;
    }

    /**
     * Get entraineur
     *
     * @return \AppBundle\Entity\Entraineur
     */
    public function getEntraineur()
    {
        return $this->entraineur;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->participes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add participe
     *
     * @param \AppBundle\Entity\Participe $participe
     *
     * @return Coureur
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
