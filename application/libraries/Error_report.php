<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Error_report{

    public $eMailContents   =   "";

    public function __construct()
    {
        $this->CI = & get_instance();

    }//	end function

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //	@	Loading Test
    public function test()
    {
        echo "<br>Error_report Class Loading Success<br>";
    }//	end function

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //	@	Error Report Send By Email
    public function SendErrorReportByEmail()
    {
        $fromEmail	        	=	"develop@webinars.co.kr";
        $fromName	        	=	"develop";
        $eMailTitle             =   "[ErrorReport] 시스템 에러가 의심됩니다. - [자동발송] - ";
        $eMailContents          =   $this->eMailContents;

        ////////////////////////////////////////////////////////////////////////////////////////////////
        $config['mailtype'] 	= "html";
        //	$this->config['charset']   = "euc-kr";
        $config['charset']   	= "utf-8";
        ////////////////////////////////////////////////////////////////////////////////////////////////
        //	$config['protocol']		= 'sendmail';
        //	$config['mailpath']		= '/usr/sbin/sendmail';
        ////////////////////////////////////////////////////////////////////////////////////////////////

        $config['protocol']  	= "smtp";
        $config['smtp_host'] 	= "ssl://smtp.gmail.com";
        $config['smtp_port'] 	= 465;
        $config['smtp_user'] 	= "enroll01@webinars.co.kr";
        $config['smtp_pass'] 	= "weBI5785()";
        $config['smtp_timeout'] = 10;

        $config['newline']    	= "\r\n";

        $this->CI->load->library('email', $config);

        $this->CI->email->set_newline("\r\n");
        $this->CI->email->clear();
        $this->CI->email->from($fromEmail, $fromName);

        $receiverEmail  =   "youngmin.yuk@webinars.co.kr";

        $this->CI->email->to($receiverEmail);
        $this->CI->email->subject( $eMailTitle );
        $this->CI->email->message( $eMailContents );
        $this->CI->email->send();

    }// end function



}//	end class














?>