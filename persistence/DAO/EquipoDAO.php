<?php
require_once('GenericDAO.php');

class EquipoDAO extends GenericDAO {

  const TEAMS_TABLE = 'equipos';

  public function insert($nombre , $estadio) {
    // Implementar la inserción en la base de datos
        $query = "INSERT INTO " . self::TEAMS_TABLE .
        " (nombre, estadio) VALUES(?,?)";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'ss', $nombre, $estadio);
        return $stmt->execute();
  }

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


  public function delete($id) {
    $query = "DELETE FROM " . self::TEAMS_TABLE . " WHERE id =?";
    $stmt = mysqli_prepare($this->conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    return $stmt->execute();
  }

  public function checkExists($id) {
    $query = "SELECT user, password FROM " . self::TEAMS_TABLE . " WHERE id=?";
    $stmt = mysqli_prepare($this->conn, $query);
    mysqli_stmt_bind_param($stmt, 'ss', $id);
    if(mysqli_stmt_execute($stmt)>0)
      return true;
    else
      return false;
  }
}

