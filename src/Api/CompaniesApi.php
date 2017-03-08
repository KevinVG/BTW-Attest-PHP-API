<?PHP
namespace VatCertificates;

class CompaniesApi {
    
    function __construct(&$api) {
        $this->api = $api;
    } 
    
    public function view() {
        $response = $this->api->get('companies/0.json');    
        
        if($response['http_code'] == 400) { 
            if($response['data']['name'] == 'AccountExpiredException') {
                throw new InvalidDataException();
            }  
        }  
        
        if($response['http_code'] == 403) { 
            if($response['data']['name'] == 'MissingXUserKeyException') {
                throw new MissingXUserKeyException();
            } 
            if($response['data']['name'] == 'InvalidXUserKeyException') {
                throw new InvalidXUserKeyException();
            } 
        }   
         
        if($response['http_code'] >= 200 && $response['http_code'] < 300) { 
            return new Company($response['data']['company']);
        } elseif($response['http_code'] == '500') { 
            throw new InternalException(); 
        } else {
            throw new UnknownErrorException($response['data']['name']);
        }
    }
    
    
}