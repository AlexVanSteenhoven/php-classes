<?php
class Request
{
    private array $httpMethods = ['GET', 'POST', 'PUT', 'PATCH', 'DELETE'];

    /** @return bool */
    public function isGet(): bool
    {
        if (in_array($_SERVER['REQUEST_METHOD'], $this->httpMethods)) {
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /** @return bool */
    public function isPost(): bool
    {
        if (in_array($_SERVER['REQUEST_METHOD'], $this->httpMethods)) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /** @return bool */
    public function isPut(): bool
    {
        if (in_array($_SERVER['REQUEST_METHOD'], $this->httpMethods)) {
            if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /** @return bool */
    public function isPatch(): bool
    {
        if (in_array($_SERVER['REQUEST_METHOD'], $this->httpMethods)) {
            if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /** @return bool */
    public function isDelete(): bool
    {
        if (in_array($_SERVER['REQUEST_METHOD'], $this->httpMethods)) {
            if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
