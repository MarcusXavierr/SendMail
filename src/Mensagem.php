<?php
    
    class Mensagem{
        private $destinatario;
        private $assunto;
        private $mensagem;
        private $msgvalida;
        private $remetente;



        //GETTERS
        public function getDestinatario(){
            return $this->destinatario;
        }

        public function getAssunto(){
            return $this->assunto;
        }

        public function getMensagem(){
            return $this->mensagem;
        }

        public function getRemetente(){
            return $this->remetente;
        }

        public function getMsgValida(){
            return $this->msgvalida;
        }

        //SETTERS
        private function setDestinatario($destinatario){
            $this->destinatario = $destinatario;
        }

        private function setAssunto($assunto){
            $this->assunto = $assunto;
        }

        private function setMensagem($mensagem){
            $this->mensagem = $mensagem;
        }

        private function setRemetente($remetente){
            $this->remetente = $remetente;
        }

        //CONSTRUCTOR
        public function __construct($destinatario,$assunto,$mensagem,$remetente){
            $this->setDestinatario($destinatario);
            $this->setAssunto($assunto);
            $this->setMensagem($mensagem);
            $this->setRemetente($remetente);
            if(empty($this->getDestinatario()) || empty($this->getAssunto())||empty($this->getMensagem()) ||empty($this->getRemetente())){
                $this->msgvalida = false;
            } else{
                $this->msgvalida = true;
            }
        }

    }
?>