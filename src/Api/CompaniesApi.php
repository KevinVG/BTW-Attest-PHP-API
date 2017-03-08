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
        
        return new Company($response['data']['company']);
    }
    
    
}