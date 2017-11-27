<?php
/**
 * Created by PhpStorm.
 * User: chokri
 * Date: 25/11/17
 * Time: 09:59
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Participe
 * @package AppBundle\Entity
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ParticipeRepository")
 * @ORM\Table(name="participe")
 */
class Participe
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Course", inversedBy="participes", cascade={"persist"})
     * @ORM\JoinColumn(name="num_course", referencedColumnName="num_course", nullable=true, onDelete="SET NULL")
     */
    private $course;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Coureur", inversedBy="participes", cascade={"persist"})
     * @ORM\JoinColumn(name="num_coureur", referencedColumnName="num_coureur", nullable=true, onDelete="SET NULL")
     */
    private $coureur;
    /**
     * @ORM\Column(name="ordre", type="integer", nullable=true)
     */
    private $ordre;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ordre
     *
     * @param integer $ordre
     *
     * @return Participe
     */
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;

        return $this;
    }

    /**
     * Get ordre
     *
     * @return integer
     */
    public function getOrdre()
    {
        return $this->ordre;
    }

    /**
     * Set course
     *
     * @param \AppBundle\Entity\Course $course
     *
     * @return Participe
     */
    public function setCourse(\AppBundle\Entity\Course $course = null)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @return \AppBundle\Entity\Course
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * Set coureur
     *
     * @param \AppBundle\Entity\Coureur $coureur
     *
     * @return Participe
     */
    public function setCoureur(\AppBundle\Entity\Coureur $coureur = null)
    {
        $this->coureur = $coureur;

        return $this;
    }

    /**
     * Get coureur
     *
     * @return \AppBundle\Entity\Coureur
     */
    public function getCoureur()
    {
        return $this->coureur;
    }
}
