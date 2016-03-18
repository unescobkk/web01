<?php require_once("config.php"); 

$sql = "SELECT * from wtdmsg where  WaitSendMail = 0 AND Online = 1 AND Msgid = 507 ";
$objExec = mssql_query($sql);
$count = 0;
$count_err = 0;

while($objResult = mssql_fetch_array($objExec))
{
	$objResult["SenderName"];
	//$emailto =  $objResult["RecipientEmail"];  //อีเมล์ผู้รับ
	 $emailto = "por_srop@hotmail.com";
	$subject = "World Teachers' Day 2014 e-Postcard";
	$headers = "Content-type: text/html; charset=UTF-8\n";
	$headers .= "From:".$objResult["SenderName"]."<".$objResult["SenderEmail"].">";
	//echo $headers.="From: ".$objResult["SenderName"]."E-mail :". $objResult["SenderEmail"]; ; //ชื่อและอีเมลผู้ส่ง
	//$messages.= "$text</br>"; //ข้อความ
	//$messages.= "จาก $sender<br>";//ข้อความ
	//mail($emailto,$subject,$messages,$header);
	$messages =
	"<table width='500' border='0' align='center' cellpadding='10' bgcolor='#ededed'>
		<tr><td align='center' valign='middle'><font size='3' face='Arial, Helvetica, sans-serif'> You have received a World Teachers' Day 2014 e-postcard </font></td></tr>
		<tr><td><img src='http://webapp-promis.unescobkk.org/source/fervency/images/ecard".$objResult['CardNo'].".jpg'width='500' height='766' /></td></tr>
		<tr><td align='center' valign='middle' style='white-space:pre-wrap;white-space:-moz-pre-wrap;white-space:-pre-wrap;white-space:-o-pre-wrap;word-wrap:break-word'>
		<font size='3' color='#000000' face='Arial, Helvetica, sans-serif'><b>".$objResult['Msg']."</b></font></td></tr>
		<tr><td><p align='center'>
		<font size='2' face='Arial, Helvetica, sans-serif'>This e-postcard was sent by".$objResult['SenderName']."via UNESCO Bangkok. <br />UNESCO is not affiliated with the sender of this e-postcard and does not take any responsibility for its content.</font>
		</td>
		</tr>
	</table>";



	if(mail($emailto,$subject,$messages,$headers)){
		$count++;
		echo "Send Mail True" ; //ส่งเรียบร้อย

		$strSQL = "UPDATE wtdmsg SET WaitSendMail = 1";

		$strSQL .="WHERE Msgid = '".$objResult["Msgid"]."' ";
		$objQuery = mssql_query($strSQL);

	}else{
		$count_err++;
		echo "Send Mail False" ; //ไม่สามารถส่งเมล์ได้
	}

}

?>