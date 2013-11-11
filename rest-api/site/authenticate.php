<?php
/**
 * Copyright 2011 - Inform8
 * http://www.inform8.com
 *
 * Licensed under the Apache License, Version 2.0 (the "License")
 * http://www.apache.org/licenses/LICENSE-2.0
 */
  // don't auto perform auth...
  $noAuth = 1;
  require_once 'config/settings.php';
  $user = null;
  $result = false;
  $message = '';

  if (!Session::getInstance()->getAuthenticationManager()->isAuthenticated()) {
      include 'config/auth.php';
  }