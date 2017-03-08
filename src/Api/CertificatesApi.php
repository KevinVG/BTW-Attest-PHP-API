<?PHP
namespace VatCertificates;

class CertificatesApi {
    
    function __construct(&$api) {
        $this->api = $api;
    }
    
    public function index() {
        $response = $this->api->get('certificates.json');    
        
        if($response['http_code'] == 403) { 
            if($response['data']['name'] == 'MissingXUserKeyException') {
                throw new MissingXUserKeyException();
            } 
        }  
         
        if($response['http_code'] >= 200 && $response['http_code'] < 300) { 
            $certificates = [];
            foreach($response['data']['certificates'] as $apiData) {
                $certificates[] = new Certificate($apiData);
            }
            
            return $certificates;
        } elseif($response['http_code'] == '500') { 
            throw new InternalException(); 
        } else {
            throw new UnknownErrorException($response['data']['name']);
        }
    }
    
    public function add($certificate) { 
        $response = $this->api->post('certificates.json', $certificate->asArray());   
        
        if($response['http_code'] == 403) { 
            if($response['data']['name'] == 'MissingXUserKeyException') {
                throw new MissingXUserKeyException();
            } 
        } 
        
        if($response['http_code'] == 400) {
            if($response['data']['name'] == 'InvalidDataException') {
                throw new InvalidDataException();
            }  
            if($response['data']['name'] == 'AccountLimitReachedException') {
                throw new InvalidDataException();
            }  
            if($response['data']['name'] == 'AccountExpiredException') {
                throw new InvalidDataException();
            }  
        } 
        
        if($response['http_code'] >= 200 && $response['http_code'] < 300) { 
            return $response['data']['uuid'];
        } elseif($response['http_code'] == '500') { 
            throw new InternalException(); 
        } else {
            throw new UnknownErrorException($response['data']['name']);
        }
    }
    
    public function view($uuid) {
        $response = $this->api->get('certificates/' . $uuid .'.json');   
        
        if($response['http_code'] == 404) { 
            if($response['data']['name'] == 'NotFoundException') {
                throw new NotFoundException();
            } 
        }  
        
        if($response['http_code'] == 400) { 
            if($response['data']['name'] == 'AccountExpiredException') {
                throw new InvalidDataException();
            }  
        }  
         
        if($response['http_code'] >= 200 && $response['http_code'] < 300) { 
            return new Certificate($response['data']['certificate']);
        } elseif($response['http_code'] == '500') { 
            throw new InternalException(); 
        } else {
            throw new UnknownErrorException($response['data']['name']);
        }
    }
    
    public function edit($certificate) { 
        if(empty($certificate->getUuid())) {
            throw new Exception('No UUID set for certificate to update');
        }
        $response = $this->api->put('certificates/' . $certificate->getUuid() . '.json', $certificate->asArray());   
        
        if($response['http_code'] == 403) { 
            if($response['data']['name'] == 'MissingXUserKeyException') {
                throw new MissingXUserKeyException();
            } 
        } 
        
        if($response['http_code'] == 400) {
            if($response['data']['name'] == 'InvalidDataException') {
                throw new InvalidDataException();
            }   
            if($response['data']['name'] == 'AccountExpiredException') {
                throw new InvalidDataException();
            }   
        } 
        
        if($response['http_code'] >= 200 && $response['http_code'] < 300) { 
            return true;
        } elseif($response['http_code'] == '500') { 
            throw new InternalException(); 
        } else {
            throw new UnknownErrorException($response['data']['name']);
        }
    }
    
    public function delete($uuid) { 
        $response = $this->api->delete('certificates/'.$uuid.'.json');   
        
        
        if($response['http_code'] == 400) { 
            if($response['data']['name'] == 'AccountExpiredException') {
                throw new InvalidDataException();
            }  
        } 
        
        if($response['http_code'] == 403) { 
            if($response['data']['name'] == 'MissingXUserKeyException') {
                throw new MissingXUserKeyException();
            } 
        } 
        
        if($response['http_code'] == 404) {
            if($response['data']['name'] == 'NotFoundException') {
                throw new NotFoundException();
            }  
        } 
        
        if($response['http_code'] >= 200 && $response['http_code'] < 300) { 
            return true;
        } elseif($response['http_code'] == '500') { 
            throw new InternalException(); 
        } else { 
            throw new UnknownErrorException($response['data']['name']);
        }
    }
    
}