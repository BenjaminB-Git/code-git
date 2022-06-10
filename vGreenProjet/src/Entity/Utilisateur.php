<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Type::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $type;

    #[ORM\Column(type: 'string', length: 255)]
    private $utiNom;

    #[ORM\Column(type: 'string', length: 255)]
    private $utiPrenom;

    #[ORM\Column(type: 'date')]
    private $utiDateNaissance;

    #[ORM\Column(type: 'string', length: 255)]
    private $utiAdresse;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $utiAdresse2;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $utiAdresse3;

    #[ORM\Column(type: 'string', length: 5)]
    private $utiCodePostal;

    #[ORM\Column(type: 'string', length: 255)]
    private $utiCommune;

    #[ORM\Column(type: 'string', length: 255)]
    private $utiMail;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $utiTelephoneFixe;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $utiTelephoneMobile;

    #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: Commande::class, orphanRemoval: true)]
    private $commandes;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getUtiNom(): ?string
    {
        return $this->utiNom;
    }

    public function setUtiNom(string $utiNom): self
    {
        $this->utiNom = $utiNom;

        return $this;
    }

    public function getUtiPrenom(): ?string
    {
        return $this->utiPrenom;
    }

    public function setUtiPrenom(string $utiPrenom): self
    {
        $this->utiPrenom = $utiPrenom;

        return $this;
    }

    public function getUtiDateNaissance(): ?\DateTimeInterface
    {
        return $this->utiDateNaissance;
    }

    public function setUtiDateNaissance(\DateTimeInterface $utiDateNaissance): self
    {
        $this->utiDateNaissance = $utiDateNaissance;

        return $this;
    }

    public function getUtiAdresse(): ?string
    {
        return $this->utiAdresse;
    }

    public function setUtiAdresse(string $utiAdresse): self
    {
        $this->utiAdresse = $utiAdresse;

        return $this;
    }

    public function getUtiAdresse2(): ?string
    {
        return $this->utiAdresse2;
    }

    public function setUtiAdresse2(?string $utiAdresse2): self
    {
        $this->utiAdresse2 = $utiAdresse2;

        return $this;
    }

    public function getUtiAdresse3(): ?string
    {
        return $this->utiAdresse3;
    }

    public function setUtiAdresse3(?string $utiAdresse3): self
    {
        $this->utiAdresse3 = $utiAdresse3;

        return $this;
    }

    public function getUtiCodePostal(): ?string
    {
        return $this->utiCodePostal;
    }

    public function setUtiCodePostal(string $utiCodePostal): self
    {
        $this->utiCodePostal = $utiCodePostal;

        return $this;
    }

    public function getUtiCommune(): ?string
    {
        return $this->utiCommune;
    }

    public function setUtiCommune(string $utiCommune): self
    {
        $this->utiCommune = $utiCommune;

        return $this;
    }

    public function getUtiMail(): ?string
    {
        return $this->utiMail;
    }

    public function setUtiMail(string $utiMail): self
    {
        $this->utiMail = $utiMail;

        return $this;
    }

    public function getUtiTelephoneFixe(): ?string
    {
        return $this->utiTelephoneFixe;
    }

    public function setUtiTelephoneFixe(?string $utiTelephoneFixe): self
    {
        $this->utiTelephoneFixe = $utiTelephoneFixe;

        return $this;
    }

    public function getUtiTelephoneMobile(): ?string
    {
        return $this->utiTelephoneMobile;
    }

    public function setUtiTelephoneMobile(?string $utiTelephoneMobile): self
    {
        $this->utiTelephoneMobile = $utiTelephoneMobile;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes[] = $commande;
            $commande->setUtilisateur($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getUtilisateur() === $this) {
                $commande->setUtilisateur(null);
            }
        }

        return $this;
    }

}