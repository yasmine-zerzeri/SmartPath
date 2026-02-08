<?php
namespace App\Entity;
use App\Repository\MatiereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatiereRepository::class)]
class Matiere
{
    #[ORM\Id] #[ORM\GeneratedValue] #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(length: 255)]
    private ?string $titre = null;
    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;
    #[ORM\ManyToOne(inversedBy: 'matieres')]
    private ?Filiere $filiere = null;
    #[ORM\ManyToOne(inversedBy: 'matieres')]
    private ?Prof $prof = null;
    #[ORM\OneToMany(targetEntity: Lecon::class, mappedBy: 'matiere', cascade: ['persist', 'remove'])]
    private Collection $lecons;
    #[ORM\OneToMany(targetEntity: Score::class, mappedBy: 'matiere', cascade: ['persist', 'remove'])]
    private Collection $scores;
    #[ORM\OneToMany(targetEntity: Test::class, mappedBy: 'matiere', cascade: ['persist', 'remove'])]
    private Collection $tests;
    
    public function __construct() {
        $this->lecons = new ArrayCollection();
        $this->scores = new ArrayCollection();
        $this->tests = new ArrayCollection();
    }
    
    public function getId(): ?int { return $this->id; }
    public function getTitre(): ?string { return $this->titre; }
    public function setTitre(string $titre): static { $this->titre = $titre; return $this; }
    public function getDescription(): ?string { return $this->description; }
    public function setDescription(?string $description): static { $this->description = $description; return $this; }
    public function getFiliere(): ?Filiere { return $this->filiere; }
    public function setFiliere(?Filiere $filiere): static { $this->filiere = $filiere; return $this; }
    public function getProf(): ?Prof { return $this->prof; }
    public function setProf(?Prof $prof): static { $this->prof = $prof; return $this; }
    public function getLecons(): Collection { return $this->lecons; }
    public function getScores(): Collection { return $this->scores; }
    public function getTests(): Collection { return $this->tests; }
}
