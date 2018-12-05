<?php
namespace Healthsvc;

class HostSanityRequest extends Request {
   const ALLOWED_METHODS = ['GET'];
   public function isRequestMethodAllowed() : bool {
      return in_array($this->getRequestMethod(),static::ALLOWED_METHODS);
   }
}