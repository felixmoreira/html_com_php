<?php

class html{
  public $raiz;
  public $pasta_css;
  public $pasta_img;
  public $pasta_js;
  public $head_site;
  public $head_url;
  public $head_marca;
  public $head_icone;
  public $head_titulo;
  public $head_descricao;
  public $head_tag;
  
  
  public function __construct(){
    if(substr_count($_SERVER['PHP_SELF'], '/')>=2){
        $this->raiz = '../';
    }else{
        $this->raiz = '';
    }
    $this->pasta_css = $this->raiz.'';
    $this->pasta_js = $this->raiz.'';
    $this->pasta_img = $this->raiz.'';
  }

  public function head($marca, $urlicone, $urlfundo, $titulo, $descricao, $tags, $extra = NULL){
    $this->site_marca = 'https://'.$_SERVER["SERVER_NAME"];
    $this->url_marca = 'https://'.$_SERVER["SERVER_NAME"].$_SERVER["PHP_SELF"];
    $this->head_marca = $marca;
    if (strpos($head_icone, 'http') !== false) {
        $this->head_icone = $urlfundo;
    }else{
        $this->head_icone = 'https://'.$_SERVER["SERVER_NAME"].$this->pasta_img.$urlicone;
    }
    if (strpos($urlfundo, 'https') !== false) {
        $this->head_fundo = $urlfundo;
    }else{
        $this->head_fundo = 'https://'.$_SERVER["SERVER_NAME"].$this->pasta_img.$urlfundo;
    }
    $this->head_titulo = $titulo;
    $this->head_descricao = $descricao;
    $this->head_tag = $tags;
    if(isset($extra)){
      $this->head_extra = $extra;
    }else{
      $this->head_extra = "";
    }

        return "<head><title>{$this->head_titulo} - {$this->head_marca}</title>
            <meta charset='utf-8' />
            <!--[if IE]><meta http-equiv='ImageToolbar' content='False' /><![endif]-->
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <meta name='author' content='{$this->head_marca}' />
            <meta name='generator' content='{$this->head_marca}' />
            <meta name='description' content='{$this->head_descricao}' />
            <meta name='keywords' content='{$this->head_tag}' />
            <meta property='og:locale' content='pt-BR' />
            <meta property='og:type' content='website' />
            <meta property='og:url' content='{$this->head_url}' />
            <meta property='og:title' content='{$this->head_titulo}' />
            <meta property='og:site_name' content='{$this->head_marca}' />
            <meta property='og:description' content='{$this->head_descricao}' />
            <meta property='og:image' content='{$this->head_fundo}' />
            <meta property='og:image:type' content='image/png'>
            <meta property='og:image:width' content='1000'>
            <meta property='og:image:height' content='600'>
            <link rel='icon' type='imagem/png' href='{$this->head_icone}'>
            {$this->head_extra}
    </head>";
  }
}
?>
