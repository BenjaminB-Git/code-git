<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactureRepository::class)]
class Facture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $facDate;

    #[ORM\Column(type: 'decimal', precision: 9, scale: 2)]
    private $facPrixHt;

    #[ORM\Column(type: 'decimal', precision: 9, scale: 2)]
    private $facPrixTtc;

    #[ORM\Column(type: 'string', length: 255)]
    private $facAdresse;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $facAdresse2;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $facAdresse3;

    #[ORM\Column(type: 'string', length: 5)]
    private $facCodePostal;

    #[ORM\Column(type: 'string', length: 255)]
    private $facCommune;

    #[ORM\Column(type: 'string', length: 255)]
    private $facNomDestinataire;

    #[ORM\Column(type: 'string', length: 255)]
    private $facPrenomDestinataire;

    #[ORM\Column(type: 'string', length: 255)]
    private $Utilisateur;

    #[ORM\OneToMany(mappedBy: 'facture', targetEntity: Detail::class)]
    private $details;

    public function __construct()
    {
        $this->details = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFacDate(): ?\DateTimeInterface
    {
        return $this->facDate;
    }

    public function setFacDate(?\DateTimeInterface $facDate): self
    {
        $this->facDate = $facDate;

        return $this;
    }

    public function getFacPrixHt(): ?string
    {
        return $this->facPrixHt;
    }

    public function setFacPrixHt(string $facPrixHt): self
    {
        $this->facPrixHt = $facPrixHt;

        return $this;
    }

    public function getFacPrixTtc(): ?string
    {
        return $this->facPrixTtc;
    }

    public function setFacPrixTtc(string $facPrixTtc): self
    {
        $this->facPrixTtc = $facPrixTtc;

        return $this;
    }

    public function getFacAdresse(): ?string
    {
        return $this->facAdresse;
    }

    public function setFacAdresse(string $facAdresse): self
    {
        $this->facAdresse = $facAdresse;

        return $this;
    }

    public function getFacAdresse2(): ?string
    {
        return $this->facAdresse2;
    }

    public function setFacAdresse2(?string $facAdresse2): self
    {
        $this->facAdresse2 = $facAdresse2;

        return $this;
    }

    public function getFacAdresse3(): ?string
    {
        return $this->facAdresse3;
    }

    public function setFacAdresse3(?string $facAdresse3): self
    {
        $this->facAdresse3 = $facAdresse3;

        return $this;
    }

    public function getFacCodePostal(): ?string
    {
        return $this->facCodePostal;
    }

    public function setFacCodePostal(string $facCodePostal): self
    {
        $this->facCodePostal = $facCodePostal;

        return $this;
    }

    public function getFacCommune(): ?string
    {
        return $this->facCommune;
    }

    public function setFacCommune(string $facCommune): self
    {
        $this->facCommune = $facCommune;

        return $this;
    }

    public function getFacNomDestinataire(): ?string
    {
        return $this->facNomDestinataire;
    }

    public function setFacNomDestinataire(string $facNomDestinataire): self
    {
        $this->facNomDestinataire = $facNomDestinataire;

        return $this;
    }

    public function getFacPrenomDestinataire(): ?string
    {
        return $this->facPrenomDestinataire;
    }

    public function setFacPrenomDestinataire(string $facPrenomDestinataire): self
    {
        $this->facPrenomDestinataire = $facPrenomDestinataire;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->Utilisateur;
    }

    public function setUtilisateur(?Utilisateur $Utilisateur): self
    {
        $this->Utilisateur = $Utilisateur;

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
            $detail->setFacture($this);
        }

        return $this;
    }

    public function removeDetail(Detail $detail): self
    {
        if ($this->details->removeElement($detail)) {
            // set the owning side to null (unless already changed)
            if ($detail->getFacture() === $this) {
                $detail->setFacture(null);
            }
        }

        return $this;
    }
}
