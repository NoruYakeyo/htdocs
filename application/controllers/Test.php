<?php if (!defined('BASEPATH'))     exit('No direct script access allowed');
 
class Test extends CI_Controller {
     
    function __construct()
    {
		parent::__construct();    
		//$this->load->library('encrypt');
	}

	public function info()
	{
		$msg = 'My secret message';
		$key = 'super-secret-key';
		
		$encrypted_string = $this->encrypt->encode($msg, $key);
		echo $encrypted_string;
	}
	
	public function ajent()
	{
		$this->load->library('user_agent');

		if ($this->agent->is_browser())
		{
				$agent = $this->agent->browser().' '.$this->agent->version();
		}
		elseif ($this->agent->is_robot())
		{
				$agent = $this->agent->robot();
		}
		elseif ($this->agent->is_mobile())
		{
				$agent = $this->agent->mobile();
		}
		else
		{
				$agent = 'Unidentified User Agent';
		}

		echo $agent;

		echo $this->agent->platform(); // Platform info (Windows, Linux, Mac, etc.)
	}

		public function cal()
		{
			$this->load->library('calendar');

			$data = array(
					3  => 'http://example.com/news/article/2006/06/03/',
					7  => 'http://example.com/news/article/2006/06/07/',
					13 => 'http://example.com/news/article/2006/06/13/',
					26 => 'http://example.com/news/article/2006/06/26/'
			);

			echo $this->calendar->generate(date("Y"), date("m"), $data);

			echo date("Y-m-d H:i:s");
			echo "<br>";
			echo date("Y-m-d");

			echo "<hr>";
			$a =  $this->uri->segment(3);
			$b = $this->uri->segment(4);

			echo $a-$b;
			echo  $this->uri->segment(5);
		}

		function aaaa()
		{
			$this->benchmark->mark('code_start');

// Some code happens here

$this->benchmark->mark('code_end');

echo $this->benchmark->elapsed_time('code_start', 'code_end');
		}
	}



