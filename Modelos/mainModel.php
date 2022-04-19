<?php
  // validate ajax
  if ($peticionAjax){
    require_once "../Config/Conexion.php";
  }else{
    require_once "./Config/Conexion.php";
  }

  class mainModel{
    // Conectar a la BDD PDO
    protected static function conectar() {
      $conexion = new PDO(SGBD,USER_NAME,USER_PASS);
      $conexion->exec("SET CHARACTER SET utf8");
      return $conexion;
    }

    // consultas simples BDD
    protected static function ejecutar_consulta_simples($consulta) {
      $sql = self::conectar()->prepare($consulta);
      // execute query
      $sql->execute();
      return $sql;
    }
    // Security user url
    public  function encryption($string){
			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
			$output=base64_encode($output);
			return $output;
		}

		protected static function decryption($string){
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
			return $output;
		}

    // generate code random
    protected static function generar_codigo_aleatorio($letra,$longitud,$numero){
      for ($i=1; $i<=$longitud; $i++){
        $aleatorio=rand(0,9);
        $letra.=$aleatorio;

      }
      return $letra."-".$numero;
    }

    // clear String -\
    protected static function limpiar_cadena($cadena){
      $cadena =trim($cadena);
      $cadena = stripslashes($cadena);
      $cadena = str_ireplace("<script>","",$cadena);
      $cadena = str_ireplace("</script>","",$cadena);
      $cadena = str_ireplace("<script src","",$cadena);
      $cadena = str_ireplace("<script type=","",$cadena);
      $cadena = str_ireplace("SELECT * FROM","",$cadena);
      $cadena = str_ireplace("DELETE FROM","",$cadena);
      $cadena = str_ireplace("INSERT INTO","",$cadena);
      $cadena = str_ireplace("DROP TABLE","",$cadena);
      $cadena = str_ireplace("DROP DATABASE","",$cadena);
      $cadena = str_ireplace("TRUNCATE TABLE","",$cadena);
      $cadena = str_ireplace("SHOW TABLE","",$cadena);
      $cadena = str_ireplace("SHOW DATABASE","",$cadena);
      $cadena = str_ireplace("<?php","",$cadena);
      $cadena = str_ireplace("?>","",$cadena);
      $cadena = str_ireplace("--","",$cadena);
      $cadena = str_ireplace(">","",$cadena);
      $cadena = str_ireplace("<","",$cadena);
      $cadena = str_ireplace("[","",$cadena);
      $cadena = str_ireplace("]","",$cadena);
      $cadena = str_ireplace("^","",$cadena);
      $cadena = str_ireplace("==","",$cadena);
      $cadena = str_ireplace(";","",$cadena);
      $cadena = str_ireplace("::","",$cadena);
      $cadena = str_ireplace(",","",$cadena);
      $cadena = stripslashes($cadena);
      $cadena =trim($cadena);

      return $cadena;
    }

    // validate input
    protected static function verificar_datos($filtro,$cadena){
      if(preg_match("/^".$filtro."$/",$cadena)){
        return false;
      }else{
        return true;
      }
    }
    // validate date format
    protected static function verificar_fecha($fecha){
      $datos=explode("/",$fecha);
      if(count($datos)==3 && checkdate($datos[1],$datos[2],$datos[0])){
        return false;
      }else{
        return true;
      }
    }
    // pagine table
    protected static function paginacion_tablas($pagina,$npaginas,$url,$botones){
      $tabla='	<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-center">';
      if ($pagina==1) {
        $tabla.='<li class="page-item disabled">
          <a class="page-link"><i class="fa-thin fa-angles-left"></i></a></li>';
      }else{
        $tabla.='
        <li class="page-item">
          <a class="page-link" href="'.$url.'1/">Anterior</i></a>
          </li>
        <li class="page-item">
          <a class="page-link" href="'.$url.($pagina-1).'1/">Anterior</i></a>
          </li>';
      }

      // count pages
      $contador=0;
      for ($i=$pagina; $i<=$npaginas; $i++){
        if ($contador >=$botones){
          break;
        }
        if ($pagina == $i) {
          $tabla='<li class="page-item ">
            <a class="page-link active" href="'.$url.$i.'/">'.$i.'</a></li>';
        }else{
          $tabla='<li class="page-item ">
            <a class="page-link" href="'.$url.$i.'/">'.$i.'</a></li>';
        }
        $contador++;
      }

      // #paginas
      if ($pagina==$npaginas) {
        $tabla.='li class="page-item disabled">
          <a class="page-link"><i class="fa-thin fa-angles-right"></i></a></li>';
      }else{
        $tabla.='
        <li class="page-item">
        <a class="page-link" href="'.$url.($pagina+1).'1/"><i class="fa-thin fa-angles-right"></i>Siguiente</i></a>
        </li>
        <li class="page-item">
          <a class="page-link" href="'.$url.$npaginas.'/"></i></a>
          </li>';
      }

      $tabla='</ul></nav>';
      return $tabla;
    }
  }
 ?>
