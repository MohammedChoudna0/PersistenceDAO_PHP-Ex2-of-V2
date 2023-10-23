<?php
    require_once('GenericDAO.php');

    class PartidoDAO extends GenericDAO {
    const MATCHES_TABLE = 'partidos';


    public function selectAll() {
        $query = "SELECT Partidos.id, equipo1.nombre AS equipo1_nombre, equipo2.nombre AS equipo2_nombre, resultado 
                  FROM " . self::MATCHES_TABLE . " 
                  JOIN Equipos AS equipo1 ON Partidos.equipo1_id = equipo1.id 
                  JOIN Equipos AS equipo2 ON Partidos.equipo2_id = equipo2.id";
        $result = mysqli_query($this->conn, $query);
        $partidos = array();
        while ($row = mysqli_fetch_array($result)) {
            $partido = [
                'id' => $row['id'],
                'equipo1_nombre' => $row['equipo1_nombre'],
                'equipo2_nombre' => $row['equipo2_nombre'],
                'resultado' => $row['resultado'],
            ];
            array_push($partidos, $partido);
        }
    
        return $partidos;
    }
    

}



