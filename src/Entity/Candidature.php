<?php
namespace App\Entity;
use App\Repository\CandidatureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidatureRepository::class)]
class Candidature
{
    #[ORM\Id] #[ORM\GeneratedValue] #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(type: Types::TEXT)]
    private ?string $lettreMotivation = null;
    #[ORM\Column(length: 50)]
    private ?string $statut = 'en_attente';
    #[ORM\ManyToOne(inversedBy: 'candidatures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Etudiant $etudiant = null;
    #[ORM\ManyToOne(inversedBy: 'candidatures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Offre $offre = null;
    #[ORM\ManyToOne(inversedBy: 'candidatures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CV $cv = null;
    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;
    
    public function __construct() { $this->createdAt = new \DateTimeImmutable(); }
    public function getId(): ?int { return $this->id; }
    public function getLettreMotivation(): ?string { return $this->lettreMotivation; }
    public function setLettreMotivation(string $lettreMotivation): static { $this->lettreMotivation = $lettreMotivation; return $this; }
    public function getStatut(): ?string { return $this->statut; }
    public function setStatut(string $statut): static { $this->statut = $statut; return $this; }
    public function getEtudiant(): ?Etudiant { return $this->etudiant; }
    public function setEtudiant(?Etudiant $etudiant): static { $this->etudiant = $etudiant; return $this; }
    public function getOffre(): ?Offre { return $this->offre; }
    public function setOffre(?Offre $offre): static { $this->offre = $offre; return $this; }
    public function getCv(): ?CV { return $this->cv; }
    public function setCv(?CV $cv): static { $this->cv = $cv; return $this; }
    public function getCreatedAt(): ?\DateTimeImmutable { return $this->createdAt; }
}
