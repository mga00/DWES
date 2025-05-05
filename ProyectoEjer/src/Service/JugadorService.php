<?php

//Logica de los jugadores (Crear jugador, actualizar, eliminar, ...)
namespace App\Service;

use App\Entity\Jugador;
use App\Repository\JugadorRepository;
class JugadorService
{
    private JugadorRepository $jugadorRepository;
    public function __construct(JugadorRepository $jugadorRepository)
    {
        $this->jugadorRepository = $jugadorRepository;
    }
    public function crearJugador(string $nombre, string $apellidos = 'Saiz', int
    $edad = 19): Jugador
    {
        $jugador = new Jugador();
        $jugador->setNombre($nombre);
        $jugador->setApellido($apellidos);
        $jugador->setEdad($edad);
        return $jugador;
    }
        public function actualizarNombre(int $id, string $nuevoNombre): bool
    {
// Buscar el jugador en la base de datos
        $jugador = $this->jugadorRepository->find($id);
        if (!$jugador) {
            return false;
        }
// Actualizar el nombre del jugador
        $jugador->setNombre($nuevoNombre);
// Guardar cambios
        $this->jugadorRepository->save($jugador, true);
        return true;
    }
}
