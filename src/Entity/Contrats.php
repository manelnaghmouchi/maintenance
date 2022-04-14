<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ContratsRepository;
use Symfony\Component\Serializer\Annotation\Groups;
/**
 * @ORM\Entity(repositoryClass=ContratsRepository::class)
 * normalizationContext={"groups"={"clients"}},
 * denormalizationContext={"groups"={"clients"}}
 */
/**
 * Contrats
 *
 * @ORM\Table(name="contrats")
 * @ORM\Entity
 */
class Contrats
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @Groups({"clients"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")

     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="societes_id", type="integer", nullable=false, options={"unsigned"=true})
     * @Groups({"clients"})
     */
    private $societesId;

    /**
     * @var string
     *
     * @ORM\Column(name="ref", type="string", length=255, nullable=false)
     * @Groups({"clients"})
     */
    private $ref;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="montant", type="integer", nullable=false)
     * @Groups({"clients"})
     */
    private $montant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSocietesId(): ?int
    {
        return $this->societesId;
    }

    public function setSocietesId(int $societesId): self
    {
        $this->societesId = $societesId;

        return $this;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }


}
