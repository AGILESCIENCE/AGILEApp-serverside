<?PHP
#################################################################################
## Developed by Manifest Interactive, LLC                                      ##
## http://www.manifestinteractive.com                                          ##
## ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ ##
##                                                                             ##
## THIS SOFTWARE IS PROVIDED BY MANIFEST INTERACTIVE 'AS IS' AND ANY           ##
## EXPRESSED OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE         ##
## IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR          ##
## PURPOSE ARE DISCLAIMED.  IN NO EVENT SHALL MANIFEST INTERACTIVE BE          ##
## LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR         ##
## CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF        ##
## SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR             ##
## BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY,       ##
## WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE        ##
## OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE,           ##
## EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.                          ##
## ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ ##
## Author of file: Peter Schmalfeldt                                           ##
#################################################################################

/**
 * @category Apple Push Notification Service using PHP & MySQL
 * @package EasyAPNs
 * @author Peter Schmalfeldt <manifestinteractive@gmail.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @link http://code.google.com/p/easyapns/
 */

/**
 * Begin Document
 */

// AUTOLOAD CLASS OBJECTS... YOU CAN USE INCLUDES IF YOU PREFER
if(!function_exists("__autoload")){ 
	function __autoload($class_name){
		require_once('classes/class_'.$class_name.'.php');
	}
}

// CREATE DATABASE OBJECT ( MAKE SURE TO CHANGE LOGIN INFO IN CLASS FILE )
$db = new DbConnect('localhost', 'apnsuser', 'apnspassword', 'apnsdb');
$db->show_errors();

// FETCH $_GET OR CRON ARGUMENTS TO AUTOMATE TASKS
$apns = new APNS($db);

/**
/*	ACTUAL SAMPLES USING THE 'Examples of JSON Payloads' EXAMPLES (1-5) FROM APPLE'S WEBSITE.
 *	LINK:  http://developer.apple.com/iphone/library/documentation/NetworkingInternet/Conceptual/RemoteNotificationsPG/ApplePushService/ApplePushService.html#//apple_ref/doc/uid/TP40008194-CH100-SW15
 */
$messaggio= $_GET['messaggio'];
$link=$_GET['link'];

$id= $_GET['id'];
/*
$nome = $_GET['n'];
print $nome;
$n= $_GET['n'];
print $n; */
$nico = 0;  // o valore di inizializzazione

    if (isset($_GET['n'] )) {
        $nico = $_GET['n'] ; 
    }
$andrea = 0;  // o valore di inizializzazione

    if (isset($_GET['a'] )) {
        $andrea = $_GET['a'] ; 
    }


print '<html><body background="sfondo1.jpg">';
print '<table>';
print '<tr>';
print '<td>Messaggio:   </td><td>  </td><td>';
print $messaggio;
print'</td></tr>';
print '<tr>';
print '<td>Link:  </td><td>  </td><td>';
print $link;
print '</td></tr>';

print '</table>';
print '<br><br><a href="http://marlin.iasfbo.inaf.it/apns">Torna al form</a>'; 

print '</body></html>';




// APPLE APNS EXAMPLE 1
//if($nico=='1' && $andrea=='1')
	$apns->newMessage();
/*
if($nico=='1' && $andrea=='0')
	$apns->newMessage(1);
if($nico=='0' && $andrea=='1')
	$apns->newMessage(2);*/
$apns->addMessageAlert($messaggio);
$apns->addMessageCustom('id',$id);
$apns->addMessageCustom('link',$link);
$apns->addMessageSound('bingbong.aiff');
$apns->addMessageBadge(1);
$apns->queueMessage();

// SEND ALL MESSAGES NOW
//if($nico!='0' || $andrea!='0')
$apns->processQueue();

?>
