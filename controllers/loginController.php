<?php
class loginController extends controller {

    public function index () {

        $dados = array();
            $u = new Usuarios();
        
            if(isset($_POST['email']) && !empty($_POST['email'])) {
                        $email = addslashes($_POST['email']);
                        $senha = $_POST['senha']; 

                    if($u->login($email, $senha)) {
                        ?>

                        <script type="text/javascript">window.location.href="./";</script>
                        
                        <?php
                    } else {
                        ?>
                        <div class="alert alert-danger"> Usuário e/ou Senha errados! </div>
                        <?php
                    }
                        $login = $u->login($email, $senha);
                        $dados['login'] = $login;
            }
    
            $this->loadTemplate('login', $dados);
	      
    }	 
    
    public function sair(){
       
        session_start();
        unset($_SESSION['cLogin']);
        header("Location: ".BASE_URL);

    }
}

?>