<?php
    
    require_once 'database.php';
    
    class user extends Modelo{

        public function __construct(){
            parent::__construct();
        }

        public function getUsers(){
            $users = $this->db->query(" SELECT usuarios.nombre as NOMBRE, 
                                        roles.nombre as CARGO, email as EMAIL 
                                        FROM usuarios inner join roles 
                                        where usuarios.idRoles = roles.idRoles 
                                        order by CARGO"); 

            return $users->fetchall();
        }

        public function getUsersIdUsers($id){
            $users = $this->db->query(" SELECT usuarios.idUsuarios AS ID, usuarios.nombre AS NOMBRE, roles.nombre AS CARGO, email AS EMAIL, activo AS ACTIVO 
                                        FROM usuarios INNER JOIN roles on  usuarios.idRoles = roles.idRoles
                                        WHERE usuarios.idUsuarios = $id"); 

            return $users->fetch();
        }

        public function setUsers($nombre, $email, $password, $rol){
            $users = $this->db->prepare("INSERT INTO usuarios VALUES(null, ?, ?, ?, ?)");
            $users->bindParam(1,$nombre);
            $users->bindParam(2,$email);
            $users->bindParam(3,$password);
            $users->bindParam(4,$rol);
            $users->execute();

            return $users->fetch();

        }
     
        public function getUserByEmail($email){
            $sql = "SELECT * FROM usuarios  WHERE email = ?";
            $query = $this->db->prepare($sql);
            $query->bindParam(1,$email);
            $query->execute();
            return $query->fetch();
        }

        public function getUsersId($email){

            $user = $this->db->query("  SELECT email, nombre, password, idRoles  
                                        FROM usuarios 
                                        WHERE email = '$email' AND activo = 1 "); 

            return $user->fetch();
        }

        function getFullRoles($id){
            $sql = "SELECT usuarios.idUsuarios AS ID, usuarios.nombre AS NOMBRE, roles.nombre AS CARGO, roles.idRoles AS ROL, email AS EMAIL, activo AS ACTIVO 
                    FROM usuarios INNER JOIN roles ON  usuarios.idRoles = roles.idRoles
                    WHERE usuarios.idUsuarios = $id;";
            
            return ($this->db->query($sql))->fetch();

        }

        public function getUsuRoles(){
            $users = $this->db->query(" SELECT u.idUsuarios as ID, r.nombre AS CARGO, u.nombre AS USUARIO, u.email AS EMAIL, u.activo AS ACTIVO 
                                        FROM roles r INNER JOIN usuarios u 
                                        ON r.idRoles =  u.idRoles");
            return $users->fetchall();
        }

        public function getRoles(){
           $sql = "SELECT idRoles, nombre FROM roles";  
           return ($this->db->query($sql))->fetchall();
        }

        public function searchEmail($email){
            $sql = "SELECT count(*) FROM usuarios WHERE email = ?";
            $consulta = $this->db->prepare($sql);
            $consulta->bindparam(1,$email);
            $consulta->execute();
           return $consulta->fetch();
        }

        public function statisticUsers(){
            $users = $this->db->query( "SELECT count(usuarios.idUsuarios) AS Total, roles.nombre AS Cargo 
                                        FROM usuarios INNER JOIN roles 
                                        WHERE usuarios.idRoles = roles.idRoles 
                                        GROUP BY roles.idRoles");
            return $users->fetchall();
        }

        public function updateUsers($id, $cargo, $usuario, $email, $activo){
            $users = $this->db->prepare("UPDATE usuarios SET idRoles = ?,  
                                        nombre = ?, 
                                        email = ?,
                                        activo = ?
                                        WHERE idUsuarios = ?
                                        ");
            $users->bindParam(1,$cargo);
            $users->bindParam(2,$usuario);
            $users->bindParam(3,$email);
            $users->bindParam(4,$activo);
            $users->bindParam(5,$id);

            $users->execute();

            return $users->rowCount();

        }

        public function setUser($nombre,$email, $pass, $rol){
            $sql = "INSERT INTO usuarios(nombre,email,password,idRoles) values(?,?,?,?);";
            $consulta = $this->db->prepare($sql);
            $consulta->bindParam(1,$nombre);
            $consulta->bindParam(2,$email);
            $consulta->bindParam(3,$pass);
            $consulta->bindParam(4,$rol);

            $consulta->execute();

            return $consulta->rowCount();
        }

        public function setAcountUser($nombre, $email, $image, $id){
            $sql = "UPDATE usuarios SET nombre = ?, email = ?, imagen = ? WHERE idUsuarios = ? ";
            $query = $this->db->prepare($sql);
            $query->bindParam(1, $nombre);
            $query->bindParam(2, $email);
            $query->bindParam(3, $image);
            $query->bindParam(4, $id);          
            $query->execute();
            
            return $query->rowCount();
        }

    }

?>