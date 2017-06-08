<?PHP
require_once('src/Api/Api.php'); 

class CertificatesTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
    }

    protected function tearDown()
    {
    }   
    
    public function testInvalidId() {
        $vatCertificates = new VatCertificates\Api(X_USER_KEY); ;
        
        try {
            $vatCertificates->Certificates->view("4c7caa8c-00da-11e7-93ae-92361f002671");
        } catch(VatCertificates\Exception $e) { 
            $this->assertEquals(get_class($e),'VatCertificates\NotFoundException'); 
        } 
    }    
    
    public function testInvalidData() {
        $vatCertificates = new VatCertificates\Api(X_USER_KEY); ;
        $certificate = new VatCertificates\Certificate();
        
        try {
            $vatCertificates->Certificates->add($certificate);
        } catch(VatCertificates\Exception $e) { 
            $this->assertEquals(get_class($e),'VatCertificates\InvalidDataException'); 
        } 
    }     
    
    public function testCrudCertificate() {
        $vatCertificates = new \VatCertificates\Api(X_USER_KEY); ;
        $certificate = new \VatCertificates\Certificate();
        $certificate
            ->setReference('INVOICE ' . rand(1000,9999))
            ->setReferenceDocument('invoice')
            ->setReferenceDate(date('Y-m-d'))
            ->setLanguageId('fra')
            ->setFirstname('Kevin')
            ->setLastname('Van Gyseghem')
            ->setLivingAt('Asse')
            ->setStreet('Lindendries')
            ->setStreetnumber('5')
            ->setZipcode('1730')
            ->setCity('Asse')
            ->setUseType('owner')
            ->setPrivateUsage('only')
            ->setSentTo('kevin@infinwebs.be');
         
        $uuid = $vatCertificates->Certificates->add($certificate); 
        $UUIDv4 = '/^[0-9A-F]{8}-[0-9A-F]{4}-4[0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i';
        if(!preg_match($UUIDv4, $uuid)) {
            throw new Exception('Invalid uuid');
        } 
        
        $apiCertificate = $vatCertificates->Certificates->view($uuid); 
        $this->assertEquals($uuid, $apiCertificate->getUuid());
        $this->assertEquals($certificate->getReference(), $apiCertificate->getReference());
        $this->assertEquals($certificate->getReferenceDocument(), $apiCertificate->getReferenceDocument());
        $this->assertEquals($certificate->getReferenceDate(), $apiCertificate->getReferenceDate());
        $this->assertEquals($certificate->getLanguageId(), $apiCertificate->getLanguageId());
        $this->assertEquals($certificate->getFirstname(), $apiCertificate->getFirstname());
        $this->assertEquals($certificate->getLastname(), $apiCertificate->getLastname());
        $this->assertEquals($certificate->getLivingAt(), $apiCertificate->getLivingAt());
        $this->assertEquals($certificate->getStreet(), $apiCertificate->getStreet());
        $this->assertEquals($certificate->getStreetnumber(), $apiCertificate->getStreetnumber());
        $this->assertEquals($certificate->getZipcode(), $apiCertificate->getZipcode());
        $this->assertEquals($certificate->getCity(), $apiCertificate->getCity());
        $this->assertEquals($certificate->getUseType(), $apiCertificate->getUseType());
        $this->assertEquals($certificate->getPrivateUsage(), $apiCertificate->getPrivateUsage());
        $this->assertEquals($certificate->getSentTo(), $apiCertificate->getSentTo());
        
        $apiCertificate
            ->setReference('PROPOSAL ' . rand(1000,9999))
            ->setReferenceDocument('proposal')
            ->setReferenceDate(date('Y-m-d',time()-60*60*24*3))
            ->setFirstname('Jan')
            ->setLastname('Janssen')
            ->setLivingAt('Brussel')
            ->setStreet('Wetstraat')
            ->setStreetnumber('1')
            ->setZipcode('1000')
            ->setCity('Brussel')
            ->setUseType('renter')
            ->setPrivateUsage('mainly');
        $vatCertificates->Certificates->edit($apiCertificate); 
        
        $apiCertificate2 = $vatCertificates->Certificates->view($uuid); 
        $this->assertEquals($apiCertificate->getUuid(), $apiCertificate2->getUuid());
        $this->assertEquals($apiCertificate->getReference(), $apiCertificate2->getReference());
        $this->assertEquals($apiCertificate->getReferenceDocument(), $apiCertificate2->getReferenceDocument());
        $this->assertEquals($apiCertificate->getReferenceDate(), $apiCertificate2->getReferenceDate());
        $this->assertEquals($apiCertificate->getFirstname(), $apiCertificate2->getFirstname());
        $this->assertEquals($apiCertificate->getLastname(), $apiCertificate2->getLastname());
        $this->assertEquals($apiCertificate->getLivingAt(), $apiCertificate2->getLivingAt());
        $this->assertEquals($apiCertificate->getStreet(), $apiCertificate2->getStreet());
        $this->assertEquals($apiCertificate->getStreetnumber(), $apiCertificate2->getStreetnumber());
        $this->assertEquals($apiCertificate->getZipcode(), $apiCertificate2->getZipcode());
        $this->assertEquals($apiCertificate->getCity(), $apiCertificate2->getCity());
        $this->assertEquals($apiCertificate->getUseType(), $apiCertificate2->getUseType());
        $this->assertEquals($apiCertificate->getPrivateUsage(), $apiCertificate2->getPrivateUsage());
        
        $index = $vatCertificates->Certificates->index();
        $found = false;
        foreach($index as $i => $certificate) {
            if($certificate->getUuid() == $uuid) {
                $found = true;
            }
        }
        $this->assertTrue($found, 'Certificate not found in list');
        
        $vatCertificates->Certificates->delete($uuid);
        
        $index = $vatCertificates->Certificates->index();
        $found = false;
        foreach($index as $i => $certificate) {
            if($certificate->getUuid() == $uuid) {
                $found = true;
            }
        }
        $this->assertFalse($found, 'Certificate found in list');
    } 
    
    public function assertArray($expected, $result, $testcase) {
        foreach($expected as $field => $value) {
            if(is_array($value)) {
                $this->assertArray($value, $result[$field], $testcase);
            } else {
                $this->assertEquals($value, $result[$field],'Testcase ' . $testcase  . ' error: ' .  $field . ' - ' . json_encode($result));
            }
        }
    } 
     
    
}
