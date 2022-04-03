<?php
    $saveLocation = "/i/"; // Folder where the differents files will be stored
    $extensionsAllowed = array("png", "jpg", "jpeg", "zip", "rar", "tar.gz", "mp4",
    "mp3", "wav", "flac", "ogg"); // Extensions allowed to be upload
    $secretHash = "a"; // Password
    $db = json_decode(file_get_contents('users.json', false));

    $login = $_POST['login'];
    $pass = $_POST['secret'];
    
    foreach ($db->users as $user) {
      if ($user->username === $login) {
        if (password_verify($pass, $user->password)) {
          echo "it works";
        } else {
          echo "Wrong password.";
        }
        exit();
      }
    }
    echo "Username not found.";
?>