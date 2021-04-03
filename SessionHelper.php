<?php
class SessionHelper
{
    public function checkSession()
    {
        if (session_status() === PHP_SESSION_DISABLED || session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /** @param string $sessionName */
    public function destroy(string $sessionName)
    {
        unset($_SESSION[$sessionName]);
    }
}
