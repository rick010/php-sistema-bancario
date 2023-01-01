<?php

namespace App\Entity;

use App\Repository\ClienteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use PhpParser\Node\Expr\Cast\String_;

#[ORM\Entity(repositoryClass: ClienteRepository::class)]
class Cliente
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 6)]
    private ?float $mensalidade = 10.00;

    #[ORM\Column(length: 50)]
    private ?string $nome = null;

    #[ORM\Column(length: 50)]
    private ?string $email = null;

    #[ORM\Column(length: 15)]
    private ?string $senha = null;

    #[ORM\Column]
    private ?float $saldo = 0.0;

    #[ORM\Column]
    private ?bool $status = false;

    #[ORM\Column(length: 2)]
    private ?String $tipo = 'CC';

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $created = null;


    public function getId(): ?int
    {
        return $this->id;
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

    public function getMenslidade(): ?float
    {
        return $this->mensalidade;
    }

    public function setMenslidade(float $mensalidade): self
    {
        $this->mensalidade = $mensalidade;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSenha(): ?string
    {
        return $this->senha;
    }

    public function setSenha(string $senha): self
    {
        $this->senha = $senha;

        return $this;
    }

    public function getSaldo(): ?float
    {
        return $this->saldo;
    }

    public function setSaldo(float $saldo): self
    {
        $this->saldo = $saldo;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getTipo(): ?String
    {
        return $this->tipo;
    }

    public function setTipo(String $tipo): self
    {
        $this->tipo = $tipo;

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

    public function abrirConta($tipo){
        $this->setTipo($tipo);
        $this->setStatus(true);
    }

    public function fecharConta(){
        if($this->getSaldo() == 0) {
            $this->setStatus(false);
         }else if($this->getSaldo() < 0){
            throw new Exception("Seu saldo está negativo R$' . $this->getSaldo() . ' Favor dirija-se a sua agência");
        }else {
            throw new Exception("Seu saldo está positivo R$' . $this->getSaldo() . ' Favor saque o todo o valor de saldo");
        }

    }

    public function depositar($valor) {
        if ($this->getStatus()){
            $this->setSaldo($this->getSaldo() + $valor);
        }else {
            throw new Exception("Favor a uma conta ou reative uma existente!");
        }
    }

    public function saque(float $valor): self
    {
        if($this->getStatus() && $this->getSaldo() > $valor) {
            $this->setSaldo($this->getSaldo() - $valor);
        }else if($this->getStatus()){
            throw new Exception("Conta fechada");
        }else{
            throw new Exception("Saldo insuficiente");
        }
        return $this;
    }

    public function pagarMensalidade(){
        if($this->getStatus() === false) {
            throw new Exception("Conta fechada");
        }
        if($this->getTipo() == "CC" && $this->getStatus() == true) {
            $this->saque($this->getMenslidade());
        }else {
            throw new Exception("Saldo insuficiente");
        }
    }

    public function renderJurus(){
        if ($this->getStatus() == true && $this->getTipo() == 'CP'){
            $this->setSaldo($this->getSaldo() + $this->getSaldo()*0.01);
        }else {
            throw new Exception("Favor a uma conta ou reative uma existente!");
        }
    }

}
