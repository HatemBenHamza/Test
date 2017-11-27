<?php
/**
 * Created by PhpStorm.
 * User: chokri
 * Date: 25/11/17
 * Time: 10:08
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Entraineur
 * @package AppBundle\Entity
 * @ORM\Entity()
 * @ORM\Table(name="entraineur")
 */
class Entraineur
{
    public function __toString()
    {
        return (string)$this->getNomEntr();
    }

    /**
     * @var integer $id
     *
     * @ORM\Column(name="num_entr", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numEntr;
    /**
     * @ORM\Column(name="nom_entr", type="string", length=20, nullable=false)
     */
    private $nomEntr;
    /**
     * @ORM\Column(name="ville_entr", type="string", length=45, nullable=false)
     */
    private $villeEntr;
    /**
     * @ORM\Column(name="salaire_entr", type="decimal", precision=7, scale=2, nullable=false)
     */
    private $salaireEntr;

    /**
     * Get numEntr
     *
     * @return integer
     */
    public function getNumEntr()
    {
        return $this->numEntr;
    }

    /**
     * Set nomEntr
     *
     * @param string $nomEntr
     *
     * @return Entraineur
     */
    public function setNomEntr($nomEntr)
    {
        $this->nomEntr = $nomEntr;

        return $this;
    }

    /**
     * Get nomEntr
     *
     * @return string
     */
    public function getNomEntr()
    {
        return $this->nomEntr;
    }

    /**
     * Set villeEntr
     *
     * @param string $villeEntr
     *
     * @return Entraineur
     */
    public function setVilleEntr($villeEntr)
    {
        $this->villeEntr = $villeEntr;

        return $this;
    }

    /**
     * Get villeEntr
     *
     * @return string
     */
    public function getVilleEntr()
    {
        return $this->villeEntr;
    }

    /**
     * Set salaireEntr
     *
     * @param string $salaireEntr
     *
     * @return Entraineur
     */
    public function setSalaireEntr($salaireEntr)
    {
        $this->salaireEntr = $salaireEntr;

        return $this;
    }

    /**
     * Get salaireEntr
     *
     * @return string
     */
    public function getSalaireEntr()
    {
        return $this->salaireEntr;
    }
}
