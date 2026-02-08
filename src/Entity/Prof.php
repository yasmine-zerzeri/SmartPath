<?php

namespace App\Entity;

use App\Repository\ProfRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfRepository::class)]
class Prof extends User
{
    #[ORM\Column(length: 100, nullable: true)]
    private ?string $specialite = null;

    /**
     * @var Collection<int, Matiere>
     */
    #[ORM\OneToMany(targetEntity: Matiere::class, mappedBy: 'prof')]
    private Collection $matieres;

    /**
     * @var Collection<int, Lecon>
     */
    #[ORM\OneToMany(targetEntity: Lecon::class, mappedBy: 'prof')]
    private Collection $lecons;

    /**
     * @var Collection<int, Plan>
     */
    #[ORM\OneToMany(targetEntity: Plan::class, mappedBy: 'prof')]
    private Collection $plans;

    /**
     * @var Collection<int, Test>
     */
    #[ORM\OneToMany(targetEntity: Test::class, mappedBy: 'prof')]
    private Collection $tests;

    public function __construct()
    {
        $this->matieres = new ArrayCollection();
        $this->lecons = new ArrayCollection();
        $this->plans = new ArrayCollection();
        $this->tests = new ArrayCollection();
        $this->setRoles(['ROLE_PROF']);
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(?string $specialite): static
    {
        $this->specialite = $specialite;
        return $this;
    }

    public function getMatieres(): Collection
    {
        return $this->matieres;
    }

    public function getLecons(): Collection
    {
        return $this->lecons;
    }

    public function getPlans(): Collection
    {
        return $this->plans;
    }

    public function getTests(): Collection
    {
        return $this->tests;
    }

    public function addTest(Test $test): static
    {
        if (!$this->tests->contains($test)) {
            $this->tests->add($test);
            $test->setProf($this);
        }
        return $this;
    }
}
