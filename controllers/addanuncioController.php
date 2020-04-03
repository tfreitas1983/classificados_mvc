<?php

class addanuncioController extends controller {
        
    public function index() {

        $dados = array();    
       
       if(empty($_SESSION['cLogin'])) {   ?>
            <script type="text/javascript">window.location.href="./login";</script>
            <?php  exit;
        } 
        
        
        $a = new Anuncios();
        $u = new Usuarios();
        $c = new Categorias();
        $cats = $c->getLista();

        
       if(isset($_POST['titulo']) && !empty($_POST['titulo'])) {

            $titulo = addslashes($_POST['titulo']);
            $categoria = addslashes($_POST['categoria']);
            $valor = addslashes($_POST['valor']);
            $descricao = addslashes($_POST['descricao']);
            $estado = addslashes($_POST['estado']); 

       
                  
            $a->addAnuncio($titulo, $categoria, $valor, $descricao, $estado); 
        
        }

            $dados['cats'] = $cats; 
            $dados['a'] = $a;

        
        
            $this->loadTemplate('addanuncio', $dados); 

    }
            
   
}
?>