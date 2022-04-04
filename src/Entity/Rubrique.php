<?php

namespace App\Entity;

use App\Repository\RubriqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RubriqueRepository::class)
 */
class Rubrique
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $intitule;

    /**
     * @ORM\OneToMany(targetEntity=Actu::class, mappedBy="rubrique")
     */
    private $actusConcernees;

    public function __construct()
    {
        $this->actusConcernees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * @return Collection<int, Actu>
     */
    public function getActusConcernees(): Collection
    {
        return $this->actusConcernees;
    }

    public function addActu(Actu $actu): self
    {
        if (!$this->actusConcernees->contains($actu)) {
            $this->actusConcernees[] = $actu;
            $actu->setRubrique($this);
        }

        return $this;
    }

    public function removeActu(Actu $actu): self
    {
        if ($this->actusConcernees->removeElement($actu)) {
            // set the owning side to null (unless already changed)
            if ($actu->getRubrique() === $this) {
                $actu->setRubrique(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->intitule;
    }
}
