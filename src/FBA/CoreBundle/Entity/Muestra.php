<?php

namespace FBA\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Muestra
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="FBA\CoreBundle\Entity\MuestraRepository")
 */
class Muestra
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
     * @var integer
     *
     * @ORM\Column(name="valor_resultado", type="integer")
     */
    private $valorResultado;

    /**
     * @var string
     *
     * @ORM\Column(name="interpretacion", type="string", length=255)
     */
    private $interpretacion;

    /**
     * @var string
     *
     * @ORM\Column(name="decision", type="string", length=255)
     */
    private $decision;


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
     * Set valorResultado
     *
     * @param integer $valorResultado
     * @return Muestra
     */
    public function setValorResultado($valorResultado)
    {
        $this->valorResultado = $valorResultado;

        return $this;
    }

    /**
     * Get valorResultado
     *
     * @return integer 
     */
    public function getValorResultado()
    {
        return $this->valorResultado;
    }

    /**
     * Set interpretacion
     *
     * @param string $interpretacion
     * @return Muestra
     */
    public function setInterpretacion($interpretacion)
    {
        $this->interpretacion = $interpretacion;

        return $this;
    }

    /**
     * Get interpretacion
     *
     * @return string 
     */
    public function getInterpretacion()
    {
        return $this->interpretacion;
    }

    /**
     * Set decision
     *
     * @param string $decision
     * @return Muestra
     */
    public function setDecision($decision)
    {
        $this->decision = $decision;

        return $this;
    }

    /**
     * Get decision
     *
     * @return string 
     */
    public function getDecision()
    {
        return $this->decision;
    }
}
