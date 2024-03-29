<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeRepository::class)]
class Type
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $typNom;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypNom(): ?string
    {
        return $this->typNom;
    }

    public function setTypNom(string $typNom): self
    {
        $this->typNom = $typNom;

        return $this;
    }

    public function __toString()
    {
        return $this->typNom;
    }
}
