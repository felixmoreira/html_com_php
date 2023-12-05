<?php
class html{
    public $raiz;
    public $pasta_css;
    public $pasta_img;
    public $pasta_js;
    
    public function __construct(){
      if(substr_count($_SERVER['PHP_SELF'], '/')>=2){
          $this->raiz = '../';
      }else{
          $this->raiz = '';
      }
    }


    public function get_img($texto){
        if (strpos($texto, 'http') !== false) {
            return $texto;
        }else{
            if(file_exists($this->pasta_img.$texto.".jpeg")){
                return $this->pasta_img.$texto.".jpeg";
            }else{
                if(file_exists($this->pasta_img.$texto.".gif")){
                    return $this->pasta_img.$texto.".gif";
                }else{
                    if(file_exists($this->pasta_img.$texto.".png")){
                        return $this->pasta_img.$texto.".png";
                    }else{
                        if(file_exists($this->pasta_img.$texto.".jpg")){
                            return $this->pasta_img.$texto.".jpg";
                        }else{
                          if(file_exists($this->pasta_img."icon/".$texto.".jpeg")){
                            return $this->pasta_img."icon/".$texto.".jpeg";
                        }else{
                            if(file_exists($this->pasta_img."icon/".$texto.".gif")){
                                return $this->pasta_img."icon/".$texto.".gif";
                            }else{
                                if(file_exists($this->pasta_img."icon/".$texto.".png")){
                                    return $this->pasta_img."icon/".$texto.".png";
                                }else{
                                    if(file_exists($this->pasta_img."icon/".$texto.".jpg")){
                                        return $this->pasta_img."icon/".$texto.".jpg";
                                    }else{
                                      if(file_exists($this->pasta_img."icon/".$texto.".svg")){
                                        return $this->pasta_img."icon/".$texto.".svg";
                                    }else{
                                        return false;
                                    }
                                    }
                                }
                            }
                        }
                        }
                    }
                }
            }
        }
      }

    public function pasta_css($pasta){
        $this->pasta_css = $this->raiz.$pasta;
      }
      public function pasta_js($pasta){
        $this->pasta_js = $this->raiz.$pasta;
      }
      public function pasta_img($texto){
        $this->pasta_img = $this->raiz.$texto;
      }

    public function _css($nome){
        if(file_exists($this->pasta_css.$nome.".css")){
          return "<style>".file_get_contents($this->pasta_css.$nome.".css")."</style>";
        }else{
          return "";
        }
      }
  
      public function _js($nome){
        if(file_exists($this->pasta_js.$nome.".js")){
          return "<script>".file_get_contents($this->pasta_js.$nome.".js")."</script>";
        }else{
          return "";
        }
      }
    public function tag($array){
        $lista = "";
        if(array($array)){
          foreach ($array as $key => $value) {
            $lista .= $key."='{$value}' ";
          }
          return $lista;
        }
      }

    function nav($class, $dados, $tag = NULL){
        $_class = explode(" ", $class);
        if($_class[0]==""){
            $id = "";
            $class = "";
        }else{
            $id = "id='{$_class[0]}'";
            $class = "class='{$class}'";
        }
        if(isset($tag)){
          $tag = $this->tag($tag);
        }else{
          $tag = "";
        }
        return "<nav {$id} {$class} {$tag}>{$this->_css($_class[0])}{$dados}{$this->_js($_class[0])}</nav>";
      }
      function div($class, $dados, $tag = NULL){
        $_class = explode(" ", $class);
        if($_class[0]==""){
            $id = "";
            $class = "";
        }else{
            $id = "id='{$_class[0]}'";
            $class = "class='{$class}'";
        }
        if(isset($tag)){
          $tag = $this->tag($tag);
        }else{
          $tag = "";
        }
        return "<div {$id} {$class} {$tag}>{$this->_css($_class[0])}{$dados}{$this->_js($_class[0])}</div>";
      }
      function form($class, $dados, $tag = NULL){
        $_class = explode(" ", $class);
        if($_class[0]==""){
            $id = "";
            $class = "";
        }else{
            $id = "id='{$_class[0]}'";
            $class = "class='{$class}'";
        }
        if(isset($tag)){
          $tag = $this->tag($tag);
        }else{
          $tag = "";
        }
        return "<form {$id} {$class} {$tag}>{$this->_css($_class[0])}{$dados}{$this->_js($_class[0])}</form>";
      }
      function input($class, $tag = NULL){
        $_class = explode(" ", $class);
        if($_class[0]==""){
            $id = "";
            $class = "";
        }else{
            $id = "id='{$_class[0]}'";
            $class = "class='{$class}'";
        }
        if(isset($tag)){
          $tag = $this->tag($tag);
        }else{
          $tag = "";
        }
        return "{$this->_css($_class[0])}<input {$id} {$class} {$tag}>{$this->_js($_class[0])}";
      }
      function img($class, $url, $tag = NULL){
        $_class = explode(" ", $class);
        if($_class[0]==""){
            $id = "";
            $class = "";
        }else{
            $id = "id='{$_class[0]}'";
            $class = "class='{$class}'";
        }
        if(isset($tag)){
          $tag = $this->tag($tag);
        }else{
          $tag = "";
        }
        return "{$this->_css($_class[0])}<img {$id} {$class} src='{$this->get_img($url)}' alt='{$_class[0]}' {$tag}>{$this->_js($_class[0])}";
      }
      function button($class, $dados, $tag = NULL){
        $_class = explode(" ", $class);
        if($_class[0]==""){
            $id = "";
            $class = "";
        }else{
            $id = "id='{$_class[0]}'";
            $class = "class='{$class}'";
        }
        if(isset($tag)){
          $tag = $this->tag($tag);
        }else{
          $tag = "";
        }
        return "{$this->_css($_class[0])}<button {$id} {$class} {$tag}>{$dados}</button>{$this->_js($_class[0])}";
      }
      function strong($class, $dados, $tag = NULL){
        $_class = explode(" ", $class);
        if($_class[0]==""){
            $id = "";
            $class = "";
        }else{
            $id = "id='{$_class[0]}'";
            $class = "class='{$class}'";
        }
        if(isset($tag)){
          $tag = $this->tag($tag);
        }else{
          $tag = "";
        }
        return "{$this->_css($_class[0])}<strong {$id} {$class} {$tag}>{$dados}</strong>{$this->_js($_class[0])}";
      }
      function span($class, $dados, $tag = NULL){
        $_class = explode(" ", $class);
        if($_class[0]==""){
            $id = "";
            $class = "";
        }else{
            $id = "id='{$_class[0]}'";
            $class = "class='{$class}'";
        }
        if(isset($tag)){
          $tag = $this->tag($tag);
        }else{
          $tag = "";
        }
        return "{$this->_css($_class[0])}<span {$id} {$class} {$tag}>{$dados}</span>{$this->_js($_class[0])}";
      }
      function h1($class, $dados, $tag = NULL){
        $_class = explode(" ", $class);
        if($_class[0]==""){
            $id = "";
            $class = "";
        }else{
            $id = "id='{$_class[0]}'";
            $class = "class='{$class}'";
        }
        if(isset($tag)){
          $tag = $this->tag($tag);
        }else{
          $tag = "";
        }
        return "{$this->_css($_class[0])}<h1 {$id} {$class} {$tag}>{$dados}</h1>{$this->_js($_class[0])}";
      }
      function h2($class, $dados, $tag = NULL){
        $_class = explode(" ", $class);
        if($_class[0]==""){
            $id = "";
            $class = "";
        }else{
            $id = "id='{$_class[0]}'";
            $class = "class='{$class}'";
        }
        if(isset($tag)){
          $tag = $this->tag($tag);
        }else{
          $tag = "";
        }
        return "{$this->_css($_class[0])}<h2 {$id} {$class} {$tag}>{$dados}</h2>{$this->_js($_class[0])}";
      }
      function h3($class, $dados, $tag = NULL){
        $_class = explode(" ", $class);
        if($_class[0]==""){
            $id = "";
            $class = "";
        }else{
            $id = "id='{$_class[0]}'";
            $class = "class='{$class}'";
        }
        if(isset($tag)){
          $tag = $this->tag($tag);
        }else{
          $tag = "";
        }
        return "{$this->_css($_class[0])}<h3 {$id} {$class} {$tag}>{$dados}</h3>{$this->_js($_class[0])}";
      }
      function p($class, $dados, $tag = NULL){
        $_class = explode(" ", $class);
        if($_class[0]==""){
            $id = "";
            $class = "";
        }else{
            $id = "id='{$_class[0]}'";
            $class = "class='{$class}'";
        }
        if(isset($tag)){
          $tag = $this->tag($tag);
        }else{
          $tag = "";
        }
        return "{$this->_css($_class[0])}<p {$id} {$class} {$tag}>{$dados}</p>{$this->_js($_class[0])}";
      }
      function a($class, $dados, $tag = NULL){
        $_class = explode(" ", $class);
        if($_class[0]==""){
            $id = "";
            $class = "";
        }else{
            $id = "id='{$_class[0]}'";
            $class = "class='{$class}'";
        }
        if(isset($tag)){
          $tag = $this->tag($tag);
        }else{
          $tag = "";
        }
        return "{$this->_css($_class[0])}<a {$id} {$class} {$tag}>{$dados}</a>{$this->_js($_class[0])}";
      }
      function iframe($class, $dados, $tag = NULL){
        $_class = explode(" ", $class);
        if($_class[0]==""){
            $id = "";
            $class = "";
        }else{
            $id = "id='{$_class[0]}'";
            $class = "class='{$class}'";
        }
        if(isset($tag)){
          $tag = $this->tag($tag);
        }else{
          $tag = "";
        }
        return "{$this->_css($_class[0])}<iframe {$id} {$class} src='{$dados}'{$tag}></iframe>{$this->_js($_class[0])}";
      }
}
?>
