<?php
// Login n tem uma ligação direta com o BD como user tem. Recebe atributos direto da View

// loadModel('Usuario');

class Login extends Model
{

// mensagens de erro de validação para o Login:    
    public function validate() {
        $errors = [];

        if(!$this->email) {
            $errors['email'] = 'E-mail é um campo obrigatório!';
        }

        if(!$this->senha) {
            $errors['senha'] = 'Por favor, informe a senha!';
        }

        if(count($errors) > 0) { //se a quantidade de erros for maior que 0
            throw new ValidationException($errors);
        }
    }

    public function checkLogin()
    {
        // $this->validate();
        $user = Usuario::getOne(['email' => $this->email, 'senha' => $this->senha ] );
        if ($user) {
            // cadastro_fim_data = se estiver setado, n será    feito o login
            if ($user->cadastro_fim_data) {
                throw new AppException('Usuário está desligado da empresa!');
            }
                //Abaixo: 1° parametro: senha limpa, 2° param. senha obtida do BD(com a criptografia hash, se houver. Como não estou usando hash, não coloquei)
            // if (password_verify($this->senha, $user->senha)) {
            //     return $user;
            // }
            return $user;
        }
        throw new AppException('Usuário ou Senha inválidos!');
    }
}
