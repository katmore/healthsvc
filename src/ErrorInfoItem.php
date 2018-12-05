<?php
namespace Healthsvc;

class ErrorInfoItem extends InfoItem {
   protected $message;
   public function getMessage(): string {
      return $this->message;
   }
   
   public function __construct(string $message) {
      $this->message = $message;
   }
   
}