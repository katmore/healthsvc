<?php
namespace Healthsvc;

interface StatusDataProviderInterface {
   public function getStatusData() : StatusData;
}