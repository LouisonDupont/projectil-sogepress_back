<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\MagazineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"magazine:read"}},
 *     denormalizationContext={"groups"={"magazine:write"}}
 * )
 * @ORM\Entity(repositoryClass=MagazineRepository::class)
 */
class Magazine
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"magazine:read", "client:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"magazine:read","magazine:write", "client:read"})
     */
    private $nom;

    /**
     * @ORM\OneToOne(targetEntity=Client::class, inversedBy="magazine", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"magazine:read","magazine:write"})
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=SupportMagazine::class, inversedBy="magazine")
     * @Groups({"magazine:read","magazine:write", "client:read"})
     */
    private $supportMagazine;

    /**
     * @ORM\OneToMany(targetEntity=Potentialite::class, mappedBy="magazine")
     * @Groups({"magazine:read","magazine:write"})
     */
    private $potentialites;

    public function __construct()
    {
        $this->potentialites = new ArrayCollection();
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

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getSupportMagazine(): ?SupportMagazine
    {
        return $this->supportMagazine;
    }

    public function setSupportMagazine(?SupportMagazine $supportMagazine): self
    {
        $this->supportMagazine = $supportMagazine;

        return $this;
    }

    /**
     * @return Collection|Potentialite[]
     */
    public function getPotentialites(): Collection
    {
        return $this->potentialites;
    }

    public function addPotentialite(Potentialite $potentialite): self
    {
        if (!$this->potentialites->contains($potentialite)) {
            $this->potentialites[] = $potentialite;
            $potentialite->setMagazine($this);
        }

        return $this;
    }

    public function removePotentialite(Potentialite $potentialite): self
    {
        if ($this->potentialites->removeElement($potentialite)) {
            // set the owning side to null (unless already changed)
            if ($potentialite->getMagazine() === $this) {
                $potentialite->setMagazine(null);
            }
        }

        return $this;
    }
}
