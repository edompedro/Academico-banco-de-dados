<?php 

    class Curso {
        private $nome;
        private $area;
        private $cargaHoraria;
        private $dataFundacao;

        public function __construct($nome, $area, $cargaHoraria, $dataFundacao) {
            $this->nome = $nome;
            $this->area = $area;
            $this->cargaHoraria = $cargaHoraria;
            $this->dataFundacao = $dataFundacao;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }
        public function getNome() {
            return $this->nome;
        }

        public function setArea($area) {
            $this->area = $area;
        }
        public function getArea() {
            return $this->area;
        }

        public function setCarga($carga) {
            $this->cargaHoraria = $carga;
        }
        public function getCarga() {
            return $this->cargaHoraria;
        }

        public function setDate($date) {
            $this->dataFuncadao = $date;
        }
        public function getDate() {
            $date = new DateTime($this->dataFundacao);
            return $date->format('d/m/Y');        
        }

        public function getCod() {
            return $this->cod;
        }
        public function setCod($cod) {
            $this->cod = $cod;
        }

    }

?>