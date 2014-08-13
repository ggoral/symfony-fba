<?php

namespace FBA\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vigencia
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="FBA\CoreBundle\Entity\VigenciaRepository")
 */
class Vigencia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_alta", type="datetime")
     */
    private $fechaAlta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_baja", type="datetime")
     */
    private $fechaBaja;


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
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     * @return Vigencia
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    /**
     * Get fechaAlta
     *
     * @return \DateTime 
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    /**
     * Set fechaBaja
     *
     * @param \DateTime $fechaBaja
     * @return Vigencia
     */
    public function setFechaBaja($fechaBaja)
    {
        $this->fechaBaja = $fechaBaja;

        return $this;
    }

    /**
     * Get fechaBaja
     *
     * @return \DateTime 
     */
    public function getFechaBaja()
    {
        return $this->fechaBaja;
    }
    
    // ...
    /**
     * @ORM\ManyToMany(targetEntity="Analito", mappedBy="vigencias")
     */
    private $analitos;

    public function __construct() {
        $this->analitos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @ORM\ManyToOne(targetEntity="Laboratorio", inversedBy="vigencias")
     * @ORM\JoinColumn(name="laboratorio_id", referencedColumnName="id")
     * @return integer
     */
    private $laboratorio;
    public function setLaboratorio(\FBA\CoreBundle\Entity\Laboratorio $laboratorio)
    {
        $this->laboratorio = $laboratorio;
    }

    public function getLaboratorio()
    {
        return $this->laboratorio;
    }


}
