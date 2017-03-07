<?PHP
namespace VatCertificates;

class Certificate implements ApiObject {
    
    private $uuid;
    private $reference_document;
    private $reference;
    private $reference_date;
    private $reference_url;
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
    private $permalink;
    
    
    public function __construct($apiData = array()) {
        $this->uuid = isset($apiData['Certificate']['uuid']) ? $apiData['Certificate']['uuid'] : '';
        $this->reference_document = isset($apiData['Certificate']['reference_document']) ? $apiData['Certificate']['reference_document'] : '';
        $this->reference = isset($apiData['Certificate']['reference']) ? $apiData['Certificate']['reference'] : '';
        $this->reference_date = isset($apiData['Certificate']['reference_date']) ? $apiData['Certificate']['reference_date'] : '';
        $this->reference_url = isset($apiData['Certificate']['reference_url']) ? $apiData['Certificate']['reference_url'] : '';
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
        $this->permalink = isset($apiData['Certificate']['permalink']) ? $apiData['Certificate']['permalink'] : '';
    }	
    
    /**
     * Formats to object as array for use in the API
     **/
    public function asArray() {
        return array(
            "Certificate" => array(
            	"uuid" => $this->uuid,
                "reference_document" => $this->reference_document,
                "reference" => $this->reference,
                "reference_date" => $this->reference_date,
                "reference_url" => $this->reference_url,
                "firstname" => $this->firstname,
                "lastname" => $this->lastname,
                "living_at" => $this->living_at,
                "street" => $this->street,
                "streetnumber" => $this->streetnumber,
                "zipcode" => $this->zipcode,
                "city" => $this->city,
                "use_type" => $this->use_type,
                "private_usage" => $this->private_usage,
            )    
        );
    } 
    
    public function getUuid(){
		return $this->uuid;
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

	public function getReference_url(){
		return $this->reference_url;
	}

	public function setReference_url($reference_url){
		$this->reference_url = $reference_url;
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

	public function getSigned(){
		return $this->signed;
	} 

	public function getSignDate(){
		return $this->sign_date;
	} 

	public function getSignLocation(){
		return $this->sign_location;
	} 

	public function getPermalink(){
		return $this->permalink;
	} 
    
    
    
}