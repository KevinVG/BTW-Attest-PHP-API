<?PHP
require_once('src/Api/Api.php'); 

class AuthTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
    }

    protected function tearDown()
    {
    }   
    
    public function testNoAuth() {
        $VatCertificates = new \VatCertificates\Api("", ""); ;
        
        try {
            $certificate = new \VatCertificates\Certificate();
            $VatCertificates->Certificates->add($certificate);
        } catch(VatCertificates\Exception $e) { 
            $this->assertEquals(get_class($e),'VatCertificates\MissingXUserKeyException'); 
        } 
    } 
     
     
    
}
