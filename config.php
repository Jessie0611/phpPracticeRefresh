<?php
//Forces PHP to use only cookies for storing the session ID
ini_set('session.use_only_cookies', 1);
//Prevents session fixation attacks, where an attacker tricks a user into using a specific session ID via a URL.
//Avoids session leakage through browser history, logs, or referer headers.

//Ensures that PHP rejects any uninitialized or invalid session ID when starting a session with session_start()
ini_set('session.use_strict_mode', 1);
//Protects against session fixation by not allowing attackers to supply their own session IDs to hijack a session.
//Only session IDs that already exist on the server are accepted. If a client sends a bogus session ID, PHP will create a new one instead.
session_set_cookie_params([
    'lifetime' => 1800, //30 min in seconds
    'domain' => 'localhost', //or website.com
    'path' => '/',
    'secure' => 'true',
    'httponly' => 'true'

]);
session_start();
