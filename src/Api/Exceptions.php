<?PHP
namespace VatCertificates;

// Generic Exception
class Exception extends \Exception {}

// Auth Exceptions
class MissingXUserKeyException extends Exception {};  
class InvalidXUserKeyException extends Exception {};  

// Certificate Exceptions
class NotFoundException extends Exception {};
class InvalidDataException extends Exception {};  

// Other
class InternalException extends Exception {};
class UnknownErrorException extends Exception {};