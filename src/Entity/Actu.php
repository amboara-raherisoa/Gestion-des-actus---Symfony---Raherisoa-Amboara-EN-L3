<?php

namespace App\Entity;

use App\Repository\ActuRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActuRepository::class)
 */
class Actu
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
    private $theme;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $breveDescription;

    /**
     * @ORM\Column(type="text")
     */
    private $contenu;

    /**
     * @ORM\Column(type="date")
     */
    private $datePublication;

    /**
     * @ORM\ManyToOne(targetEntity=Rubrique::class, inversedBy="actusConcernees")
     */
    private $rubrique;

    /**
     * @ORM\ManyToOne(targetEntity=Redacteur::class, inversedBy="actusRedigees")
     */
    private $redacteur;

    public function __construct()
    {
        $this->datePublication = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setTheme(string $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getBreveDescription(): ?string
    {
        return $this->breveDescription;
    }

    public function setBreveDescription(?string $breveDescription): self
    {
        $this->breveDescription = $breveDescription;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getDatePublication(): ?\DateTimeInterface
    {
        return $this->datePublication;
    }

    public function setDatePublication(\DateTimeInterface $datePublication): self
    {
        $this->datePublication = $datePublication;

        return $this;
    }

    public function getRubrique(): ?Rubrique
    {
        return $this->rubrique;
    }

    public function setRubrique(?Rubrique $rubrique): self
    {
        $this->rubrique = $rubrique;

        return $this;
    }

    public function getRedacteur(): ?Redacteur
    {
        return $this->redacteur;
    }

    public function setRedacteur(?Redacteur $redacteur): self
    {
        $this->redacteur = $redacteur;

        return $this;
    }
}
