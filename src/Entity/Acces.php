<?php

namespace App\Entity;

use App\Repository\AccesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AccesRepository::class)
 */
class Acces
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="acces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Util;

    /**
     * @ORM\ManyToOne(targetEntity=Document::class, inversedBy="acces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Doc;

    /**
     * @ORM\ManyToOne(targetEntity=Autorisation::class, inversedBy="acces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Autorisation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtil(): ?Utilisateur
    {
        return $this->Util;
    }

    public function setUtil(?Utilisateur $Util): self
    {
        $this->Util = $Util;

        return $this;
    }

    public function getDoc(): ?Document
    {
        return $this->Doc;
    }

    public function setDoc(?Document $Doc): self
    {
        $this->Doc = $Doc;

        return $this;
    }

    public function getAutorisation(): ?Autorisation
    {
        return $this->Autorisation;
    }

    public function setAutorisation(?Autorisation $Autorisation): self
    {
        $this->Autorisation = $Autorisation;

        return $this;
    }
}
