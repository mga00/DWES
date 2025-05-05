<?php

namespace App\Entity;

use App\Repository\EquipoRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipoRepository::class)]
class Equipo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['equipo:list'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['jugador:list'])]
    private ?string $nombre = null;

    #[ORM\Column]
    #[Groups(['jugador:list','equipo:list'])]
    private ?int $socios = null;

    #[ORM\Column]
    #[Groups(['jugador:list','equipo:list'])]
    private ?int $fundacion = null;

    #[ORM\Column(length: 255)]
    #[Groups(['jugador:list','equipo:list'])]
    private ?string $ciudad = null;

    #[ORM\ManyToOne(inversedBy: 'equipos')]
    private ?Liga $liga = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getSocios(): ?int
    {
        return $this->socios;
    }

    public function setSocios(int $socios): static
    {
        $this->socios = $socios;

        return $this;
    }

    public function getFundacion(): ?int
    {
        return $this->fundacion;
    }

    public function setFundacion(int $fundacion): static
    {
        $this->fundacion = $fundacion;

        return $this;
    }

    public function getCiudad(): ?string
    {
        return $this->ciudad;
    }

    public function setCiudad(string $ciudad): static
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    public function getLiga(): ?Liga
    {
        return $this->liga;
    }

    public function setLiga(?Liga $liga): static
    {
        $this->liga = $liga;

        return $this;
    }
}
