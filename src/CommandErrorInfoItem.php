<?php
namespace Healthsvc;

class CommandErrorInfoItem extends CommandInfoItem {
   protected $stderr;
   public function __construct(string $stdout,string $stderr) {
      parent::__construct($stdout);
      $this->stderr = explode("\n",trim($stderr));
   }
   

}