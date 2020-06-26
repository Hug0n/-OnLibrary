<?php

loadModel('Pessoa');

class Usuario extends Pessoa
{
    private $id_usuario;

    private $nome;
    private $sobrenome;
    private $data_nasc;
    private $genero;
    private $email;
    private $senha;
    private $img_usuario;

    private $cidade;
    private $uf;
    private $rua;
    private $bairro;
    private $complemento;

    private $telefone;
    private $celular;


    protected static $tableName = 'usuario'; //usado pra pegar o nome da tabela no model
    protected static $columns = [
        'id_usuario',
        'nome',
        'email',
        'senha',
        'data_nasc',
        'sexo',
        'sobrenome',
        'cadastro_data',
        'cadastro_fim_data',
        'is_admin',
        'imagem_usuario'
    ];

    function getDiretorioImagemUser()
    {

        $diretorio = 'assets/css/imagens/upload/userProfile/';
        return $diretorio;
    }

    //Editar Perfil

    //***************PESSOAL***************

    function updatePessoal($id_usuario, $nome, $sobrenome, $email, $senha, $data_nasc, $genero, $imagem_usuario)
    {
        $sqlUpdatePessoal = "UPDATE usuario SET nome='$nome', sobrenome='$sobrenome', email= '$email', senha='$senha', data_nasc='$data_nasc', sexo='$genero', imagem_usuario='$imagem_usuario' WHERE id_usuario = $id_usuario";

        $conn = Database::executarSQL($sqlUpdatePessoal);

        if ($conn) {
            return $conn;
        } else {
            echo "erro no query da classe Usuario (updatePessoal())!";
        }
    }
    //***************FIM - PESSOAL***************

    //***************ENDEREÇO***************

    function updateEndereco($id_usuario, $cidade, $uf, $rua, $bairro, $complemento)
    {
        $sqlUpdateEndereco = "UPDATE endereco_usuario SET cidade='$cidade', uf='$uf', rua= '$rua', bairro='$bairro', complemento='$complemento' WHERE id_usuario_end = $id_usuario";

        $conn = Database::executarSQL($sqlUpdateEndereco);

        if ($conn) {
            return $conn;
        } else {
            echo "erro no query da classe Usuario (updateEndereco())!";
        }
    }

    //***************FIM - ENDEREÇO***************

    //***************TELEFONE***************

    function updateTelefone($id_usuario, $telefone, $celular)
    {
        $sqlUpdateTelefone = "UPDATE telefone_usuario SET telefone1='$telefone', telefone2='$celular' WHERE id_usuario_fone = $id_usuario";

        $conn = Database::executarSQL($sqlUpdateTelefone);

        if ($conn) {
            return $conn;
        } else {
            echo "erro no query da classe Usuario (updateTelefone())!";
        }
    }

    //***************FIM - TELEFONE***************

    // CADASTRO
    //Polimorfismo do metódo de Model:
    //ao invés de passar $table como último parâmetro, passo o $ID (que deve ser valor 1 pra retornar o $conn. Se for outro valor, provavelmente será o nome da tabela  ).
    public function insert($columns, $value, $id = '')
    {
        //Se houver o ID retorno a conexão do BD com o $SQL, se não houver $id, só faço a query do $sql no BD (true or false).

        if ($id == 1) {
            $idResult = true;
            $table = static::$tableName;
        } else {
            $idResult = false;
            //impedir que a $table receba '' quando o $id estiver vazio:
            if ($id == '') {
                $table = static::$tableName;
            } else {
                $table = $id;
            }
        }

        $sqlInsertComID = "INSERT INTO " . $table . " ("
            . implode(",", $columns) . ") VALUES (";

        for ($i = 0; $i < count($columns); $i++) {
            echo "$value[$i] <br>";
            $sqlInsertComID .= Model::getFormatedValue($value[$i]) . ",";
        }
        $sqlInsertComID[strlen($sqlInsertComID) - 1] = ')';

        $conn = Database::executarSQL($sqlInsertComID);


        if ($idResult) {
            return $conn;
        } else {
            return true;
        }
    }


    /////////////////

    function getPessoas($id_usuario, $nome_pessoa)
    {
        $sqlGetPessoas = "SELECT *  FROM usuario WHERE id_usuario != $id_usuario AND nome LIKE '%$nome_pessoa%'";

        $conn = Database::executarSQL($sqlGetPessoas);

        if ($conn) {
            $resultadoGetPessoas = mysqli_query($conn, $sqlGetPessoas);
            return $resultadoGetPessoas;
        } else {
            echo "erro no query da classe Posts (getPessoas())!";
        }
    }


    function getPessoasBotao($id_usuario, $idUsuarioQueSigo)
    {
        $sqlGetPessoasBotao = "SELECT *  FROM usuario_seguidores WHERE id_usuario = $id_usuario AND id_usuario_que_sigo = $idUsuarioQueSigo";

        $conn = Database::executarSQL($sqlGetPessoasBotao);

        if ($conn) {
            $resultadoGetPessoasBotao = mysqli_query($conn, $sqlGetPessoasBotao);
            return $resultadoGetPessoasBotao;
        } else {
            echo "erro no query da classe Posts (getPessoasBotao())!";
        }
    }

    function getQtdPosts($idUsuario)
    {
        $sqlGetQtdPosts = "SELECT COUNT(*) AS qtd_posts FROM post WHERE id_usuario_post = $idUsuario";

        $conn = Database::executarSQL($sqlGetQtdPosts);

        if ($conn) {
            $resultadoGetQtdPosts = mysqli_query($conn, $sqlGetQtdPosts);
            return $resultadoGetQtdPosts;
        } else {
            echo "erro no query da classe Posts (getQtdPosts())!";
        }
    }

    function getQtdSeguindo($idUsuario)
    {
        $sqlGetQtdSeguindo = "SELECT COUNT(*) AS qtd_seguindo FROM usuario_seguidores WHERE id_usuario = $idUsuario";

        $conn = Database::executarSQL($sqlGetQtdSeguindo);

        if ($conn) {
            $resultadoGetQtdSeguindo = mysqli_query($conn, $sqlGetQtdSeguindo);
            return $resultadoGetQtdSeguindo;
        } else {
            echo "erro no query da classe Posts (getQtdSeguindo())!";
        }
    }

    function getQtdSeguidores($idUsuario)
    {
        $sqlGetQtdSeguidores = "SELECT COUNT(*) AS qtd_seguidores FROM usuario_seguidores WHERE id_usuario_que_sigo = $idUsuario";

        $conn = Database::executarSQL($sqlGetQtdSeguidores);

        if ($conn) {
            $resultadoGetQtdSeguidores = mysqli_query($conn, $sqlGetQtdSeguidores);
            return $resultadoGetQtdSeguidores;
        } else {
            echo "erro no query da classe Posts (getQtdSeguidores())!";
        }
    }

    //Perfil do Usuário



    function getUsuarios($idUsuario)
    {
        $sqlgetUsuario = "SELECT * FROM usuario INNER JOIN endereco_usuario, telefone_usuario WHERE endereco_usuario.id_usuario_end = $idUsuario AND telefone_usuario.id_usuario_fone = $idUsuario AND id_usuario = $idUsuario";

        $conn = Database::executarSQL($sqlgetUsuario);

        if ($conn) {
            $resultadoGetUsuario = mysqli_query($conn, $sqlgetUsuario);
            return $resultadoGetUsuario;
        } else {
            echo "erro no query da classe Usuario (getUsuario())!";
        }
    }


    function getComentariosPerfil($id_usuario)
    {
        $sql = " SELECT * FROM comentario_livro INNER JOIN usuario ON ID_USUARIO_COMENTOU = usuario.id_usuario WHERE usuario.id_usuario = $id_usuario ORDER BY DATA_COMENTARIO DESC LIMIT 5";

        $conn = Database::executarSQL($sql);

        if ($conn) {
            $resultado_comments_perfil = mysqli_query($conn, $sql);
            return $resultado_comments_perfil;
        } else {
            echo "erro no query da classe Usuario (getComentariosPerfil())!";
        }
    }


    function getMensagensPerfil($id_usuario)
    {
        $sql = "SELECT * FROM mensagens_user_perfil AS m JOIN usuario AS u ON (m.id_usuario_comentou = u.id_usuario) WHERE id_usuario_comentado = $id_usuario ORDER BY data_mensagem DESC";

        $conn = Database::executarSQL($sql);

        if ($conn) {
            $resultado_mensagens_Perfil = mysqli_query($conn, $sql);
            return $resultado_mensagens_Perfil;
        } else {
            echo "erro no query da classe Usuario (getMensagensPerfil())!";
        }
    }

    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of sobrenome
     */
    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    /**
     * Set the value of sobrenome
     *
     * @return  self
     */
    public function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;

        return $this;
    }

    /**
     * Get the value of data_nasc
     */
    public function getData_nasc()
    {
        return $this->data_nasc;
    }

    /**
     * Set the value of data_nasc
     *
     * @return  self
     */
    public function setData_nasc($data_nasc)
    {
        $this->data_nasc = $data_nasc;

        return $this;
    }

    /**
     * Get the value of genero
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     *
     * @return  self
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of senha
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @return  self
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get the value of cidade
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set the value of cidade
     *
     * @return  self
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get the value of uf
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * Set the value of uf
     *
     * @return  self
     */
    public function setUf($uf)
    {
        $this->uf = $uf;

        return $this;
    }

    /**
     * Get the value of rua
     */
    public function getRua()
    {
        return $this->rua;
    }

    /**
     * Set the value of rua
     *
     * @return  self
     */
    public function setRua($rua)
    {
        $this->rua = $rua;

        return $this;
    }

    /**
     * Get the value of bairro
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Set the value of bairro
     *
     * @return  self
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Get the value of complemento
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * Set the value of complemento
     *
     * @return  self
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;

        return $this;
    }

    /**
     * Get the value of telefone
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set the value of telefone
     *
     * @return  self
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get the value of celular
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set the value of celular
     *
     * @return  self
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get the value of id_usuario
     */
    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    /**
     * Set the value of id_usuario
     *
     * @return  self
     */
    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    /**
     * Get the value of img_usuario
     */
    public function getImg_usuario()
    {
        return $this->img_usuario;
    }

    /**
     * Set the value of img_usuario
     *
     * @return  self
     */
    public function setImg_usuario($img_usuario)
    {
        $this->img_usuario = $img_usuario;

        return $this;
    }
}
