<?php

namespace FBA\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Analito
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="FBA\CoreBundle\Entity\AnalitoRepository")
 */
class Analito
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
     * @var string
     *
     * @ORM\Column(name="metodo", type="string", length=255)
     */
    private $metodo;

    /**
     * @var string
     *
     * @ORM\Column(name="calibrador", type="string", length=255)
     */
    private $calibrador;

    /**
     * @var string
     *
     * @ORM\Column(name="reactivo", type="string", length=255)
     */
    private $reactivo;

    /**
     * @var string
     *
     * @ORM\Column(name="papel_filtro", type="string", length=255)
     */
    private $papelFiltro;

    /**
     * @var string
     *
     * @ORM\Column(name="valor_corte", type="string", length=255)
     */
    private $valorCorte;

    /**
     * @var string
     *
     * @ORM\Column(name="comentario", type="text")
     */
    private $comentario;


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
     * Set metodo
     *
     * @param string $metodo
     * @return Analito
     */
    public function setMetodo($metodo)
    {
        $this->metodo = $metodo;

        return $this;
    }

    /**
     * Get metodo
     *
     * @return string 
     */
    public function getMetodo()
    {
        return $this->metodo;
    }

    /**
     * Set calibrador
     *
     * @param string $calibrador
     * @return Analito
     */
    public function setCalibrador($calibrador)
    {
        $this->calibrador = $calibrador;

        return $this;
    }

    /**
     * Get calibrador
     *
     * @return string 
     */
    public function getCalibrador()
    {
        return $this->calibrador;
    }

    /**
     * Set reactivo
     *
     * @param string $reactivo
     * @return Analito
     */
    public function setReactivo($reactivo)
    {
        $this->reactivo = $reactivo;

        return $this;
    }

    /**
     * Get reactivo
     *
     * @return string 
     */
    public function getReactivo()
    {
        return $this->reactivo;
    }

    /**
     * Set papelFiltro
     *
     * @param string $papelFiltro
     * @return Analito
     */
    public function setPapelFiltro($papelFiltro)
    {
        $this->papelFiltro = $papelFiltro;

        return $this;
    }

    /**
     * Get papelFiltro
     *
     * @return string 
     */
    public function getPapelFiltro()
    {
        return $this->papelFiltro;
    }

    /**
     * Set valorCorte
     *
     * @param string $valorCorte
     * @return Analito
     */
    public function setValorCorte($valorCorte)
    {
        $this->valorCorte = $valorCorte;

        return $this;
    }

    /**
     * Get valorCorte
     *
     * @return string 
     */
    public function getValorCorte()
    {
        return $this->valorCorte;
    }

    /**
     * Set comentario
     *
     * @param string $comentario
     * @return Analito
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;

        return $this;
    }

    /**
     * Get comentario
     *
     * @return string 
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * @ORM\ManyToMany(targetEntity="Vigencia")
     * @ORM\JoinTable(name="analito_vigencia",
     *     joinColumns={@ORM\JoinColumn(name="analito_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="vigencia_id", referencedColumnName="id")}
     * )
     */
    protected $analito_vigencias;
 
    public function __construct()
    {
        $this->analito_vigencias = new \Doctrine\Common\Collections\ArrayCollection();
    }
}
