<?php

class anunciosController extends controller {
        
    public function index() {
        
        $dados = array();

        if(empty($_SESSION['cLogin'])) {
            
            ?>

            <script type="text/javascript">window.location.href="./login";</script>
                        
            <?php
            exit;
        } 
        
		$a = new Anuncios();
		$anuncios = $a->getMeusAnuncios();

        $dados['anuncios'] = $anuncios;

        $this->loadTemplate('anuncios', $dados);           

    }

    
}
?>

