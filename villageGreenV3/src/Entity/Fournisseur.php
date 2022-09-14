<?php

namespace App\Entity;

use App\Repository\FournisseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FournisseurRepository::class)]
class Fournisseur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $fouNom;

    #[ORM\Column(type: 'string', length: 255)]
    private $fouAdresse;

    #[ORM\Column(type: 'string', length: 5)]
    private $fouCodePostal;

    #[ORM\Column(type: 'string', length: 255)]
    private $fouCommune;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fouMail;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $fouTelephone;

    #[ORM\OneToMany(mappedBy: 'Fournisseur', targetEntity: Article::class)]
    private $articles;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFouNom(): ?string
    {
        return $this->fouNom;
    }

    public function setFouNom(string $fouNom): self
    {
        $this->fouNom = $fouNom;

        return $this;
    }

    public function getFouAdresse(): ?string
    {
        return $this->fouAdresse;
    }

    public function setFouAdresse(string $fouAdresse): self
    {
        $this->fouAdresse = $fouAdresse;

        return $this;
    }

    public function getFouCodePostal(): ?string
    {
        return $this->fouCodePostal;
    }

    public function setFouCodePostal(string $fouCodePostal): self
    {
        $this->fouCodePostal = $fouCodePostal;

        return $this;
    }

    public function getFouCommune(): ?string
    {
        return $this->fouCommune;
    }

    public function setFouCommune(string $fouCommune): self
    {
        $this->fouCommune = $fouCommune;

        return $this;
    }

    public function getFouMail(): ?string
    {
        return $this->fouMail;
    }

    public function setFouMail(?string $fouMail): self
    {
        $this->fouMail = $fouMail;

        return $this;
    }

    public function getFouTelephone(): ?string
    {
        return $this->fouTelephone;
    }

    public function setFouTelephone(?string $fouTelephone): self
    {
        $this->fouTelephone = $fouTelephone;

        return $this;
    }

    /**
     * @return Collection<int, Article>
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $article->setFournisseur($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getFournisseur() === $this) {
                $article->setFournisseur(null);
            }
        }

        return $this;
    }
}
