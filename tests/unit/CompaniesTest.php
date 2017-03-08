<?PHP
require_once('src/Api/Api.php'); 

class CompaniesTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
    }

    protected function tearDown()
    {
    }    
    
    public function testGetCompany() {
        $vatCertificates = new \VatCertificates\Api(X_USER_KEY); ; 
        $company = $vatCertificates->Companies->view();  
        $this->assertEquals($company->getName(), 'Test Company 900'); 
    }  
    
}
