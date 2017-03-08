<?PHP
namespace VatCertificates;

class Company implements ApiObject {
    
    private $name;
    private $street;
    private $streetnumber;
    private $zipcode;
    private $city;
    private $vat;
    private $email;
    private $subscription_date;
     
    public function __construct($apiData = array()) { 
	    $this->name = isset($apiData['Company']['name']) ? $apiData['Company']['name'] : '';
	    $this->street = isset($apiData['Company']['street']) ? $apiData['Company']['street'] : '';
	    $this->streetnumber = isset($apiData['Company']['streetnumber']) ? $apiData['Company']['streetnumber'] : '';
	    $this->zipcode = isset($apiData['Company']['zipcode']) ? $apiData['Company']['zipcode'] : '';
	    $this->city = isset($apiData['Company']['city']) ? $apiData['Company']['city'] : '';
	    $this->vat = isset($apiData['Company']['vat']) ? $apiData['Company']['vat'] : '';
	    $this->email = isset($apiData['Company']['email']) ? $apiData['Company']['email'] : '';
	    $this->subscription_date = isset($apiData['Company']['subscription_date']) ? $apiData['Company']['subscription_date'] : ''; 
    }	
    
    /**
     * Formats to object as array for use in the API
     **/
    public function asArray() {
        return array(
            "Company" => array( 
                "name" => $this->name, 
            )    
        );
    } 
    
	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getStreet(){
		return $this->street;
	}

	public function setStreet($street){
		$this->street = $street;
	}

	public function getStreetnumber(){
		return $this->streetnumber;
	}

	public function setStreetnumber($streetnumber){
		$this->streetnumber = $streetnumber;
	}

	public function getZipcode(){
		return $this->zipcode;
	}

	public function setZipcode($zipcode){
		$this->zipcode = $zipcode;
	}

	public function getCity(){
		return $this->city;
	}

	public function setCity($city){
		$this->city = $city;
	}

	public function getVat(){
		return $this->vat;
	}

	public function setVat($vat){
		$this->vat = $vat;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getSubscriptionDate(){
		return $this->subscription_date;
	}
	
}