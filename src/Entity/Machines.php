<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\MachinesRepository;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Machines
 *
 * @ORM\Table(name="machines")
 * @ORM\Entity
 */
class Machines
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @Groups({"machines"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="modele", type="string", length=255, nullable=false)
     * @Groups({"machines"})
     */
    private $modele;

    /**
     * @var int
     *
     * @ORM\Column(name="taille_id", type="integer", nullable=false)
     */
    private $tailleId;

    /**
     * @var bool
     *
     * @ORM\Column(name="dispo", type="boolean", nullable=false)
     */
    private $dispo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getTailleId(): ?int
    {
        return $this->tailleId;
    }

    public function setTailleId(int $tailleId): self
    {
        $this->tailleId = $tailleId;

        return $this;
    }

    public function getDispo(): ?bool
    {
        return $this->dispo;
    }

    public function setDispo(bool $dispo): self
    {
        $this->dispo = $dispo;

        return $this;
    }


}
