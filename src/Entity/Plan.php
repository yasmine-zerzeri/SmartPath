<?php
namespace App\Entity;
use App\Repository\PlanRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlanRepository::class)]
class Plan
{
    #[ORM\Id] #[ORM\GeneratedValue] #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(length: 255)]
    private ?string $objectif = null;
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $duree = null;
    #[ORM\Column(length: 50, nullable: true)]
    private ?string $niveauCible = null;
    #[ORM\ManyToOne(inversedBy: 'plans')]
    private ?Prof $prof = null;
    #[ORM\ManyToOne]
    private ?Filiere $filiere = null;
    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;
    
    public function __construct() { $this->createdAt = new \DateTimeImmutable(); }
    public function getId(): ?int { return $this->id; }
    public function getObjectif(): ?string { return $this->objectif; }
    public function setObjectif(string $objectif): static { $this->objectif = $objectif; return $this; }
    public function getDuree(): ?string { return $this->duree; }
    public function setDuree(?string $duree): static { $this->duree = $duree; return $this; }
    public function getNiveauCible(): ?string { return $this->niveauCible; }
    public function setNiveauCible(?string $niveauCible): static { $this->niveauCible = $niveauCible; return $this; }
    public function getProf(): ?Prof { return $this->prof; }
    public function setProf(?Prof $prof): static { $this->prof = $prof; return $this; }
    public function getFiliere(): ?Filiere { return $this->filiere; }
    public function setFiliere(?Filiere $filiere): static { $this->filiere = $filiere; return $this; }
    public function getCreatedAt(): ?\DateTimeImmutable { return $this->createdAt; }
}
