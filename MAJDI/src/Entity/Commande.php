<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 */
class Commande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Product;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prixTot;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prixLiv;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): ?string
    {
        return $this->Product;
    }

    public function setProduct(string $Product): self
    {
        $this->Product = $Product;

        return $this;
    }

    public function getPrixTot(): ?string
    {
        return $this->prixTot;
    }

    public function setPrixTot(string $prixTot): self
    {
        $this->prixTot = $prixTot;

        return $this;
    }

    public function getPrixLiv(): ?string
    {
        return $this->prixLiv;
    }

    public function setPrixLiv(string $prixLiv): self
    {
        $this->prixLiv = $prixLiv;

        return $this;
    }
}
