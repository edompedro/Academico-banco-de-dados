<?php

    require_once("Curso.php");

    class CursoDAO {
        
        private function getConexao() {
            $scon = "pgsql:host=localhost;dbname=academico;port=5432";      
            $con = new PDO($scon, "postgres", "root");
            if($con){
                echo"conectando";
            }else{
                echo"falhando";
            }
            return $con;
        }
        

        public function inserir($curso) {
            $bd = $this->getConexao();
            $sql = 'INSERT INTO "Curso" ("nome", "area", "cargaHoraria", "dataFundacao") VALUES (?, ?, ?, ?)';
            $stm = $bd->prepare($sql);
            $stm->bindValue(1, $curso->getNome());
            $stm->bindValue(2, $curso->getArea());
            $stm->bindValue(3, $curso->getCarga());
            $stm->bindValue(4, $curso->getDate());
            $res = $stm->execute();
            if($res) {
                return true;
            }else{
                return false;
            }
            $curso->setCod($bd->lastInsertId());
            $stm->closeCursor();
            $bd = NULL;
        }

        public function excluir($id) {
            $bd = $this->getConexao();
            $sql = 'DELETE FROM "Curso" WHERE id = ?';
            $stm = $bd->prepare($sql);
            $stm->bindParam(1, $id);
            $res = $stm->execute();
            if($res){
                return true;
            }else{
                return false;
            }
            $stm->closeCursor();
            $bd = NULL;
        }

        public function busca($id) {
            $bd = $this->getConexao();
            $sql = 'SELECT * FROM "Curso" WHERE id = ?';
            $stm = $bd->prepare($sql);
            $stm->bindParam(1, $id);
            $res = $stm->execute();
            if($res){
                $resp = $stm->fetch(PDO::FETCH_ASSOC);
                $curso = new curso ($resp['nome'],$resp['area'],$resp['cargaHoraria'],$resp['dataFundacao']);
                $curso->setCod($resp['id']);
                return $curso; 
            }else{
                return false;
            }
        }

        public function lista($limit, $offset) {
            $bd = $this->getConexao();
            $sql = 'SELECT * FROM "Curso" LIMIT ? OFFSET ?';
            $stm = $bd->prepare($sql);
            $stm->bindParam(1, $limit);
            $stm->bindParam(2, $offset);
            $res = $stm->execute();
            $lista = array();
            if($res) {
                while($linha = $stm->fetch(PDO::FETCH_ASSOC)){
                    $curso = new Curso($linha['nome'],$linha['area'],$linha['cargaHoraria'],$linha['dataFundacao']);
                    $curso->setCod(intval($linha['id']));
                    array_push($lista,$curso);
                }
                return $lista;
            }else {
                return false;
            }
            $stm->closeCursor();
            $bd = NULL;
        }

        public function altera($curso) {
            $bd = $this->getConexao();
            $sql = 'UPDATE "Curso" set "nome" = ?, "area" = ?, "cargaHoraria" = ?, "dataFundacao" = ? WHERE "id" = ?';
            $stm = $bd->prepare($sql);
            $stm->bindValue(1,$curso->getNome());
            $stm->bindValue(2,$curso->getArea());
            $stm->bindValue(3,$curso->getCarga());
            $stm->bindValue(4,$curso->getDate());
            $stm->bindValue(5,$curso->getCod());
            $res = $stm->execute();
            if($res) {
                return true;
            }else{
                return false;
            }
            $stm->closeCursor();
            $bd = NULL;
        }

        public function salva($curso){  //dar um jeito de ver se tem id ou não
            $verfi = $curso->getCod();
            if($verfi !== NULL){
                $this->inserir($curso);
            }else {
                $this->altera($curso);
            }
        }

    }

?>