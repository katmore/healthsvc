<?php
namespace Healthsvc;

use RuntimeException;

abstract class ResponseException extends RuntimeException implements ResponseInterface {
   final public function printResponseBody(bool $send_headers=true) : void {
      if ($send_headers) {
         header("Content-type: ".$this->getContentType());
         http_response_code($this->getResponseCode());
      }
      echo $this->getResponseBody();
   }
}