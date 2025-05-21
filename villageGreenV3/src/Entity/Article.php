<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
/**
 * @ApiResource(
 *     normalizationContext={"groups"={"read:comment"}},
 *     collectionOperations={"get"},
 *     itemOperations={"get"}
 * )
 * @ApiFilter(SearchFilter::class, properties={"product": "exact"})
 */
class Article
{
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $artNom;

    #[ORM\Column(type: 'text', nullable: true)]
    private $artDescription;

    #[ORM\Column(type: 'decimal', precision: 9, scale: 2)]
    private $artPrixHt;

    #[ORM\Column(type: 'decimal', precision: 4, scale: 2)]
    private $artTauxTva;

    #[ORM\Column(type: 'decimal', precision: 9, scale: 2)]
    private $artTva;

    #[ORM\Column(type: 'decimal', precision: 9, scale: 2)]
    private $artPrixTtc;

    #[ORM\Column(type: 'decimal', precision: 9, scale: 2)]
    private $artPrixFournisseurHt;

    #[ORM\Column(type: 'decimal', precision: 9, scale: 2)]
    private $artPrixFournisseurTtc;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $artStock;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $artPhoto;

    #[ORM\ManyToOne(targetEntity: SousCategorie::class, inversedBy: 'articles')]
    #[ORM\JoinColumn(nullable: false)]
    private $sousCategorie;

    #[ORM\ManyToOne(targetEntity: Fournisseur::class, inversedBy: 'articles')]
    private $Fournisseur;

    #[ORM\OneToMany(mappedBy: 'article', targetEntity: Detail::class, orphanRemoval: true)]
    private $details;

    #[ORM\OneToMany(mappedBy: 'article', targetEntity: Livraison::class, orphanRemoval: true)]
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

    public function getArtNom(): ?string
    {
        return $this->artNom;
    }

    public function setArtNom(string $artNom): self
    {
        $this->artNom = $artNom;

        return $this;
    }

    public function getArtDescription(): ?string
    {
        return $this->artDescription;
    }

    public function setArtDescription(?string $artDescription): self
    {
        $this->artDescription = $artDescription;

        return $this;
    }

    public function getArtPrixHt(): ?string
    {
        return $this->artPrixHt;
    }

    public function setArtPrixHt(string $artPrixHt): self
    {
        $this->artPrixHt = $artPrixHt;

        return $this;
    }

    public function getArtTauxTva(): ?string
    {
        return $this->artTauxTva;
    }

    public function setArtTauxTva(string $artTauxTva): self
    {
        $this->artTauxTva = $artTauxTva;

        return $this;
    }

    public function getArtTva(): ?string
    {
        return $this->artTva;
    }

    public function setArtTva(string $artTva): self
    {
        $this->artTva = $artTva;

        return $this;
    }

    public function getArtPrixTtc(): ?string
    {
        return $this->artPrixTtc;
    }

    public function setArtPrixTtc(string $artPrixTtc): self
    {
        $this->artPrixTtc = $artPrixTtc;

        return $this;
    }

    public function getArtPrixFournisseurHt(): ?string
    {
        return $this->artPrixFournisseurHt;
    }

    public function setArtPrixFournisseurHt(string $artPrixFournisseurHt): self
    {
        $this->artPrixFournisseurHt = $artPrixFournisseurHt;

        return $this;
    }

    public function getArtPrixFournisseurTtc(): ?string
    {
        return $this->artPrixFournisseurTtc;
    }

    public function setArtPrixFournisseurTtc(string $artPrixFournisseurTtc): self
    {
        $this->artPrixFournisseurTtc = $artPrixFournisseurTtc;

        return $this;
    }

    public function getArtStock(): ?int
    {
        return $this->artStock;
    }

    public function setArtStock(?int $artStock): self
    {
        $this->artStock = $artStock;

        return $this;
    }

    public function getArtPhoto(): ?string
    {
        return $this->artPhoto;
    }

    public function setArtPhoto(?string $artPhoto): self
    {
        $this->artPhoto = $artPhoto;

        return $this;
    }

    public function getSousCategorie(): ?SousCategorie
    {
        return $this->sousCategorie;
    }

    public function setSousCategorie(?SousCategorie $sousCategorie): self
    {
        $this->sousCategorie = $sousCategorie;

        return $this;
    }

    public function getFournisseur(): ?Fournisseur
    {
        return $this->Fournisseur;
    }

    public function setFournisseur(?Fournisseur $Fournisseur): self
    {
        $this->Fournisseur = $Fournisseur;

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
            $detail->setArticle($this);
        }

        return $this;
    }

    public function removeDetail(Detail $detail): self
    {
        if ($this->details->removeElement($detail)) {
            // set the owning side to null (unless already changed)
            if ($detail->getArticle() === $this) {
                $detail->setArticle(null);
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
            $livraison->setArticle($this);
        }

        return $this;
    }

    public function removeLivraison(Livraison $livraison): self
    {
        if ($this->livraisons->removeElement($livraison)) {
            // set the owning side to null (unless already changed)
            if ($livraison->getArticle() === $this) {
                $livraison->setArticle(null);
            }
        }

        return $this;
    }

}
