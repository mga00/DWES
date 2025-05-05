<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

//use App\Entity\Jugador;
use App\Service\JugadorService;
use App\Repository\JugadorRepository;

// use Doctrine\Persistence\ManagerRegistry;

final class JugadoresController extends AbstractController
{
    #[Route('/jugadores', name: 'app_jugadores')]
    public function index(): Response
    {
        return $this->render('jugadores/index.html.twig', [
            'controller_name' => 'JugadoresController',
        ]);
    }
    #[Route('/actualizar/jugador/nombre/{id}', name: 'actualizar_nombre_jugador', 
methods: ['POST'])]
public function actualizarNombre(int $id, Request $request, JugadorService 
$jugadorService): Response
{
$data = json_decode($request->getContent(), true);
// Verificamos que el nombre esté presente
if (!isset($data['nombre'])) {
return $this->json(['error' => 'El nombre es obligatorio'], 400);
}
// Delegamos la actualización al servicio
$resultado = $jugadorService->actualizarNombre($id, $data['nombre']);
if (!$resultado) {
return $this->json(['error' => 'Jugador no encontrado'], 404);
}
return $this->json(['mensaje' => 'Nombre actualizado con éxito'], 200);
}

    #[Route('/insertar/{nombre}', name: 'insertar_jugador')] 
    public function insertarjugador(JugadorService $jugadorService, JugadorRepository $jugadorRepository, string $nombre): Response
    { 
        // $entityManager = $doctrine->getManager();
        //$jugador = New Jugador();
        //$jugador->setNombre($nombre);
        //$jugador->setApellido('Saiz');
        //$jugador->setEdad(19);
        //$jugadorRepository->save($jugador, true);
        $jugador= $jugadorService -> crearJugador($nombre);
        $jugadorRepository -> save($jugador, true);
        // Decimos a Doctrine que queremos guardar el jugador
        // $entityManager->persist($jugador);
        // Ejecutar la consulta de guardado
        // $entityManager->flush();
        return new Response('Jugador guardado: '. $jugador->getId());
    }

    #[Route('/buscar/jugador/{id}', name: 'buscar_jugador')]
    public function buscarJugadorId(JugadorRepository $jugadorRepository, int $id): Response
    {
        $jugador = $jugadorRepository->find($id);
        return $this->json($jugador, 200, [], ['jugador:list']);
    }
    
    #[Route('/buscar/jugador/{nombre}', name: 'buscar_jugador_nombre')]
    public function buscarJugadorNombre(JugadorRepository $jugadorRepository, string
    $nombre): Response
    {
        $jugador = $jugadorRepository->findOneBy(array('nombre'=>$nombre));
        return $this->json($jugador, 200, [], ['groups' => 'jugador:list']);
    }
    #[Route('/listarJugadores', name: 'listar_jugadores')]
    public function listarJugadores(JugadorRepository $jugadorRepository): Response
    {
        $jugadores = $jugadorRepository->findAll();
        return $this->json($jugadores, 200, [], ['groups' => 'jugador:list']);
    }   

}
