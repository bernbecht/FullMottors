<?php

require_once 'CConexao.php';

class CProduto {

    protected $nome;
    protected $marca;
    protected $descricao;
    protected $data;
    protected $preco;
    protected $categoria;
    protected $caracteristica;

    public function incluirProduto($conexao, $n, $m, $desc, $d, $p, $c, $caract, $prazo, $parcelas) {
        $this->nome = $n;
        $this->marca = $m;
        $this->descricao = $desc;
        $this->marca = $m;
        $this->data = $d;
        $this->preco = $p;
        $this->categoria = $c;
        $this->caracteristica = $caract;


        //$conexao1 = new CConexao();
        //$conexao = $conexao1->novaConexao();

        $incluir = pg_query($conexao, "INSERT INTO PRODUTO(nome,data,descricao,marca,preco,categoria, caract, prazo, parcelas) 
             VALUES('$this->nome',                
                 '$this->data',
                 '$this->descricao',
                 '$this->marca',
                 $this->preco,
                 '$this->categoria',
                '$this->caracteristica',
                 $prazo,
                 $parcelas) RETURNING id_produto");


        //$conexao1->closeConexao();

        $resultado = pg_fetch_object($incluir);

        return $resultado->id_produto;
    }

    public function editarProduto($conexao, $n, $m, $desc, $d, $p, $c, $caract, $id, $prazo, $parcelas) {
        $this->nome = $n;
        $this->marca = $m;
        $this->descricao = $desc;
        $this->marca = $m;
        $this->data = $d;
        $this->preco = $p;
        $this->categoria = $c;
        $this->caracteristica = $caract;


        //$conexao1 = new CConexao();
        //$conexao = $conexao1->novaConexao();

        $incluir = pg_query($conexao, "UPDATE produto
                                       SET nome='$n', 
                                            descricao='$desc', 
                                            marca='$m', 
                                            preco = $p, 
                                            caract= '$caract', 
                                            categoria='$c',
                                            prazo = $prazo,
                                            parcelas = $parcelas
                                       WHERE id_produto=$id");


        //$conexao1->closeConexao();

        return incluir;
    }

    public function consutaRecentes($limit) {

        $conexao1 = new CConexao();
        $conexao = $conexao1->novaConexao();

        $consulta = pg_query($conexao, "select * 
                from produto 
                inner join img 
                on produto.id_produto = img.id_produto 
                and img.funcao_img = 1 
                order by produto.data desc 
                limit $limit");

        $conexao1->closeConexao();

        return $consulta;
    }

    //usado para mostrar as descrições e imagem de um produto na PAGINA
    public function consultaProduto($id) {
        $conexao1 = new CConexao();
        $conexao = $conexao1->novaConexao();

        $consulta = pg_query($conexao, "select * 
                from produto  
                inner join img 
                on  produto.id_produto = img.id_produto
                and img.funcao_img = 1 
                and  produto.id_produto =$id");

        $conexao1->closeConexao();

        return $consulta;
    }
    
     //usado para mostrar as descrições de um produto no SISTEMA
    public function consultaProdutoSemFoto($id) {
        $conexao1 = new CConexao();
        $conexao = $conexao1->novaConexao();

        $consulta = pg_query($conexao, "select * 
                from produto  
                where produto.id_produto =$id");

        $conexao1->closeConexao();

        return $consulta;
    }

    //consulta um produto e sua imagem passando marca e/ou categoria. Usada no ajax do menu da BOUTIQUE
    public function consultaProdutoMarcaCategoria($m, $c, $l, $o) {
        $conexao1 = new CConexao();
        $conexao = $conexao1->novaConexao();

        $consulta = pg_query($conexao, "select * 
                from produto  
                inner join img 
                on  produto.id_produto = img.id_produto 
                and img.funcao_img = 1 
                and categoria ~* '$c' 
                and marca  ~* '$m' 
                order by nome  limit $l offset $o");

        $conexao1->closeConexao();

        return $consulta;
    }
    
    //consulta um produto passando marca e/ou categoria. Usada no ajax para listar os produtos no SISTEMA
    public function consultaProdutoMarcaCategoriaSemFoto($m, $c, $l, $o) {
        $conexao1 = new CConexao();
        $conexao = $conexao1->novaConexao();

        $consulta = pg_query($conexao, "select * 
                from produto
                where categoria ~* '$c' 
                and marca  ~* '$m' 
                order by nome  limit $l offset $o");

        $conexao1->closeConexao();

        return $consulta;
    }

}

?>
