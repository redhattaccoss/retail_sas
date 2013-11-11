<?php
class Inform8UserAuthenticate implements Inform8Authenticate {
  var $user;
  var $authenticated = false;
  var $authError;
  var $loginTasks;

  function performAuthentication() {

    $this->authError = NULL;

    StaticConfig::getLoginProcessor()->recordLoginAttempt(Request::getSafeGetOrPost('Username'), Request::getSafeGetOrPost('Password'));
	
    if (Request::getSafeGetOrPost('Username') == NULL) {
      $this->authError = AuthenticationError::invalidUserName();
      $this->authenticated = false;
      return false;
    }

    if (Request::getSafeGetOrPost('Password') == NULL) {
      $this->authError = AuthenticationError::invalidPassword();
      $this->authenticated = false;
      return false;
    }
     
    if(StaticConfig::isLoginEmailFormat()) {
      if (!filter_var( Request::getSafeGetOrPost("Username"), FILTER_VALIDATE_EMAIL)) {
        $this->authError = AuthenticationError::invalidUserName();
        $this->authenticated = false;
        return false;
      }
    }

    $user = WholesalerIQL::select()
    ->where(NULL, WholesalerIQL::$USERNAME, '=', Request::getSafeGetOrPost('Username'))
    ->getFirst();
    
    
     
    if(is_object($user)) {
      $this->user = $user;
    }

    if ($this->user == NULL) {
      $this->authError = AuthenticationError::invalidUserName();
      $this->authenticated = false;
      StaticConfig::getLoginProcessor()->processUnsuccessfulLogin(Request::getSafePost('Username'), Request::getSafePost('Password'), NULL);
      return $this->authenticated;
    }else if($this->user->getEnabled() != 1) {
      $this->authError = AuthenticationError::accountDisabled();
      $this->authenticated = false;
      StaticConfig::getLoginProcessor()->processUnsuccessfulLogin(Request::getSafePost('Username'), Request::getSafePost('Password'), $this->user);
      return $this->authenticated;
    }
    if (md5(Request::getSafeGetOrPost('Password')) == $this->user->getPassword()) {
      $this->authenticated = true;
      StaticConfig::getLoginProcessor()->processLogin($this->user);
      return $this->authenticated;
    } else {
      $this->authError = AuthenticationError::invalidPassword();
      $this->authenticated = false;
      StaticConfig::getLoginProcessor()->processUnsuccessfulLogin(Request::getSafePost('Username'), Request::getSafePost('Password'), $this->user);
      return $this->authenticated;
    }
    return false;
  }

  function reset() {
    $this->user = null;
    $this->authenticated = false;
    $this->authError = "";
  }

  function isAuthenticated() {
    return $this->authenticated;
  }

  function getAuthenticationError() {
    return $this->authError;
  }

  function getUser() {
    return $this->user;
  }

}
?>