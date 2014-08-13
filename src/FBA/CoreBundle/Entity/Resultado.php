<?php

namespace FBA\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Resultado
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="FBA\CoreBundle\Entity\ResultadoRepository")
 */
class Resultado
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
     * @ORM\Column(name="fecha_recepcion", type="datetime")
     */
    private $fechaRecepcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_analisis", type="datetime")
     */
    private $fechaAnalisis;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ingreso", type="datetime")
     */
    private $fechaIngreso;


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
     * Set fechaRecepcion
     *
     * @param \DateTime $fechaRecepcion
     * @return Resultado
     */
    public function setFechaRecepcion($fechaRecepcion)
    {
        $this->fechaRecepcion = $fechaRecepcion;

        return $this;
    }

    /**
     * Get fechaRecepcion
     *
     * @return \DateTime 
     */
    public function getFechaRecepcion()
    {
        return $this->fechaRecepcion;
    }

    /**
     * Set fechaAnalisis
     *
     * @param \DateTime $fechaAnalisis
     * @return Resultado
     */
    public function setFechaAnalisis($fechaAnalisis)
    {
        $this->fechaAnalisis = $fechaAnalisis;

        return $this;
    }

    /**
     * Get fechaAnalisis
     *
     * @return \DateTime 
     */
    public function getFechaAnalisis()
    {
        return $this->fechaAnalisis;
    }

    /**
     * Set fechaIngreso
     *
     * @param \DateTime $fechaIngreso
     * @return Resultado
     */
    public function setFechaIngreso($fechaIngreso)
    {
        $this->fechaIngreso = $fechaIngreso;

        return $this;
    }

    /**
     * Get fechaIngreso
     *
     * @return \DateTime 
     */
    public function getFechaIngreso()
    {
        return $this->fechaIngreso;
    }
    
    /**
     * @ORM\OneToMany(targetEntity="Muestra", mappedBy="resultado")
     */
    private $muestras;
    public function __construct()
    {
        $this->muestras = new \Doctrine\Common\Collections\ArrayCollection();
    }
    public function addMuestras(\FBA\CoreBundle\Entity\Muestra $muestras)
    {
        $this->muestras[] = $muestras;
    }

    public function getMuestras()
    {
        return $this->muestras;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Encuesta", inversedBy="resultados")
     * @ORM\JoinColumn(name="encuesta_id", referencedColumnName="id")
     * @return integer
     */
    private $encuesta;
    public function setEncuesta(\FBA\CoreBundle\Entity\Encuesta $encuesta)
    {
        $this->encuesta = $encuesta;
    }

    public function getEncuesta()
    {
        return $this->encuesta;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Laboratorio", inversedBy="resultados")
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

    /**
     * @ORM\ManyToOne(targetEntity="Analito", inversedBy="resultados")
     * @ORM\JoinColumn(name="analito_id", referencedColumnName="id")
     * @return integer
     */
    private $analito;
    public function setAnalito(\FBA\CoreBundle\Entity\Analito $analito)
    {
        $this->analito = $analito;
    }

    public function getAnalito()
    {
        return $this->analito;
    }



}
