<?php
namespace App\Entity;
use App\Repository\ScoreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScoreRepository::class)]
class Score
{
    #[ORM\Id] #[ORM\GeneratedValue] #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column]
    private ?float $note = null;
    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $dateEvaluation = null;
    #[ORM\ManyToOne(inversedBy: 'scores')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Etudiant $etudiant = null;
    #[ORM\ManyToOne(inversedBy: 'scores')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Matiere $matiere = null;
    
    public function getId(): ?int { return $this->id; }
    public function getNote(): ?float { return $this->note; }
    public function setNote(float $note): static { $this->note = $note; return $this; }
    public function getDateEvaluation(): ?\DateTimeInterface { return $this->dateEvaluation; }
    public function setDateEvaluation(?\DateTimeInterface $dateEvaluation): static { $this->dateEvaluation = $dateEvaluation; return $this; }
    public function getEtudiant(): ?Etudiant { return $this->etudiant; }
    public function setEtudiant(?Etudiant $etudiant): static { $this->etudiant = $etudiant; return $this; }
    public function getMatiere(): ?Matiere { return $this->matiere; }
    public function setMatiere(?Matiere $matiere): static { $this->matiere = $matiere; return $this; }
}
