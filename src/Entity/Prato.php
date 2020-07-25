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
     * @var string|null
     *
     * @ORM\Column(name="foto", type="string", length=500, nullable=true)
     */
    private $foto;

    /**
     * @var \Restaurante
     *
     * @ORM\ManyToOne(targetEntity="Restaurante")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="restaurante", referencedColumnName="id")
     * })
     */
    private $restaurante;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $data = 'CURRENT_TIMESTAMP';

    /**
     * @var string|null
     *
     * @ORM\Column(name="analise", type="text", length=65535, nullable=true)
     */
    private $analise;

    /**
     * @var float|null
     *
     * @ORM\Column(name="nota", type="float", nullable=true)
     */
    private $nota;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function getRestaurante(): ?Restaurante
    {
        return $this->restaurante;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function getAnalise(): ?string
    {
        return $this->analise;
    }

    public function getNota(): ?float {
        return $this->nota;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function setDescricao(?string $descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function setVideo(?string $video): self
    {
        $this->video = $video;

        return $this;
    }

    public function setFoto(?string $foto): self
    {
        $this->foto = $foto;

        return $this;
    }

    public function setRestaurante(?Restaurante $restaurante): self
    {
        $this->restaurante = $restaurante;

        return $this;
    }

    public function setData(\DateTimeInterface $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function setAnalise(?string $analise): self
    {
        $this->analise = $analise;
        return $this;
    }

    public function setNota(?float $nota): self
    {
        $this->nota = $nota;
        return $this;
    }
}
