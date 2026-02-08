<?php
namespace App\Entity;
use App\Repository\TestResultRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TestResultRepository::class)]
class TestResult
{
    #[ORM\Id] #[ORM\GeneratedValue] #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column]
    private ?float $note = null;
    #[ORM\ManyToOne(inversedBy: 'testResults')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Etudiant $etudiant = null;
    #[ORM\ManyToOne(inversedBy: 'testResults')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Test $test = null;
    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;
    
    public function __construct() { $this->createdAt = new \DateTimeImmutable(); }
    public function getId(): ?int { return $this->id; }
    public function getNote(): ?float { return $this->note; }
    public function setNote(float $note): static { $this->note = $note; return $this; }
    public function getEtudiant(): ?Etudiant { return $this->etudiant; }
    public function setEtudiant(?Etudiant $etudiant): static { $this->etudiant = $etudiant; return $this; }
    public function getTest(): ?Test { return $this->test; }
    public function setTest(?Test $test): static { $this->test = $test; return $this; }
    public function getCreatedAt(): ?\DateTimeImmutable { return $this->createdAt; }
}
