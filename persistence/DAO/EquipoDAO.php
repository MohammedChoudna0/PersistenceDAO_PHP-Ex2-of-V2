<?php
require_once('GenericDAO.php');

class EquipoDAO extends GenericDAO {

  const TEAMS_TABLE = 'equipos';


  public function selectAll() {

        $query = "SELECT * FROM " . self::TEAMS_TABLE;
        $result = mysqli_query($this->conn, $query);
        $equipos= array();
        while ($equipo = mysqli_fetch_array($result)) {
        $equipo = array(
            'id' => $equipo["id"],
            'nombre' => $equipo["nombre"],
            'estadio' => $equipo["estadio"],
        );
        array_push($equipos, $equipo);
        }
        return $equipos;
  

  }

}

