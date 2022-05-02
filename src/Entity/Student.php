<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     collectionOperations={"get", "post"},
 *     itemOperations={"put", "patch","delete"},
 * )
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 */
class Student
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"student:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     * @Groups({"student:read"})
     */
    private $FirstName;

    /**
     * @ORM\Column(type="string", length=25)
     * @Groups({"student:read"})
     */
    private $LastName;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"student:read"})
     */
    private $NumEtud;

    /**
     * @ORM\ManyToOne(targetEntity=Departement::class, inversedBy="student")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"student:read"})
     */
    private $departement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->FirstName;
    }

    public function setFirstName(string $FirstName): self
    {
        $this->FirstName = $FirstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    public function setLastName(string $LastName): self
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getNumEtud(): ?int
    {
        return $this->NumEtud;
    }

    public function setNumEtud(int $NumEtud): self
    {
        $this->NumEtud = $NumEtud;

        return $this;
    }

    public function getDepartement(): ?Departement
    {
        return $this->departement;
    }

    public function setDepartement(?Departement $departement): self
    {
        $this->departement = $departement;

        return $this;
    }
}
