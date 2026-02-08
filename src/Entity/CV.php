<?php
namespace App\Entity;
use App\Repository\CVRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CVRepository::class)]
class CV
{
    #[ORM\Id] #[ORM\GeneratedValue] #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(length: 255)]
    private ?string $titre = null;
    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fichier = null;
    #[ORM\ManyToOne(inversedBy: 'cvs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Etudiant $etudiant = null;
    #[ORM\OneToMany(targetEntity: Candidature::class, mappedBy: 'cv')]
    private Collection $candidatures;
    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;
    
    public function __construct() {
        $this->candidatures = new ArrayCollection();
        $this->createdAt = new \DateTimeImmutable();
    }
    
    public function getId(): ?int { return $this->id; }
    public function getTitre(): ?string { return $this->titre; }
    public function setTitre(string $titre): static { $this->titre = $titre; return $this; }
    public function getDescription(): ?string { return $this->description; }
    public function setDescription(?string $description): static { $this->description = $description; return $this; }
    public function getFichier(): ?string { return $this->fichier; }
    public function setFichier(?string $fichier): static { $this->fichier = $fichier; return $this; }
    public function getEtudiant(): ?Etudiant { return $this->etudiant; }
    public function setEtudiant(?Etudiant $etudiant): static { $this->etudiant = $etudiant; return $this; }
    public function getCandidatures(): Collection { return $this->candidatures; }
    public function getCreatedAt(): ?\DateTimeImmutable { return $this->createdAt; }
}
