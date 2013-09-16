<?php

require_once APP_TESTE. "/Utils.php";

class CProduto
{

    protected $id_produto,
        $nome, $data, $descricao,
        $view_status, $lancamento,
        $preco,
        $parcelas,$prazo,
        $categoria_object = null,
        $marca_object = null,
        $imagens = null;


    public function __construct($id_produto, $nome, $data,
                                $descricao, $view_status,
                                $lancamento, $preco,
                                $parcelas, $prazo)
    {


        $this->id_produto = $id_produto;
        $this->nome = $nome;
        $this->data = $data;
        $this->descricao = $descricao;
        $this->view_status = Utils::postgresBooleanTranslater($view_status);
        $this->lancamento = Utils::postgresBooleanTranslater($lancamento);
        $this->preco = $preco;
        $this->parcelas = $parcelas;
        $this->prazo = $prazo;


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

    public function setPrazo($prazo)
    {
        $this->prazo = $prazo;
    }

    public function getPrazo()
    {
        return $this->prazo;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setParcelas($parcelas)
    {
        $this->parcelas = $parcelas;
    }

    public function getParcelas()
    {
        return $this->parcelas;
    }


    public function setCategoria($categoria_object)
    {
        $this->categoria_object = $categoria_object;
    }

    public function getCategoria()
    {
        return $this->categoria_object;
    }

    public function setMarca($marca_object)
    {
        $this->marca_object = $marca_object;
    }

    public function getMarca(){
        return $this->marca_object;
    }

    public function setImagens($imagens){
        $this->imagens = $imagens;
    }

    public function getImagens(){
        return $this->imagens;
    }




}