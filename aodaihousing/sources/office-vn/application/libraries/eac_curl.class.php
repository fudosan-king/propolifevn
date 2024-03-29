<?php
/**
 * eac_curl.class.php * curl class
 *
 * PHP version 5
 *
 * @author	   Kevin Burkholder <KBurkholder@EarthAsylum.com>
 */

/* +------------------------------------------------------------------------+
   | Copyright 2008, Kevin Burkholder               www.KevinBurkholder.com |
   | Some rights reserved.                                                  |
   |                                                                        |
   | This work is licensed under the Creative Commons GNU Lesser General    |
   | Public License. To view a copy of this license, visit                  |
   |     http://creativecommons.org/licenses/LGPL/2.1/                      |
   |                                                                        |
   | Please see the License_LGPL_x.x.txt file for redistribution and use    |
   | restrictions. If this file was not included with the distribution of   |
   | this software, it may be found here:                                   |
   |     http://www.kevinburkholder.com/sw_license.php                      |
   |                                                                        |
   | THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS    |
   | "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT      |
   | LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR  |
   | A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT   |
   | OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,  |
   | SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT       |
   | LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,  |
   | DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY  |
   | THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT    |
   | (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE  |
   | OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.   |
   |                                                                        |
   +------------------------------------------------------------------------+
   |                                                                        |
   | Author:     Kevin Burkholder                                           |
   |             EarthAsylum Consulting                                     |
   |             KBurkholder@EarthAsylum.com                                |
   |                                                                        |
   +------------------------------------------------------------------------+ */
 
/** a simple GET request:
 * include('eac_curl.class.php');
 * $http = new cURL();
 * $result = $http->get('http://www.kevinburkholder.com/PostTest.php');
 */
 
/**
 * // set some fields
 * $fields = array();
 * $fields['FirstName'] = "Kevin";
 * $fields['LastName'] 	= "Burkholder";
 * $fields['FullName'] 	= "Kevin J. Burkholder";
 * $fields['Email']		= "kburkholder@earthasylum.com";
 * 
 * // set some options - see http://us3.php.net/manual/en/function.curl-setopt.php
 * $options = array();
 * $options['CURLOPT_AUTOREFERER']	= 1;
 * $options['CURLOPT_CRLF'] 		= 1;
 * $options['CURLOPT_NOPROGRESS'] 	= 1;
 * 
 * include('eac_curl.class.php');
 * // instantiate and load options
 * $http = new cURL($options);
 * // another way to load options
 * $http->setOptions($options);
 * 
 * // add a new (single) option
 * $http->setOption('CURLOPT_BUFFERSIZE', 32768);
 * 
 * // copy the http request headers to the curl request
 * $http->copyHeaders();
 * 
 * // copy cookie array to the curl request
 * $http->copyCookies();
 * 
 * // add a header
 * $http->header('X-EAC-CURL-Test: cURL test header');
 * 
 * // post to PostTest.php with fields
 * echo $http->post('http://www.kevinburkholder.com/PostTest.php',$fields);
 * 
 * // display the response headers, the cURL stats, and our options
 * echo "<pre>";
 * print_r($http->getHeaders());
 * print_r($http->getInfo());
 * print_r($http->getOptions());
 * echo "</pre>";
 *
 * // $http->success = false on error, else true
 * // $http->error = error message (on error)
 */
 
class cURL {

	var $Version		= "v0.7.4, (Apr 6, 2008)";
	var $Signature		= "eac_curl.class.php; %s; [www.KevinBurkholder.com]";
	var $Type			= "CURL";

	/**
	 * Optional callback function
	 *
	 * @var mixed
	 * @access private
	 */
	private $callback = false;

	/**
	 * request headers
	 *
	 * @var array
	 * @access private
	 */
	private $reqHeaders = array();

	/**
	 * response headers
	 *
	 * @var array
	 * @access private
	 */
	private $resHeaders = array();

	/**
	 * response info
	 *
	 * @var array
	 * @access private
	 */
	private $info = array();

	/**
	 * cURL options
	 *
	 * @var array
	 * @access private
	 */
	private $options = array();

	/**
	 * cURL result
	 *
	 * @var string
	 * @access private
	 */
	private $lastResult = null;

	/**
	 * curl status
	 *
	 * @var string
	 * @access private
	 */
	public $success = null;
	public $error = null;


	/**
	 * Constrtuctor method
	 *
	 * @param array $options	curl_setopt options
	 */
	public function __construct($options = null)
	{
		if (!extension_loaded('curl') && !@dl(PHP_SHLIB_SUFFIX == 'so' ? 'curl.so' : 'php_curl.dll')) {
			$this->error = 'Unable to load CURL extension';
			$this->success = false;
			trigger_error($this->error,E_USER_ERROR);
			return false;
		}
		$this->Signature = sprintf($this->Signature,$this->Version);
		$this->setOptions($options);
	}


	/**
	 * set options
	 *
	 * @param array $options	curl_setopt options
	 */
	public function setOptions($options = null)
	{
		$this->reqHeaders = array();
		$this->options['CURLOPT_HEADER']			= 0;							// no headers in result
		$this->options['CURLOPT_NOBODY'] 			= 0;							// include body in response
		$this->options['CURLOPT_USERAGENT']			= $_SERVER['HTTP_USER_AGENT'];	// pass user agent
		$this->options['CURLOPT_FOLLOWLOCATION']	= 1;							// allow redirection
		$this->options['CURLOPT_MAXREDIRS']			= 10;							// max redirects
		$this->options['CURLOPT_TIMEOUT']			= 120;							// max time in seconds
		$this->options['CURLOPT_ENCODING']			= "";							// allow curl to manage decoding
		$this->options['CURLOPT_RETURNTRANSFER']	= 1;							// return results as string
		$this->options['CURLOPT_BINARYTRANSFER']	= 0;							// no binary transfer
		$this->options['CURLOPT_SSL_VERIFYPEER']	= 0;							// don't verify ssl certs
		$this->options['CURLOPT_COOKIEJAR']			= BASEFOLDER.'static/uploads/curl_cookies.txt';
		$this->options['CURLOPT_COOKIEFILE']		= BASEFOLDER.'static/uploads/curl_cookies.txt';
		if (is_array($options)) {
			foreach($options as $opt => $val) $this->setOption($opt,$val);
		}
	}
	

	/**
	 * set a single option
	 *
	 * @param string $option	curl_setopt option name
	 * @param mixed $value		curl_setopt value
	 */
	public function setOption($option, $value)
	{
		if (substr($option,-11) == 'ASYNCRONOUS') {
			$option = "CURLOPT_TIMEOUT";
			$value = ($value) ? 1 :  $this->options['CURLOPT_TIMEOUT'];
		}
		$this->options[str_replace('STREAMS','CURLOPT',$option)] = $value;
	}
	
	
	/**
	 * set a callback function
	 * myfunction(curl_result, curl_handle=null) {}
	 *
	 * @access public
	 * @param string $function	'function_name'
	 * @param array $function	array('class_name', 'function_name')
	 */
	public function setCallback($function) 
	{
		$this->callback = $function;
	}


	/**
	 * set default headers
	 *
	 * @access public
	 */
	public function copyHeaders() 
	{
		foreach($_SERVER as $key => $value) {
			if (substr($key,0,5) == "HTTP_") {
				if (substr($key,5,1) != "X")
					$key = str_replace(' ','-',ucwords(strtolower(str_replace('_',' ',str_replace('HTTP_','',$key)))));
				else
					$key = str_replace('_','-',str_replace('HTTP_','',$key));
				if (!$this->options['CURLOPT_COOKIEFILE'] || strtolower($key) != "cookie")
					$this->header($key.": ".$value);
			}
		}
	}


	/**
	 * set cookie header
	 *
	 * @access public
	 */
	public function copyCookies() 
	{
		if (!is_array($_COOKIE)) return;
		$cookies = array();
		foreach ($_COOKIE as $key => $item)
			$cookies[] = $key . "=" . $item;
		$this->header('Cookie: '.implode('; ',$cookies));
	}
	

	/**
	 * add a request header
	 *
	 * @access public
	 * @param string $header	header (header-name: header-value)
	 */
	public function header($header) 
	{
		if (!in_array($header,$this->reqHeaders))
			$this->reqHeaders[] = $header;
	}
	

	/**
	 * http GET request
	 *
	 * @access public
	 * @param string $url 		the request url
	 * @param array $options 	additional options
	 */
	public function get($url, $options = null) 
	{
		$this->_resetOpt();
		if (is_array($options)) 
			foreach($options as $opt => $val) $this->setOption($opt,$val);
		$this->options['CURLOPT_HTTPGET'] = 1;
		return $this->httpRequest($url);
	}
	

	/**
	 * http POST request
	 *
	 * @access public
	 * @param string $url 		the request url
	 * @param mixed $fields 	POST variables
	 * @param array $options 	additional options
	 */
	public function post($url, $fields = null, $options = null) 
	{
		$this->_resetOpt();
		if (is_array($options)) 
			foreach($options as $opt => $val) $this->setOption($opt,$val);
		$fields = http_build_query($fields);
		$this->options['CURLOPT_POST'] = 1;
		$this->options['CURLOPT_POSTFIELDS'] = $fields;
		return $this->httpRequest($url);
	}
	

	/**
	 * http HEAD request
	 *
	 * @access public
	 * @param string $url 		the request url
	 * @param array $options 	additional options
	 */
	public function head($url, $options = null) 
	{
		$this->_resetOpt();
		if (is_array($options)) 
			foreach($options as $opt => $val) $this->setOption($opt,$val);
		$this->options['CURLOPT_HTTPGET'] = 1;
		$this->options['CURLOPT_HEADER'] = 1;
		$this->options['CURLOPT_NOBODY'] = 1;
		return $this->httpRequest($url);
	}
	

	/**
	 * http PUT request
	 *
	 * @access public
	 * @param string $url 		the request url
	 * @param string $fn_or_data '@filename' or data string
	 * @param array $options 	additional options
	 */
	public function put($url, $fn_or_data, $options = null) 
	{
		$this->_resetOpt();
		if (is_array($options)) 
			foreach($options as $opt => $val) $this->setOption($opt,$val);
		$fp = fopen('php://temp', 'rw');
		if (substr($fn_or_data,0,1) == '@') {
			$fn_or_data = substr($fn_or_data,1);
			$length = fwrite($fp, @file_get_contents($fn_or_data,FILE_USE_INCLUDE_PATH));
			if (!$length) {
				$fn_or_data = str_replace('//','/',$_SERVER['DOCUMENT_ROOT']."/".$fn_or_data);
				$length = fwrite($fp, @file_get_contents($fn_or_data,FILE_USE_INCLUDE_PATH));
			}
		} else $length = fwrite($fp, $fn_or_data);
		rewind($fp);
		
		$this->options['CURLOPT_PUT'] = 1;
		$this->options['CURLOPT_INFILE'] = $fp;
		$this->options['CURLOPT_INFILESIZE'] = $length;
		$suserpw = $this->options['CURLOPT_USERPWD'];
		if (!isset($this->options['CURLOPT_USERPWD']) && isset($_SERVER['SERVER_ADMIN']))
			$this->options['CURLOPT_USERPWD'] = "anonymous:".$_SERVER['SERVER_ADMIN'];

		$return = $this->httpRequest($url);
		$this->options['CURLOPT_USERPWD'] = $suserpw;
		fclose($fp);
		return $return;
	}
	

	/**
	 * http DELETE request
	 *
	 * @access public
	 * @param string $url 		the request url
	 * @param array $options 	additional options
	 */
	public function delete($url, $options = null) 
	{
		$this->_resetOpt();
		if (is_array($options)) 
			foreach($options as $opt => $val) $this->setOption($opt,$val);
		$this->options['CURLOPT_CUSTOMREQUEST'] = "DELETE";
		
		$suserpw = $this->options['CURLOPT_USERPWD'];
		if (!isset($this->options['CURLOPT_USERPWD']) && isset($_SERVER['SERVER_ADMIN']))
			$this->options['CURLOPT_USERPWD'] = "anonymous:".$_SERVER['SERVER_ADMIN'];
		
		$return = $this->httpRequest($url);
		$this->options['CURLOPT_USERPWD'] = $suserpw;
		return $return;
	}
	

	/**
	 * http OPTIONS request
	 *
	 * @access public
	 * @param string $url 		the request url or '*'
	 * @param array $options 	additional options
	 */
	public function options($url, $options = null) 
	{
		$this->_resetOpt();
		if (is_array($options)) 
			foreach($options as $opt => $val) $this->setOption($opt,$val);
		$this->options['CURLOPT_HEADER'] = 1;
		$this->options['CURLOPT_NOBODY'] = 1;
		$this->options['CURLOPT_CUSTOMREQUEST'] = "OPTIONS";
		return $this->httpRequest($url);
	}
	

	/**
	 * http TRACE request
	 *
	 * @access public
	 * @param string $url 		the request url
	 * @param array $options 	additional options
	 */
	public function trace($url, $options = null) 
	{
		$this->_resetOpt();
		if (is_array($options)) 
			foreach($options as $opt => $val) $this->setOption($opt,$val);
		$this->options['CURLOPT_CUSTOMREQUEST'] = "TRACE";
		return $this->httpRequest($url);
	}


	/**
	 * http request
	 *
	 * @access public
	 * @param string $url 		the request url
	 */
	public function httpRequest($url) 
	{
		$this->header('X-EAC-Request: '.$this->Signature);
		$url = str_replace('&amp;','&',$url);
		$ch = curl_init($url);

		if (count($this->reqHeaders) > 0) {
			curl_setopt($ch, CURLOPT_HTTPHEADER, $this->reqHeaders);
		}
		foreach($this->options as $opt => $val) {
			if (is_string($opt)) $opt = constant(strtoupper($opt));
			@curl_setopt($ch, $opt, $val);
		}
		curl_setopt($ch, CURLOPT_HEADERFUNCTION, array(&$this,'_parseHeaders'));

		$this->lastResult = curl_exec($ch);
		$this->info = curl_getinfo($ch);

		if (curl_errno($ch) == 28 && $this->options['CURLOPT_TIMEOUT'] == 1) {
			$this->success = true;
			$this->lastResult = "OK";
			return $this->lastResult;
		}
				
		if ($this->lastResult) {
			if (array_key_exists('Content-Encoding', $this->resHeaders) && stripos($this->resHeaders['Content-Encoding'],"gzip") !== false) {
				if (!isset($this->options['CURLOPT_ENCODING'])) $this->lastResult = $this->_gzdecode($this->lastResult);
				$this->info['decoded_content_length'] = strlen($this->lastResult);
			}
			if ($this->callback) {
				$this->lastResult = call_user_func($this->callback, $this->lastResult, $ch);
				$this->callback = false;
			}
			$this->success = true;
		} else {
			$this->error = curl_error($ch);
			$this->success = false;
			$this->lastResult = $this->error;
		}

		curl_close($ch);
		return $this->lastResult;
	}
	

	/**
	 * send (email) last result
	 *
	 * @access public
	 * @param string $to 		the 'to' email address
	 * @param string $from 		the 'from' email address
	 * @param string $subject 	the email subject
	 * @param string $xheaders 	extra headers
	 * @param string $EOL	 	end-of-line character (\n or \r\n)
	 */
	public function sendLastResult($to, $from = false, $subject = false, $xheaders = array(), $EOL = "\n") 
	{
		if (!$from) {
			if (isset($_SERVER['SERVER_ADMIN']))
				$from = $_SERVER['SERVER_ADMIN'];
			else if (isset($_SERVER['HTTP_HOST']))
				$from = 'webmaster@'.$_SERVER['HTTP_HOST'];
		}
		if (!$subject) {
			$subject = array_shift(explode(';',$this->Signature))." Results";
		}
		if (is_string($xheaders)) {
			$xheaders = explode(";",$xheaders);
		}
		$headers  = "X-Mailer: " . $this->Signature . $EOL;
		$headers .=	"From: " . $from . $EOL;
		if (isset($this->info['content_type'])) {
			$headers .= "Content-Type: ".$this->info['content_type'] . $EOL;
		}
		if (is_array($xheaders)) {
			foreach ($xheaders as $header) $headers .= $header . $EOL;
		}
		return mail($to, $subject, $this->lastResult, $headers);
	}
	

	/**
	 * get last result
	 *
	 * @access public
	 */
	public function getLastResult() 
	{
		return $this->lastResult;
	}
	

	/**
	 * get response info
	 *
	 * @access public
	 */
	public function getInfo() 
	{
		return $this->info;
	}
	

	/**
	 * get response headers
	 *
	 * @access public
	 */
	public function getHeaders() 
	{
		return $this->resHeaders;
	}
	

	/**
	 * get options array
	 *
	 * @access public
	 */
	public function getOptions() 
	{
		return $this->options;
	}


	/**
	 * callback function for reading and processing headers
	 * 
	 * @param object $ch
	 * @param string $header
	 * @return integer		size of headers
	 */
	private function _parseHeaders($ch, $header) 
	{
		if (strlen($header) > 2) {
			list($key,$value) = explode(" ",rtrim($header,"\r\n"),2);
			if (substr($key,0,1) != "X")
				$key = str_replace(' ','-',ucwords(strtolower(str_replace('-',' ',$key))));
			$this->resHeaders[rtrim($key,":")] = $value;
		}
		return strlen($header);
	}


	/**
	 * unset function parameters
	 * 
	 */
	private function _resetOpt() 
	{
		unset($this->options['CURLOPT_HTTPGET']);
		unset($this->options['CURLOPT_POST']);
		unset($this->options['CURLOPT_POSTFIELDS']);
		unset($this->options['CURLOPT_PUT']);
		unset($this->options['CURLOPT_INFILE']);
		unset($this->options['CURLOPT_INFILESIZE']);
		unset($this->options['CURLOPT_CUSTOMREQUEST']);
		$this->options['CURLOPT_HEADER'] = 0;
		$this->options['CURLOPT_NOBODY'] = 0;
	}



	/**
	 * gzdecode function (missing from PHP)
	 * 
	 * @param string $data 		gzencoded data
	 * @return string decoded data
	 */
	private function _gzdecode($data) {
		$flags = ord(substr($data, 3, 1));
		$headerlen = 10;
		$extralen = 0;
		$filenamelen = 0;
		if ($flags & 4) {
			$extralen = unpack('v' ,substr($data, 10, 2));
			$extralen = $extralen[1];
			$headerlen += 2 + $extralen;
		}
		if ($flags & 8) // Filename
			$headerlen = strpos($data, chr(0), $headerlen) + 1;
		if ($flags & 16) // Comment
			$headerlen = strpos($data, chr(0), $headerlen) + 1;
		if ($flags & 2) // CRC at end of file
			$headerlen += 2;
		$unpacked = gzinflate(substr($data, $headerlen));
		if ($unpacked === false) $unpacked = $data;
		return $unpacked;
	}
}
?>