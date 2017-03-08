<?PHP
namespace VatCertificates;
 
// Api
require_once('CertificatesApi.php'); 
require_once('CompaniesApi.php'); 
require_once('Exceptions.php'); 

// Models
require_once(__DIR__ . '/../Model/ApiObject.php');
require_once(__DIR__ . '/../Model/Certificate.php');
require_once(__DIR__ . '/../Model/Company.php');

class Api {
    
    private $apiRoot = "https://api.btw-attest.be/"; 
    
    function __construct($xUserKey) { 
        // Configuration  
        $this->xUserKey = $xUserKey;
        
        // Initialization
        $this->Certificates = new CertificatesApi($this);
        $this->Companies = new CompaniesApi($this);
        
    }
    
    function get($endpoint, $decode = 'json') { 
        $ch = curl_init($this->apiRoot . str_replace('.json','',$endpoint) . '.json');        
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     
        curl_setopt($ch, CURLOPT_HTTPHEADER, array( 
            'X-User-Key: ' . $this->xUserKey,
        ));                                                    
        try {
            $result = curl_exec($ch);
            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
            
            switch($decode) {
                case "json":
                    $result = json_decode($result, true);
                    break;
            }

            return array(
                'http_code' => $httpcode,
                'data' => $result
            );
        } catch(Exception $e) {
            throw new FailedConnectionException();
        } 
    }
    
    function post($endpoint, $data) {  
        $json = json_encode($data); 
        
        $ch = curl_init($this->apiRoot . str_replace('.json','',$endpoint) . '.json');                       
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);  
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                       
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($json),    
            'X-User-Key: ' . $this->xUserKey,
        ));                                  
        try {
            $result = curl_exec($ch);
            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            return array(
                'http_code' => $httpcode,
                'data' => json_decode($result, true)
            );
        } catch(Exception $e) {
            throw new FailedConnectionException();
        } 
    }  
    
    function put($endpoint, $data) {     
        $json = json_encode($data); 
        $ch = curl_init($this->apiRoot . str_replace('.json','',$endpoint) . '.json');        
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");                                                                     
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);        
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                       
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($json),    
            'X-User-Key: ' . $this->xUserKey,
        ));                                     
        try {
            $result = curl_exec($ch);
            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            return array(
                'http_code' => $httpcode,
                'data' => json_decode($result, true)
            );
        } catch(Exception $e) {
            throw new FailedConnectionException();
        } 
    }
    
    function delete($endpoint) {    
        $ch = curl_init($this->apiRoot . str_replace('.json','',$endpoint) . '.json');        
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");                                                                     
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);           
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(       
            'X-User-Key: ' . $this->xUserKey,
        ));                                      
        try {
            $result = curl_exec($ch);
            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            return array(
                'http_code' => $httpcode,
                'data' => json_decode($result, true)
            );
        } catch(Exception $e) {
            throw new FailedConnectionException();
        } 
    }
    
    
}