<?php

namespace App\Entity;

use App\Repository\AgenciaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: AgenciaRepository::class)]
class Agencia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 15)]
    private ?string $numeroAgencia = null;

    #[ORM\Column(length: 50)]
    private ?string $nome = null;

    #[ORM\Column(length: 255)]
    private ?string $endereco = null;

    #[ORM\Column(nullable: true)]
    private ?int $telefone = null;

    #[ORM\Column(length: 50)]
    private ?string $gerente = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $created = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroAgencia(): ?string
    {
        return $this->numeroAgencia;
    }

    public function setNumeroAgencia(string $numeroAgencia): self
    {
        $this->numeroAgencia = $numeroAgencia;

        return $this;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getEndereco(): ?string
    {
        return $this->endereco;
    }

    public function setEndereco(string $endereco): self
    {
        $this->endereco = $endereco;

        return $this;
    }

    public function getTelefone(): ?int
    {
        return $this->telefone;
    }

    public function setTelefone(?int $telefone): self
    {
        $this->telefone = $telefone;

        return $this;
    }

    public function getGerente(): ?string
    {
        return $this->gerente;
    }

    public function setGerente(string $gerente): self
    {
        $this->gerente = $gerente;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }
}
