<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prato
 *
 * @ORM\Table(name="prato", indexes={@ORM\Index(name="prato_FK", columns={"restaurante"})})
 * @ORM\Entity
 */
class Prato
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=100, nullable=false)
     */
    private $nome;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descricao", type="text", length=65535, nullable=true)
     */
    private $descricao;

    /**
     * @var string|null
     *
     * @ORM\Column(name="video", type="string", length=500, nullable=true)
     */
    private $video;

    /**
     * @var \Restaurante
     *
     * @ORM\ManyToOne(targetEntity="Restaurante")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="restaurante", referencedColumnName="id")
     * })
     */
    private $restaurante;


}
