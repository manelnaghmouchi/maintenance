<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ContratsMachinesRepository;
use Symfony\Component\Serializer\Annotation\Groups;
/**
 * @ORM\Entity(repositoryClass=ContratsMachinesRepository::class)
 * normalizationContext={"groups"={"contrat"}},
 * denormalizationContext={"groups"={"contrat"}}
 */
/**
 * ContratsMachines
 *
 * @ORM\Table(name="contrats_machines")
 * @ORM\Entity
 */
class ContratsMachines
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @Groups({"contrat"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="contrats_id", type="integer", nullable=false, options={"unsigned"=true})
     * @Groups({"contrat"})
     */
    private $contratsId;

    /**
     * @var int
     *
     * @ORM\Column(name="machines_id", type="integer", nullable=false, options={"unsigned"=true})
     * @Groups({"contrat"})
     */
    private $machinesId;

    /**
     * @var int
     *
     * @ORM\Column(name="nombre", type="integer", nullable=false, options={"unsigned"=true})
     * @Groups({"contrat"})
     */
    private $nombre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContratsId(): ?int
    {
        return $this->contratsId;
    }

    public function setContratsId(int $contratsId): self
    {
        $this->contratsId = $contratsId;

        return $this;
    }

    public function getMachinesId(): ?int
    {
        return $this->machinesId;
    }

    public function setMachinesId(int $machinesId): self
    {
        $this->machinesId = $machinesId;

        return $this;
    }

    public function getNombre(): ?int
    {
        return $this->nombre;
    }

    public function setNombre(int $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }


}
