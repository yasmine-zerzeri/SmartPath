<?php
namespace App\Entity;

use App\Repository\QuizResultRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuizResultRepository::class)]
class QuizResult
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'quizResults')]
    private ?Etudiant $etudiant = null;

    #[ORM\Column(type: Types::JSON)]
    private array $responses = [];

    #[ORM\Column(type: Types::JSON)]
    private array $scores = [];

    #[ORM\Column(type: Types::JSON)]
    private array $recommendations = [];

    #[ORM\Column(length: 100)]
    private ?string $profileType = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    public function __construct() { $this->createdAt = new \DateTimeImmutable(); }
    public function getId(): ?int { return $this->id; }
    public function getEtudiant(): ?Etudiant { return $this->etudiant; }
    public function setEtudiant(?Etudiant $etudiant): static { $this->etudiant = $etudiant; return $this; }
    public function getResponses(): array { return $this->responses; }
    public function setResponses(array $responses): static { $this->responses = $responses; return $this; }
    public function getScores(): array { return $this->scores; }
    public function setScores(array $scores): static { $this->scores = $scores; return $this; }
    public function getRecommendations(): array { return $this->recommendations; }
    public function setRecommendations(array $recommendations): static { $this->recommendations = $recommendations; return $this; }
    public function getProfileType(): ?string { return $this->profileType; }
    public function setProfileType(string $profileType): static { $this->profileType = $profileType; return $this; }
    public function getCreatedAt(): ?\DateTimeImmutable { return $this->createdAt; }
}
