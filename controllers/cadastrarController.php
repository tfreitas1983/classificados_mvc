<?php

class cadastrarController extends controller {
        
     public function index() {
    
        $dados = array();    

        $u = new Usuarios();

	    if(isset($_POST['email']) && !empty($_POST['email'])) {
            $nome = $_POST['nome'];
            $email = addslashes($_POST['email']);
            $senha = $_POST['senha'];
            $tel = $_POST['tel'];
        

            $add = $u->cadastrar($nome, $email, $senha, $tel);
            $dados['add'] = $add;
    
        }
        $this->loadTemplate('cadastrar', $dados);

    }
}

?>
