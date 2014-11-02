<?php

class ExceptionTemplate
{
    public static function GenericException($exception)
    {
        return '
		<div style="border: 1px solid gray; width: 100%; color: red; font-size:11px; font-family:Tahoma; font-weight:700;">
		  <h2 style="padding:20px 20px 5px 20px">Pipernate Exception</h2>
			<div style="padding:20px 20px 5px 20px">
			  <div><font color="black">Pipernate Exception Type:</font></div>
			  <br clear="all">
			    ' . get_class($exception) . '
			 </div>
			    
   			<div style="padding:20px 20px 20px 20px">
   			  <div><font color="black">Pipernate Exception Code:</font></div>
   			  <br clear="all">
   			   ' . $exception->getCode() . '
   			 </div>
   			 
   			<div style="padding:0px 20px 0px 20px">
   			<div><font color="black">Pipernate Exception Message:</font></div>
   			<br clear="all">
   		      ' . $exception->getMessage() . '
   		    </div>
   		    
   		    <div style="padding:20px 20px 20px 20px">
   			<div><font color="black">Pipernate Exception Trace:</font></div>
   			<br clear="all">
   		      ' . $exception->getTraceAsString() . '
   		    </div>
   		</div>
   		';
    }
}

?>