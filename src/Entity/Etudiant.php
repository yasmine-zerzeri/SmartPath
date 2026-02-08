<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtudiantRepository::class)]
class Etudiant extends User
{
    #[ORM\Column(length: 50, nullable: true)]
    private ?string $niveau = null;

    #[ORM\ManyToOne(targetEntity: Filiere::class, inversedBy: 'etudiants')]
    private ?Filiere $filiere = null;

    /**
     * @var Collection<int, Score>
     */
    #[ORM\OneToMany(targetEntity: Score::class, mappedBy: 'etudiant', cascade: ['persist', 'remove'])]
    private Collection $scores;

    /**
     * @var Collection<int, QuizResult>
     */
    #[ORM\OneToMany(targetEntity: QuizResult::class, mappedBy: 'etudiant', cascade: ['persist', 'remove'])]
    private Collection $quizResults;

    /**
     * @var Collection<int, CV>
     */
    #[ORM\OneToMany(targetEntity: CV::class, mappedBy: 'etudiant', cascade: ['persist', 'remove'])]
    private Collection $cvs;

    /**
     * @var Collection<int, Candidature>
     */
    #[ORM\OneToMany(targetEntity: Candidature::class, mappedBy: 'etudiant', cascade: ['persist', 'remove'])]
    private Collection $candidatures;

    /**
     * @var Collection<int, TestResult>
     */
    #[ORM\OneToMany(targetEntity: TestResult::class, mappedBy: 'etudiant', cascade: ['persist', 'remove'])]
    private Collection $testResults;

    public function __construct()
    {
        $this->scores = new ArrayCollection();
        $this->quizResults = new ArrayCollection();
        $this->cvs = new ArrayCollection();
        $this->candidatures = new ArrayCollection();
        $this->testResults = new ArrayCollection();
        $this->setRoles(['ROLE_ETUDIANT']);
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(?string $niveau): static
    {
        $this->niveau = $niveau;
        return $this;
    }

    public function getFiliere(): ?Filiere
    {
        return $this->filiere;
    }

    public function setFiliere(?Filiere $filiere): static
    {
        $this->filiere = $filiere;
        return $this;
    }

    public function getScores(): Collection
    {
        return $this->scores;
    }

    public function addScore(Score $score): static
    {
        if (!$this->scores->contains($score)) {
            $this->scores->add($score);
            $score->setEtudiant($this);
        }
        return $this;
    }

    public function getQuizResults(): Collection
    {
        return $this->quizResults;
    }

    public function addQuizResult(QuizResult $quizResult): static
    {
        if (!$this->quizResults->contains($quizResult)) {
            $this->quizResults->add($quizResult);
            $quizResult->setEtudiant($this);
        }
        return $this;
    }

    public function getCvs(): Collection
    {
        return $this->cvs;
    }

    public function addCv(CV $cv): static
    {
        if (!$this->cvs->contains($cv)) {
            $this->cvs->add($cv);
            $cv->setEtudiant($this);
        }
        return $this;
    }

    public function getCandidatures(): Collection
    {
        return $this->candidatures;
    }

    public function addCandidature(Candidature $candidature): static
    {
        if (!$this->candidatures->contains($candidature)) {
            $this->candidatures->add($candidature);
            $candidature->setEtudiant($this);
        }
        return $this;
    }

    public function getTestResults(): Collection
    {
        return $this->testResults;
    }

    public function addTestResult(TestResult $testResult): static
    {
        if (!$this->testResults->contains($testResult)) {
            $this->testResults->add($testResult);
            $testResult->setEtudiant($this);
        }
        return $this;
    }
}
