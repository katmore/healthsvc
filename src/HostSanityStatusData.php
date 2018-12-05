<?php
namespace Healthsvc;

class HostSanityStatusData extends StatusData {
   
   /**
    * @var string string reported hostname
    * @private
    */
   protected $hostname;
   
   /**
    * @return string string reported hostname
    */
   public function getHostname() : string {
      return $this->hostname;
   }
   
   public function __construct(int $healthStatusTtl=0, string $healthStatusTime=null, string $hostname="") {
      $this->hostname = $hostname;
      parent::__construct($healthStatusTtl,$healthStatusTime);
   }
}