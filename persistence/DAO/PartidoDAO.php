<?php
    require_once('GenericDAO.php');

    class PartidoDAO extends GenericDAO {
    const MATCHES_TABLE = 'partidos';

    public function insert($equipo1_id, $equipo2_id, $resultado) {
        $query = "INSERT INTO " . self::MATCHES_TABLE . " (equipo1_id, equipo2_id, resultado) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'iis',  $equipo1_id, $equipo2_id, $resultado);
        return $stmt->execute();
        
    }

    public function selectAll() {
        $query = "SELECT * FROM " . self::MATCHES_TABLE;
        $result = mysqli_query($this->conn, $query);

        $partidos = array();
        while ($row = mysqli_fetch_array($result)) {
        $partido = [
            'id' => $row['id'],
            'equipo1_id' => $row['equipo1_id'],
            'equipo2_id' => $row['equipo2_id'],
            'resultado' => $row['resultado'],
        ];
        array_push($partidos, $partido);
        }

        return $partidos;
    }

    public function delete($id) {
        $query = "DELETE FROM " . self::MATCHES_TABLE . " WHERE id = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        return $stmt->execute();
        }
}



