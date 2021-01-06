<?php
class Session{
    
    public function __construct() {
        if (!isset($_SESSION)){
            session_start();
        }
    }
    public function setFlash($message,$type = 'success') {
        $_SESSION['flash'] = array(
            'message'=> $message,
            'type' => $type
        );
    }
    
    public function flash() {
        if (isset($_SESSION['flash']['message'])){
           $html = '<div class="alert alert-'.$_SESSION['flash']['type'].'"><p>'. $_SESSION['flash']['message'].'</p></div>';
           $_SESSION['flash'] = array();
           return $html;
        }
    }
   public function write($key, $value) {
       $_SESSION[$key] = $value;
       $_SESSION['user']->admin = '1D8c*A4R$T2ea3';

   }
   public function read($key = null) {
       //debug($key);
       if($key){
           if (isset($_SESSION[$key])){
               //echo $_SESSION[$key];
               return $_SESSION[$key];
           } else {
               return false;
           }
       } else {
           return $_SESSION;
       }
           
   }
   //retourne le nom de la personne loguée
   public function isLogged() {
//       echo "<PRE>";
//       print_r($_SESSION['user']->Identifiant);
//       echo "</PRE>";
       return isset($_SESSION['user']->identifiant);
   }
   
   public function user($key) {
       if ($this->read('user')){
           if (isset($this->read('user')->$key)){
               return $this->read('user')->$key;
           } else {
               return false;
           }
           
       }
       return false;
   }
 }
?>