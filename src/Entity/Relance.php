<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\RelanceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"relance:read"}},
 *     denormalizationContext={"groups"={"relance:write"}}
 * )
 * @ORM\Entity(repositoryClass=RelanceRepository::class)
 */
class Relance
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("relance:read")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"relance:read", "relance:write"})
     */
    private $type_relance;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"relance:read", "relance:write"})
     */
    private $objet;

    /**
     * @ORM\Column(type="text")
     * @Groups({"relance:read", "relance:write"})
     */
    private $contenu;

    /**
     * @ORM\Column(type="date")
     * @Groups({"relance:read", "relance:write"})
     */
    private $date_echeance;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"relance:read", "relance:write"})
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="relances")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"relance:read", "relance:write"})
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=Commande::class, inversedBy="relances")
     * @Groups({"relance:read", "relance:write"})
     */
    private $commande;

    /**
     * @ORM\Column(type="datetime_immutable")
     * @Groups("relance:read")
     */
    private $created_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeRelance(): ?bool
    {
        return $this->type_relance;
    }

    public function setTypeRelance(bool $type_relance): self
    {
        $this->type_relance = $type_relance;

        return $this;
    }

    public function getObjet(): ?string
    {
        return $this->objet;
    }

    public function setObjet(string $objet): self
    {
        $this->objet = $objet;

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

    public function getDateEcheance(): ?\DateTimeInterface
    {
        return $this->date_echeance;
    }

    public function setDateEcheance(\DateTimeInterface $date_echeance): self
    {
        $this->date_echeance = $date_echeance;

        return $this;
    }

    public function getStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(bool $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): self
    {
        $this->commande = $commande;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}
