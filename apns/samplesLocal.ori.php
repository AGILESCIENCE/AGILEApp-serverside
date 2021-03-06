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
$db = new DbConnect('localhost', 'student1', 'AGILE2013science', 'apns');
$db->show_errors();

// FETCH $_GET OR CRON ARGUMENTS TO AUTOMATE TASKS
$apns = new APNS($db);

/**
/*      ACTUAL SAMPLES USING THE 'Examples of JSON Payloads' EXAMPLES (1-5) FROM APPLE'S WEBSITE.
 *      LINK:  http://developer.apple.com/iphone/library/documentation/NetworkingInternet/Conceptual/RemoteNotificationsPG/ApplePushService/ApplePushService.html#//apple_ref/doc/uid/TP40008194-CH100-SW15
 */
$messaggio= '';

$messaggio='';

        if(isset($_GET['message'])){
        $messaggio= $_GET['message'];
}
/*
$valentina='';

        if(isset($_GET['v'])){
        $valentina= $_GET['v'];
}*/
$team=0;

        if(isset($_GET['t'])){
        $team= $_GET['t'];
}
/*$marco='';

        if(isset($_GET['m'])){
        $marco= $_GET['m'];
}
*/
$link='';

	if(isset($_GET['link'])){
	$link= $_GET['link'];
}

$id= 0;

        if(isset($_GET['id'])){
        $id= $_GET['id'];
}

$nico = 0;  // o valore di inizializzazione

    if (isset($_GET['n'] )) {
        $nico = $_GET['n'] ;
    }
$andrea = 0;  // o valore di inizializzazione

    if (isset($_GET['a'] )) {
        $andrea = $_GET['a'] ;
    }
$all = 0;  // o valore di inizializzazione

    if (isset($_GET['all'] )) {
        $all = $_GET['all'] ;
    }
/*$pwd = 0;  // o valore di inizializzazione

    if (isset($_GET['pwd'] )) {
        $pwd = $_GET['pwd'] ;
    }
*/
print '<html><body background="sfondo1.jpg">';
print '<table>';
print '<tr>';
print '<td>Messaggio:   </td><td>  </td><td>';
if($nico=='0' && $andrea=='0' && $all=='0')
print 'Attenzione! Nessun utente selezionato';
print $messaggio;
print'<br></tr>';
if($id==1)
print 'news';
if($id==2)
print 'top';
if($id==3)
print 'link';
print '<br>';
print 'Nicolo  ';
print $nico;
print 'Team  ';
print $team;
print '<br> Andrea ';
print $andrea;
print '<br> All  ';
print $all;
//print $pwd;
print'</td></tr>';
print '<tr>';
print '<td>Link:  </td><td>  </td><td>';
print $link;
print '</td></tr>';

print '</table>';
//print '<br><br><a href="http://marlin.iasfbo.inaf.it/apns">Torna al form</a>';


print '</body></html>';



// APPLE APNS EXAMPLE 1
if($team=='1')
{
	 	$apns->newMessage(49);
        $apns->addMessageAlert($messaggio);
        $apns->addMessageCustom('id',$id);
        $apns->addMessageCustom('link',$link);
        $apns->addMessageSound('bingbong.aiff');
        $apns->addMessageBadge(1);
        $apns->queueMessage();
        $apns->newMessage(52);
        $apns->addMessageAlert($messaggio);
        $apns->addMessageCustom('id',$id);
        $apns->addMessageCustom('link',$link);
        $apns->addMessageSound('bingbong.aiff');
        $apns->addMessageBadge(1);
        $apns->queueMessage();
        $apns->newMessage(53);
        $apns->addMessageAlert($messaggio);
        $apns->addMessageCustom('id',$id);
        $apns->addMessageCustom('link',$link);
        $apns->addMessageSound('bingbong.aiff');
        $apns->addMessageBadge(1);
        $apns->queueMessage();
        $apns->newMessage(74);
        $apns->addMessageAlert($messaggio);
        $apns->addMessageCustom('id',$id);
        $apns->addMessageCustom('link',$link);
        $apns->addMessageSound('bingbong.aiff');
        $apns->addMessageBadge(1);
        $apns->queueMessage();
        $apns->newMessage(80);
        $apns->addMessageAlert($messaggio);
        $apns->addMessageCustom('id',$id);
        $apns->addMessageCustom('link',$link);
        $apns->addMessageSound('bingbong.aiff');
        $apns->addMessageBadge(1);
        $apns->queueMessage();
}

if($nico=='1' && $andrea=='1')
{
        //print'caso1';
        $apns->newMessage(49);
        $apns->addMessageAlert($messaggio);
        $apns->addMessageCustom('id',$id);
        $apns->addMessageCustom('link',$link);
        $apns->addMessageSound('bingbong.aiff');
        $apns->addMessageBadge(1);
        $apns->queueMessage();
        $apns->newMessage(53);
        $apns->addMessageAlert($messaggio);
        $apns->addMessageCustom('id',$id);
        $apns->addMessageCustom('link',$link);
        $apns->addMessageSound('bingbong.aiff');
        $apns->addMessageBadge(1);
        $apns->queueMessage();
        $apns->newMessage(80);
        $apns->addMessageAlert($messaggio);
        $apns->addMessageCustom('id',$id);
        $apns->addMessageCustom('link',$link);
        $apns->addMessageSound('bingbong.aiff');
        $apns->addMessageBadge(1);
        $apns->queueMessage();
}
if($nico=='1' && $andrea=='0')
{
        //print'caso2';
        $apns->newMessage(49);
        $apns->addMessageAlert($messaggio);
        $apns->addMessageCustom('id',$id);
        $apns->addMessageCustom('link',$link);
        $apns->addMessageSound('bingbong.aiff');
        $apns->addMessageBadge(1);
        $apns->queueMessage();
}
if($nico=='0' && $andrea=='1')
 {
       //print'caso3';
       $apns->newMessage(53);
        $apns->addMessageAlert($messaggio);
        $apns->addMessageCustom('id',$id);
        $apns->addMessageCustom('link',$link);
        $apns->addMessageSound('bingbong.aiff');
        $apns->addMessageBadge(1);
        $apns->queueMessage();
        $apns->newMessage(80);
        $apns->addMessageAlert($messaggio);
        $apns->addMessageCustom('id',$id);
        $apns->addMessageCustom('link',$link);
        $apns->addMessageSound('bingbong.aiff');
        $apns->addMessageBadge(1);
        $apns->queueMessage();
}
if($all=='1')
 {
 
	 $sql = "SELECT `pid` FROM `apns_devices` WHERE `status`='active' and  `pushalert`='enabled'";
	$result = $db->query($sql);
	echo $result->num_rows;
	echo "got here!";
	$pids = array();
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
	   $pids[] = intval($row['pid']);
	}

//print'caso4';
        $apns->newMessage($pids);
        $apns->addMessageAlert($messaggio);
        $apns->addMessageCustom('id',$id);
        $apns->addMessageCustom('link',$link);
        $apns->addMessageSound('bingbong.aiff');
        $apns->addMessageBadge(1);
        $apns->queueMessage();
}

// SEND ALL MESSAGES NOW
if(($nico!='0' || $andrea!='0' || $all!='0' || $team!='0'))
{
//print'process';
$apns->processQueue();
}

?>
      
