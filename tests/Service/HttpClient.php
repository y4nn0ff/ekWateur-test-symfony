<?php declare(strict_types=1);

namespace App\Tests\Service;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HttpClient implements HttpClientInterface {
    
    private $data;
    public function __construct($data) {
        $this->data = $data;
    }
    public function request(string $method, string $url, array $options = []) : \Symfony\Contracts\HttpClient\ResponseInterface{
        list($method, $queryParam) = explode("?",$url);
        
        $itemsFound = array_values(array_filter($this->data[$method], function($item) use ($queryParam) {
            list($key,$value) = explode('=', $queryParam);
            if(is_array($item[$key])) {
                if(in_array($value, $item[$key])) {
                    return true;
                }
            } else {
                if($item[$key] == $value) {
                    return true;
                }
            }
            
        }));
        $response = new HttpResponse();
        $response->setContent($itemsFound);
        return $response;
        
    }
    
    public function stream($responses, ?float $timeout = NULL) : \Symfony\Contracts\HttpClient\ResponseStreamInterface {
        $response = new \Symfony\Component\HttpClient\Response\ResponseStream(new \Generator());
    
        return $response;
    }
    
    public function withOptions(array $options) {
        
    }
}