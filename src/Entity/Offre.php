<?php
namespace App\Entity;
use App\Repository\OffreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OffreRepository::class)]
class Offre
{
    #[ORM\Id] #[ORM\GeneratedValue] #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(length: 255)]
    private ?string $titre = null;
    #[ORM\Column(length: 255)]
    private ?string $entreprise = null;
    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;
    #[ORM\Column(length: 50)]
    private ?string $type = null;
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lieu = null;
    #[ORM\ManyToOne(inversedBy: 'offres')]
    private ?Admin $admin = null;
    #[ORM\OneToMany(targetEntity: Candidature::class, mappedBy: 'offre', cascade: ['persist', 'remove'])]
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
    public function getEntreprise(): ?string { return $this->entreprise; }
    public function setEntreprise(string $entreprise): static { $this->entreprise = $entreprise; return $this; }
    public function getDescription(): ?string { return $this->description; }
    public function setDescription(string $description): static { $this->description = $description; return $this; }
    public function getType(): ?string { return $this->type; }
    public function setType(string $type): static { $this->type = $type; return $this; }
    public function getLieu(): ?string { return $this->lieu; }
    public function setLieu(?string $lieu): static { $this->lieu = $lieu; return $this; }
    public function getAdmin(): ?Admin { return $this->admin; }
    public function setAdmin(?Admin $admin): static { $this->admin = $admin; return $this; }
    public function getCandidatures(): Collection { return $this->candidatures; }
    public function getCreatedAt(): ?\DateTimeImmutable { return $this->createdAt; }
}
