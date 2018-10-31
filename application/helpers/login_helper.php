<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// checar el estado de la session
if ( ! function_exists('check_state'))
{
  function check_state($level=1, $uid=0, $strict=false)
  {
    // $CI =& get_instance();
    // $username = $_SESSION['username'];
    // if (!empty($username)) { $level = check_level($level); } else { redirect('login'); }
    // if(!$level) exit_by_forbiden();
    // if(!$level) destroy_session();

    $time = check_time();
    $level = check_level($level, $strict);
    $_uid = ($uid > 0);
    $_level = ($_SESSION['nivel'] != 1);
    $user = ($_uid && $_level) ? check_userid($uid) : True;
    if($time && (!$level || !$user)) exit_by_forbiden();
    if(!$time || !$level || !$user) destroy_session();
  }
}

  // optenre cadena md5
if ( ! function_exists('get_pwd'))
{
  function get_pwd($p='')
  {
      $p = "";
      if(isset($_POST['pwd'])) {
        $p = md5(htmlentities(strip_tags($_POST['pwd'])));
      }
      return $p;
    }
  }

  function check_level($level, $strict)
  {
    if(!isset($_SESSION['nivel'])) destroy_session();

    $actual = $_SESSION['nivel'];
    $level_required = ($strict) ? ($actual == $level) : ($actual <= $level);
    $admin = ($actual == 1) ? True : False;
    return ($admin or $level_required) ? True : False;
  }

  function destroy_session()
  {
    reset_session_vars();
    $ci =& get_instance();
    $ci->session->sess_destroy();
    redirect('login');
  }

  function reset_session_vars() {
    $CI =& get_instance();
    $data = array('nombre' => null, 'username'=> null, 'nivel'=> null);
    $CI->session->unset_userdata($data);
  }
  function check_userid($userid) {
      if(empty($_SESSION['id'])) destroy_session();
      return ($_SESSION['id'] == $userid) ? True : False;
  }

  function check_time()
  {
    if(!isset($_SESSION['__ci_last_regenerate'])) destroy_session();
    // if(!isset($_SESSION['login_date'])) $this->destroy_session();
    // $ultimo_acceso = $_SESSION['login_date'];
    // $limite_ultimo_acceso = $ultimo_acceso + SESSION_LIFE_TIME;
    // if($limite_ultimo_acceso > time()) {
    //     $_SESSION['login_date'] = time();
    //     return True;
    // }
    return True;
  }

  function exit_by_forbiden() {
    header("HTTP/1.1 403 Permisos insuficientes");
    // print file_get_contents("../../../Template/errors/html/page_403.html");
    exit();
  }


?>
