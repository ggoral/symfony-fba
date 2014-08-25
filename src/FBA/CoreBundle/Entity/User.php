<?php
// src/Acme/UserBundle/Entity/User.php

namespace FBA\CoreBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * Set name
     *
     * @param string $name
     * @return Analito
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

     /**
     * @ORM\ManyToOne(targetEntity="Laboratorio", inversedBy="usuarios")
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

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}

