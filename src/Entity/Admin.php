<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdminRepository::class)]
class Admin extends User
{
    /**
     * @var Collection<int, Offre>
     */
    #[ORM\OneToMany(targetEntity: Offre::class, mappedBy: 'admin')]
    private Collection $offres;

    public function __construct()
    {
        $this->offres = new ArrayCollection();
        $this->setRoles(['ROLE_ADMIN']);
    }

    public function getOffres(): Collection
    {
        return $this->offres;
    }
}
