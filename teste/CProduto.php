<?php


class CProduto
{

    protected $id_produto,
        $nome, $data, $descricao,
        $view_status, $lancamento,
        $preco, $categoria = null,
        $marca = null,
        $imagens = null;


    public function __construct($id_produto, $nome, $data,
                                $descricao, $view_status,
                                $lancamento, $preco,
                                $categoria, $marca,
                                $imagens)
    {
        $this->id_produto = $id_produto;
        $this->nome = $nome;
        $this->data = $data;
        $this->descricao = $descricao;
        $this->view_status = $view_status;
        $this->lancamento = $lancamento;
        $this->preco = $preco;
        $this->categoria = $categoria;
        $this->marca = $marca;
        $this->imagens = $imagens;

    }

    public function setID($id)
    {
        $this->id_produto = $id;
    }

    public function getID()
    {
        return $this->id_produto;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setData($data)
    {
        return $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setViewStatus($view_status)
    {
        $this->view_status = $view_status;
    }

    public function getViewStatus()
    {
        return $this->view_status;
    }

    public function setLancamento($lancamento)
    {
        $this->lancamento = $lancamento;
    }

    public function getLancamento()
    {
        return $this->lancamento;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setCategoria($categoria_object)
    {
        $this->categoria = $categoria_object;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setMarca($marca_object)
    {
        $this->marca = $marca_object;
    }

    public function getMarca(){
        return $this->marca;
    }

    public function setImagens($imagens){
        $this->imagens = $imagens;
    }

    public function getImagens(){
        return $this->imagens;
    }




}