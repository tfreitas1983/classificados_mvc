<?php

class adicionarController extends controller {
        
    public function index() {

        $dados = array();    
        
       
        if(empty($_SESSION['cLogin'])) {   ?>
            <script type="text/javascript">window.location.href="./login";</script>
                       
            <?php 
            exit;
        } 
        
        $a = new Anuncios();
        $c = new Categorias();
        $cats = $c->getLista();

        if(isset($_POST['titulo']) && !empty($_POST['titulo'])) {
            $titulo = addslashes($_POST['titulo']);
            $categoria = addslashes($_POST['categoria']);
            $valor = addslashes($_POST['valor']);
            $descricao = addslashes($_POST['descricao']);
            $estado = addslashes($_POST['estado']);
                  
            $a->addAnuncio($titulo, $categoria, $valor, $descricao, $estado); 

            $dados['titulo'] = $titulo;
            $dados['categoria'] = $categoria;
            $dados['valor'] = $valor;
            $dados['descricao'] = $descricao;
            $dados['estado'] = $estado;
      
            $dados['cats'] = $cats; 
            
           
            ?> <div class="alert alert-success"> Produto adicionado com sucesso! </div>  <?php
        
        }

            $this->loadTemplate('addanuncio', $dados);     
       
    }
}
?>