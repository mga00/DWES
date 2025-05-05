<?php

namespace App\Controller;

use App\Entity\Jugador;
use App\Entity\Equipo;
use App\Entity\Liga;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use Doctrine\ORM\EntityManagerInterface;

final class EjerciciosDoctrineController extends AbstractController
{
    // a) Mostrar nombre de jugador y su equipo por ID
    #[Route('/jugador/{id}', name: 'mostrarJugador')]
    public function mostrarJugador (int $id, EntityManagerInterface $em): 
    Response{
        $jugador = $em -> getRepository(Jugador::class) -> find ($id);
        if(!$jugador){
            return new Response("Jugador no encontrado");
        }
        $equipo = $jugador -> getEquipo();
        $equipoNombre = $equipo ? $equipo -> getNombre() : "Sin equipo";

        return new Response("Jugador: {$jugador -> getNombre()} - Equipo: $equipoNombre");
    }
    // b) Mostrar equipos de una liga por su código
    #[Route('/liga/{id}/equipos', name: 'equiposPorLiga')]
    public function mostrarEquiposPorLiga(string $codigo, EntityManagerInterface $em): Response
    {
        $liga = $em->getRepository(Liga::class)->findOneBy(['codigo' => $codigo]);
 
        if (!$liga) {
            return new Response("Liga no encontrada");
        }
 
        $equipos = $liga->getEquipos(); // Relación OneToMany
        $nombres = array_map(fn($e) => $e->getNombre(), $equipos->toArray());
 
        return new Response("Equipos en la liga $codigo: " . implode(', ', $nombres));
    }
 
    // c) Mostrar jugadores de una liga por su código
    #[Route('/liga/{id}/jugadores', name: 'jugadoresPorLiga')]
    public function mostrarJugadoresPorLiga(string $codigo, EntityManagerInterface $em): Response
    {
        $liga = $em->getRepository(Liga::class)->findOneBy(['codigo' => $codigo]);
 
        if (!$liga) {
            return new Response("Liga no encontrada");
        }
 
        $jugadores = [];
 
        foreach ($liga->getEquipos() as $equipo) {
            foreach ($equipo->getJugadores() as $jugador) {
                $jugadores[] = $jugador->getNombre();
            }
        }
 
        return new Response("Jugadores en la liga $codigo: " . implode(', ', $jugadores));
    }
}

