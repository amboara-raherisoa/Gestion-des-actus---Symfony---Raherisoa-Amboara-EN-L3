<?php

namespace App\Entity;

use App\Repository\RedacteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RedacteurRepository::class)
 */
class Redacteur
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
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Actu::class, mappedBy="redacteur")
     */
    private $actusRedigees;

    public function __construct()
    {
        $this->actusRedigees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Actu>
     */
    public function getActusRedigees(): Collection
    {
        return $this->actusRedigees;
    }

    public function addActu(Actu $actu): self
    {
        if (!$this->actusRedigees->contains($actu)) {
            $this->actusRedigees[] = $actu;
            $actu->setRedacteur($this);
        }

        return $this;
    }

    public function removeActu(Actu $actu): self
    {
        if ($this->actusRedigees->removeElement($actu)) {
            // set the owning side to null (unless already changed)
            if ($actu->getRedacteur() === $this) {
                $actu->setRedacteur(null);
            }
        }

        return $this;
    }
    
    public function __toString(): string
    {
        return $this->nom;
    }
}
