<?php

namespace App\Entity;

use App\Repository\DetailRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DetailRepository::class)]
class Detail
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $detQuantite;

    #[ORM\Column(type: 'decimal', precision: 9, scale: 2)]
    private $detPrixHt;

    #[ORM\Column(type: 'decimal', precision: 4, scale: 2)]
    private $detTva;

    #[ORM\Column(type: 'decimal', precision: 9, scale: 2)]
    private $detPrixTtc;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $detDatePaiement;

    #[ORM\ManyToOne(targetEntity: Commande::class, inversedBy: 'details')]
    #[ORM\JoinColumn(nullable: false)]
    private $commande;

    #[ORM\ManyToOne(targetEntity: Article::class, inversedBy: 'details')]
    #[ORM\JoinColumn(nullable: false)]
    private $article;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDetQuantite(): ?int
    {
        return $this->detQuantite;
    }

    public function setDetQuantite(int $detQuantite): self
    {
        $this->detQuantite = $detQuantite;

        return $this;
    }

    public function getDetPrixHt(): ?string
    {
        return $this->detPrixHt;
    }

    public function setDetPrixHt(string $detPrixHt): self
    {
        $this->detPrixHt = $detPrixHt;

        return $this;
    }

    public function getDetTva(): ?string
    {
        return $this->detTva;
    }

    public function setDetTva(string $detTva): self
    {
        $this->detTva = $detTva;

        return $this;
    }

    public function getDetPrixTtc(): ?string
    {
        return $this->detPrixTtc;
    }

    public function setDetPrixTtc(string $detPrixTtc): self
    {
        $this->detPrixTtc = $detPrixTtc;

        return $this;
    }

    public function getDetDatePaiement(): ?\DateTimeInterface
    {
        return $this->detDatePaiement;
    }

    public function setDetDatePaiement(?\DateTimeInterface $detDatePaiement): self
    {
        $this->detDatePaiement = $detDatePaiement;

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): self
    {
        $this->commande = $commande;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }
}
