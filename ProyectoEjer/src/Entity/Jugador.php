<?php

namespace App\Entity;

use App\Repository\JugadorRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JugadorRepository::class)]
class Jugador
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['jugador:list'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['jugador:list', 'equipo:list'])]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    #[Groups(['jugador:list', 'equipo:list'])]
    private ?string $apellido = null;

    #[ORM\Column]
    #[Groups(['jugador:list'])]
    private ?int $edad = null;

    #[ORM\ManyToOne]
    #[Groups(['jugador:list'])]
    private ?Entrenador $entrenador = null;

    #[ORM\ManyToOne]
    #[Groups(['jugador:list', 'equipo:list'])]
    private ?Equipo $equipo = null;

    /*No es neceario poner direccion bidireccional. Se pueden obtener
    los jugadores que entrena un entrenador simplemente haciendo una consulta
    a la entidad jugador. */
public function getEntrenador (): ?Entrenador
{
    return $this -> entrenador;
}

public function setEntrenador(Entrenador $entrenador): self
{
    $this -> entrenador = $entrenador;
    return $this;
}

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

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): static
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getEdad(): ?int
    {
        return $this->edad;
    }

    public function setEdad(int $edad): static
    {
        $this->edad = $edad;

        return $this;
    }

    public function getEquipo(): ?Equipo
    {
        return $this->equipo;
    }

    public function setEquipo(?Equipo $equipo): static
    {
        $this->equipo = $equipo;

        return $this;
    }

}
