<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $comDateCreation;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $comDateValidation;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $comStatut;

    #[ORM\Column(type: 'text', nullable: true)]
    private $comCommentaire;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $comAdresseFacture;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $comAdresseFacture2;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $comAdresseFacture3;

    #[ORM\Column(type: 'string', length: 5, nullable: true)]
    private $comCodePostalFacture;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $comCommuneFacture;



    



    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private $utilisateur;

    #[ORM\OneToMany(mappedBy: 'commande', targetEntity: Detail::class, orphanRemoval: true)]
    private $details;

    #[ORM\OneToMany(mappedBy: 'commande', targetEntity: Livraison::class, orphanRemoval: true)]
    private $livraisons;


    public function __construct()
    {
        $this->details = new ArrayCollection();
        $this->livraisons = new ArrayCollection();

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComDateCreation(): ?\DateTimeInterface
    {
        return $this->comDateCreation;
    }

    public function setComDateCreation(\DateTimeInterface $comDateCreation): self
    {
        $this->comDateCreation = $comDateCreation;

        return $this;
    }

    public function getComDateValidation(): ?\DateTimeInterface
    {
        return $this->comDateValidation;
    }

    public function setComDateValidation(?\DateTimeInterface $comDateValidation): self
    {
        $this->comDateValidation = $comDateValidation;

        return $this;
    }

    public function getComStatut(): ?string
    {
        return $this->comStatut;
    }

    public function setComStatut(?string $comStatut): self
    {
        $this->comStatut = $comStatut;

        return $this;
    }

    public function getComCommentaire(): ?string
    {
        return $this->comCommentaire;
    }

    public function setComCommentaire(?string $comCommentaire): self
    {
        $this->comCommentaire = $comCommentaire;

        return $this;
    }

    public function getComAdresseFacture(): ?string
    {
        return $this->comAdresseFacture;
    }

    public function setComAdresseFacture(?string $comAdresseFacture): self
    {
        $this->comAdresseFacture = $comAdresseFacture;

        return $this;
    }

    public function getComAdresseFacture2(): ?string
    {
        return $this->comAdresseFacture2;
    }

    public function setComAdresseFacture2(?string $comAdresseFacture2): self
    {
        $this->comAdresseFacture2 = $comAdresseFacture2;

        return $this;
    }

    public function getComAdresseFacture3(): ?string
    {
        return $this->comAdresseFacture3;
    }

    public function setComAdresseFacture3(?string $comAdresseFacture3): self
    {
        $this->comAdresseFacture3 = $comAdresseFacture3;

        return $this;
    }

    public function getComCodePostalFacture(): ?string
    {
        return $this->comCodePostalFacture;
    }

    public function setComCodePostalFacture(?string $comCodePostalFacture): self
    {
        $this->comCodePostalFacture = $comCodePostalFacture;

        return $this;
    }

    public function getComCommuneFacture(): ?string
    {
        return $this->comCommuneFacture;
    }

    public function setComCommuneFacture(?string $comCommuneFacture): self
    {
        $this->comCommuneFacture = $comCommuneFacture;

        return $this;
    }
    
    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * @return Collection<int, Detail>
     */
    public function getDetails(): Collection
    {
        return $this->details;
    }

    public function addDetail(Detail $detail): self
    {
        if (!$this->details->contains($detail)) {
            $this->details[] = $detail;
            $detail->setCommande($this);
        }

        return $this;
    }

    public function removeDetail(Detail $detail): self
    {
        if ($this->details->removeElement($detail)) {
            // set the owning side to null (unless already changed)
            if ($detail->getCommande() === $this) {
                $detail->setCommande(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Livraison>
     */
    public function getLivraisons(): Collection
    {
        return $this->livraisons;
    }

    public function addLivraison(Livraison $livraison): self
    {
        if (!$this->livraisons->contains($livraison)) {
            $this->livraisons[] = $livraison;
            $livraison->setCommande($this);
        }

        return $this;
    }

    public function removeLivraison(Livraison $livraison): self
    {
        if ($this->livraisons->removeElement($livraison)) {
            // set the owning side to null (unless already changed)
            if ($livraison->getCommande() === $this) {
                $livraison->setCommande(null);
            }
        }

        return $this;
    }

}
