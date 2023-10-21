<?php
    require_once('GenericDAO.php');

    class PartidoDAO extends GenericDAO {
    const MATCHES_TABLE = 'partidos';


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

}



