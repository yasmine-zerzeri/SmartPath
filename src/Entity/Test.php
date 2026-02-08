<?php
namespace App\Entity;
use App\Repository\TestRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TestRepository::class)]
class Test
{
    #[ORM\Id] #[ORM\GeneratedValue] #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(length: 255)]
    private ?string $titre = null;
    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $contenu = null;
    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $dateTest = null;
    #[ORM\Column(nullable: true)]
    private ?int $duree = null;
    #[ORM\ManyToOne(inversedBy: 'tests')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Prof $prof = null;
    #[ORM\ManyToOne(inversedBy: 'tests')]
    private ?Matiere $matiere = null;
    #[ORM\OneToMany(targetEntity: TestResult::class, mappedBy: 'test', cascade: ['persist', 'remove'])]
    private Collection $testResults;
    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;
    
    public function __construct() {
        $this->testResults = new ArrayCollection();
        $this->createdAt = new \DateTimeImmutable();
    }
    
    public function getId(): ?int { return $this->id; }
    public function getTitre(): ?string { return $this->titre; }
    public function setTitre(string $titre): static { $this->titre = $titre; return $this; }
    public function getContenu(): ?string { return $this->contenu; }
    public function setContenu(?string $contenu): static { $this->contenu = $contenu; return $this; }
    public function getDateTest(): ?\DateTimeInterface { return $this->dateTest; }
    public function setDateTest(?\DateTimeInterface $dateTest): static { $this->dateTest = $dateTest; return $this; }
    public function getDuree(): ?int { return $this->duree; }
    public function setDuree(?int $duree): static { $this->duree = $duree; return $this; }
    public function getProf(): ?Prof { return $this->prof; }
    public function setProf(?Prof $prof): static { $this->prof = $prof; return $this; }
    public function getMatiere(): ?Matiere { return $this->matiere; }
    public function setMatiere(?Matiere $matiere): static { $this->matiere = $matiere; return $this; }
    public function getTestResults(): Collection { return $this->testResults; }
    public function getCreatedAt(): ?\DateTimeImmutable { return $this->createdAt; }
}
