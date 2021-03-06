<?php

/*
 * This file is part of the Healthsvc package.
 *
 * (c) D. Bird <dougbird@katmore.com>, All Rights Reserved.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Healthsvc;

/**
 * Request class
 *
 * @author D. Bird <dougbird@katmore.com>
 */
abstract class Request {

   use RequestBodyParserTrait;

   private $requestMethod = 'GET';
   private $requestQuery = [];

   abstract public function isRequestMethodAllowed() : bool;

   public function getRequestQuery() : array {
      return $this->requestQuery;
   }

   public function getRequestMethod() : string {
      return $this->requestMethod;
   }


   /**
    *
    * @throws \Healthsvc\RequestMethodNotAllowedException
    */
   public function __construct(string $request_method=null, array $request_query=null, string $request_body=null, string $content_type=null) {

      $request_method===null && isset($_SERVER['REQUEST_METHOD']) && $request_method = $_SERVER['REQUEST_METHOD'];

      $request_method!==null && $this->requestMethod = $request_method;

      if (!$this->isRequestMethodAllowed()) {
         throw new RequestMethodNotAllowedException($this->requestMethod);
      }

      $request_query===null && $request_query = $_GET;

      $this->requestQuery = $request_query;

      $request_body===null && false===($request_body = file_get_contents('php://input')) && $request_body = null;

      $content_type===null && isset($_SERVER['CONTENT_TYPE']) && $content_type = $_SERVER['CONTENT_TYPE'];

      $this->setRequestBody($request_body, $content_type);

   }









}
