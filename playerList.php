<?php
  require_once 'vendor/autoload.php';
  use classes\Database;

  $query = new Database();
  $playerList = $query->fetchPlayerList();
  require 'templates/playerList.php';