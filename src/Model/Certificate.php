<?PHP
namespace VatCertificates;

class Certificate implements ApiObject {
    
    private $uuid;
    private $number_formatted;
    private $reference_document;
    private $reference;
    private $reference_date;
    private $reference_url;
    private $webhook_url;
    private $language_id = "nld";
    private $firstname;
    private $lastname;
    private $living_at;
    private $street;
    private $streetnumber;
    private $zipcode;
    private $city;
    private $use_type;
    private $private_usage;
    private $pdf;
    private $signed;
    private $sign_date;
    private $sign_location;
    private $sent_to;
    private $permalink; 
    private $deleted; 
    
    public function __construct($apiData = array()) {
        $this->uuid = isset($apiData['Certificate']['uuid']) ? $apiData['Certificate']['uuid'] : '';
        $this->number_formatted = isset($apiData['Certificate']['number_formatted']) ? $apiData['Certificate']['number_formatted'] : '';
        $this->reference_document = isset($apiData['Certificate']['reference_document']) ? $apiData['Certificate']['reference_document'] : '';
        $this->reference = isset($apiData['Certificate']['reference']) ? $apiData['Certificate']['reference'] : '';
        $this->reference_date = isset($apiData['Certificate']['reference_date']) ? $apiData['Certificate']['reference_date'] : '';
        $this->reference_url = isset($apiData['Certificate']['reference_url']) ? $apiData['Certificate']['reference_url'] : '';
        $this->webhook_url = isset($apiData['Certificate']['webhook_url']) ? $apiData['Certificate']['webhook_url'] : '';
        $this->language_id = isset($apiData['Certificate']['language_id']) ? $apiData['Certificate']['language_id'] : 'nld';
        $this->firstname = isset($apiData['Certificate']['firstname']) ? $apiData['Certificate']['firstname'] : '';
        $this->lastname = isset($apiData['Certificate']['lastname']) ? $apiData['Certificate']['lastname'] : '';
        $this->living_at = isset($apiData['Certificate']['living_at']) ? $apiData['Certificate']['living_at'] : '';
        $this->street = isset($apiData['Certificate']['street']) ? $apiData['Certificate']['street'] : '';
        $this->streetnumber = isset($apiData['Certificate']['streetnumber']) ? $apiData['Certificate']['streetnumber'] : '';
        $this->zipcode = isset($apiData['Certificate']['zipcode']) ? $apiData['Certificate']['zipcode'] : '';
        $this->city = isset($apiData['Certificate']['city']) ? $apiData['Certificate']['city'] : '';
        $this->use_type = isset($apiData['Certificate']['use_type']) ? $apiData['Certificate']['use_type'] : '';
        $this->private_usage = isset($apiData['Certificate']['private_usage']) ? $apiData['Certificate']['private_usage'] : '';
        $this->pdf = isset($apiData['Certificate']['pdf']) ? $apiData['Certificate']['pdf'] : '';
        $this->signed = isset($apiData['Certificate']['signed']) ? $apiData['Certificate']['signed'] : '';
        $this->sign_date = isset($apiData['Certificate']['sign_date']) ? $apiData['Certificate']['sign_date'] : '';
        $this->sign_location = isset($apiData['Certificate']['sign_location']) ? $apiData['Certificate']['sign_location'] : '';
        $this->sent_to = isset($apiData['Certificate']['sent_to']) ? $apiData['Certificate']['sent_to'] : '';
        $this->permalink = isset($apiData['Certificate']['permalink']) ? $apiData['Certificate']['permalink'] : '';
        $this->deleted = isset($apiData['Certificate']['deleted']) ? $apiData['Certificate']['deleted'] : '';
    }	
    
    /**
     * Formats to object as array for use in the API
     **/
    public function asArray() {
    	$array = ['Certificate' => []];
    	if($this->uuid) { $array["Certificate"]["uuid"] = $this->uuid; }
    	if($this->number_formatted) { $array["Certificate"]["number_formatted"] = $this->number_formatted; }
    	if($this->reference_document) { $array["Certificate"]["reference_document"] = $this->reference_document; }
    	if($this->reference) { $array["Certificate"]["reference"] = $this->reference; }
    	if($this->reference_date) { $array["Certificate"]["reference_date"] = $this->reference_date; }
    	if($this->reference_url) { $array["Certificate"]["reference_url"] = $this->reference_url; }
    	if($this->webhook_url) { $array["Certificate"]["webhook_url"] = $this->webhook_url; }
    	if($this->language_id) { $array["Certificate"]["language_id"] = $this->language_id; }
    	if($this->firstname) { $array["Certificate"]["firstname"] = $this->firstname; }
    	if($this->lastname) { $array["Certificate"]["lastname"] = $this->lastname; }
    	if($this->living_at) { $array["Certificate"]["living_at"] = $this->living_at; }
    	if($this->street) { $array["Certificate"]["street"] = $this->street; }
    	if($this->streetnumber) { $array["Certificate"]["streetnumber"] = $this->streetnumber; }
    	if($this->zipcode) { $array["Certificate"]["zipcode"] = $this->zipcode; }
    	if($this->city) { $array["Certificate"]["city"] = $this->city; }
    	if($this->use_type) { $array["Certificate"]["use_type"] = $this->use_type; }
    	if($this->private_usage) { $array["Certificate"]["private_usage"] = $this->private_usage; }
    	if($this->sent_to) { $array["Certificate"]["sent_to"] = $this->sent_to; }
    	if($this->pdf) { $array["Certificate"]["pdf"] = $this->pdf; }
    	if($this->permalink) { $array["Certificate"]["permalink"] = $this->permalink; }
    	if($this->signed) { $array["Certificate"]["signed"] = $this->signed; }
        return $array;
    } 
    
    public function getUuid(){
		return $this->uuid;
	}
    
    public function setUuid($uuid){
		$this->uuid = $uuid;
		return $this;
	}
    
    public function getNumberFormatted(){
		return $this->number_formatted;
	}
    
    public function getReferenceDocument(){
		return $this->reference_document;
	}

	public function setReferenceDocument($reference_document){
		$this->reference_document = $reference_document;
		return $this;
	}

	public function getReference(){
		return $this->reference;
	}

	public function setReference($reference){
		$this->reference = $reference;
		return $this;
	}

	public function getReferenceDate(){
		return $this->reference_date;
	}

	public function setReferenceDate($reference_date){
		$this->reference_date = $reference_date;
		return $this;
	}

	public function getReferenceUrl(){
		return $this->reference_url;
	}

	public function setReferenceUrl($reference_url){
		$this->reference_url = $reference_url;
		return $this;
	}

	public function getWebhookUrl(){
		return $this->webhook_url;
	}

	public function setWebhookUrl($webhook_url){
		$this->webhook_url = $webhook_url;
		return $this;
	}

	public function getLanguageId(){
		return $this->webhook_url;
	}

	public function setLanguageId($language_id){
		$this->language_id = $language_id;
		return $this;
	}

	public function getFirstname(){
		return $this->firstname;
	}

	public function setFirstname($firstname){
		$this->firstname = $firstname;
		return $this;
	}

	public function getLastname(){
		return $this->lastname;
	}

	public function setLastname($lastname){
		$this->lastname = $lastname;
		return $this;
	}

	public function getLivingAt(){
		return $this->living_at;
	}

	public function setLivingAt($living_at){
		$this->living_at = $living_at;
		return $this;
	}

	public function getStreet(){
		return $this->street;
	}

	public function setStreet($street){
		$this->street = $street;
		return $this;
	}

	public function getStreetnumber(){
		return $this->streetnumber;
	}

	public function setStreetnumber($streetnumber){
		$this->streetnumber = $streetnumber;
		return $this;
	}

	public function getZipcode(){
		return $this->zipcode;
	}

	public function setZipcode($zipcode){
		$this->zipcode = $zipcode;
		return $this;
	}

	public function getCity(){
		return $this->city;
	}

	public function setCity($city){
		$this->city = $city;
		return $this;
	}

	public function getUseType(){
		return $this->use_type;
	}

	public function setUseType($use_type){
		$this->use_type = $use_type;
		return $this;
	}

	public function getPrivateUsage(){
		return $this->private_usage;
	}

	public function setPrivateUsage($private_usage){
		$this->private_usage = $private_usage;
		return $this;
	}

	public function getPdfUrl(){
		return $this->pdf;
	}  

	public function isSigned(){
		return true && $this->signed;
	} 

	public function getSignDate(){
		return $this->sign_date;
	} 

	public function getSignLocation(){
		return $this->sign_location;
	} 

	public function getSentTo(){
		return $this->sent_to;
	}

	public function setSentTo($sent_to){
		$this->sent_to = $sent_to;
		return $this;
	}

	public function getPermalink(){
		return $this->permalink;
	} 

	public function isDeleted(){
		return true && $this->deleted;
	} 
    
    
    
}