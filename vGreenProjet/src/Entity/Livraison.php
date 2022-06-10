<?php

namespace App\Entity;

use App\Repository\LivraisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivraisonRepository::class)]
class Livraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $livDateCreation;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $livDateExpedition;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $livDateLivraison;

    #[ORM\Column(type: 'string', length: 255)]
    private $livNomDestinataire;

    #[ORM\Column(type: 'string', length: 255)]
    private $livPrenomDestinataire;

    #[ORM\Column(type: 'string', length: 255)]
    private $livAdresse;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $livAdresse2;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $livAdresse3;

    #[ORM\Column(type: 'string', length: 5)]
    private $livCodePostal;

    #[ORM\Column(type: 'string', length: 255)]
    private $livCommune;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $livQuantiteArticle;


    #[ORM\ManyToOne(targetEntity: Commande::class, inversedBy: 'livraisons')]
    #[ORM\JoinColumn(nullable: false)]
    private $Commande;

    #[ORM\OneToMany(mappedBy: 'livraison', targetEntity: Article::class)]
    private $articles;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLivDateCreation(): ?\DateTimeInterface
    {
        return $this->livDateCreation;
    }

    public function setLivDateCreation(\DateTimeInterface $livDateCreation): self
    {
        $this->livDateCreation = $livDateCreation;

        return $this;
    }

    public function getLivDateExpedition(): ?\DateTimeInterface
    {
        return $this->livDateExpedition;
    }

    public function setLivDateExpedition(?\DateTimeInterface $livDateExpedition): self
    {
        $this->livDateExpedition = $livDateExpedition;

        return $this;
    }

    public function getLivDateLivraison(): ?\DateTimeInterface
    {
        return $this->livDateLivraison;
    }

    public function setLivDateLivraison(?\DateTimeInterface $livDateLivraison): self
    {
        $this->livDateLivraison = $livDateLivraison;

        return $this;
    }

    public function getLivNomDestinataire(): ?string
    {
        return $this->livNomDestinataire;
    }

    public function setLivNomDestinataire(string $livNomDestinataire): self
    {
        $this->livNomDestinataire = $livNomDestinataire;

        return $this;
    }

    public function getLivPrenomDestinataire(): ?string
    {
        return $this->livPrenomDestinataire;
    }

    public function setLivPrenomDestinataire(string $livPrenomDestinataire): self
    {
        $this->livPrenomDestinataire = $livPrenomDestinataire;

        return $this;
    }

    public function getLivAdresse(): ?string
    {
        return $this->livAdresse;
    }

    public function setLivAdresse(string $livAdresse): self
    {
        $this->livAdresse = $livAdresse;

        return $this;
    }

    public function getLivAdresse2(): ?string
    {
        return $this->livAdresse2;
    }

    public function setLivAdresse2(?string $livAdresse2): self
    {
        $this->livAdresse2 = $livAdresse2;

        return $this;
    }

    public function getLivAdresse3(): ?string
    {
        return $this->livAdresse3;
    }

    public function setLivAdresse3(?string $livAdresse3): self
    {
        $this->livAdresse3 = $livAdresse3;

        return $this;
    }

    public function getLivCodePostal(): ?string
    {
        return $this->livCodePostal;
    }

    public function setLivCodePostal(string $livCodePostal): self
    {
        $this->livCodePostal = $livCodePostal;

        return $this;
    }

    public function getLivCommune(): ?string
    {
        return $this->livCommune;
    }

    public function setLivCommune(string $livCommune): self
    {
        $this->livCommune = $livCommune;

        return $this;
    }

    public function getLivQuantiteArticle(): ?int
    {
        return $this->livQuantiteArticle;
    }

    public function setLivQuantiteArticle(int $livQuantiteArticle): self
    {
        $this->livQuantiteArticle = $livQuantiteArticle;

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->Commande;
    }

    public function setCommande(?Commande $Commande): self
    {
        $this->Commande = $Commande;

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
            $article->setLivraison($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getLivraison() === $this) {
                $article->setLivraison(null);
            }
        }

        return $this;
    }
}
