<?php

require_once '../config/smarty.php';
require_once '../config/db.php';
$file = 'false';
// $method = isset($_REQUEST["methods"]) && is_numeric($_REQUEST["methods"]) && $_REQUEST["methods"] >= 0 ? $_REQUEST["methods"] : null;
$lat = isset($_REQUEST["lat"]) && is_numeric($_REQUEST["lat"]) ? $_REQUEST["lat"] : null;
$lon = isset($_REQUEST["lon"]) && is_numeric($_REQUEST["lon"]) ? $_REQUEST["lon"] : null;
$period = isset($_REQUEST["period"]) ? $_REQUEST["period"] : null;
$method = isset($_REQUEST["methods"]) ? $_REQUEST["methods"] : null;
$variable = isset($_REQUEST["variables"]) ? $_REQUEST["variables"] : null;
$periodh = isset($_REQUEST["periodh"]) ? $_REQUEST["periodh"] : null;
$fileSet = isset($_REQUEST["fileSet"]) && is_numeric($_REQUEST["fileSet"]) && $_REQUEST["fileSet"] >= 0 ? $_REQUEST["fileSet"] : null;
$observation = isset($_REQUEST["observation"]) ? $_REQUEST["observation"] : null;
$station_file = isset($_FILES["station-file"]["tmp_name"]) ? $_FILES["station-file"]["tmp_name"] : null;
$delimitator = isset($_REQUEST["delimit"]) ? $_REQUEST["delimit"] : '';

//$extentId = isset($_REQUEST["extent"]) && is_numeric($_REQUEST["extent"]) && $_REQUEST["extent"] >= 0 ? $_REQUEST["extent"] : null;
//$tile = isset($_REQUEST["tile_name"]) && $_REQUEST["tile_name"] != "" ? $_REQUEST["tile_name"] : null;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// echo "<pre>" . print_r($_REQUEST, true) . "</pre>";
//echo "<pre>" . print_r($_FILES, true) . "</pre>";
// if (isset($_FILES["station-file"]["tmp_name"]) && $_FILES["station-file"]["tmp_name"] != "") {
$namefile=null;
$code=null;
$msgy=null;
$msg=null;

if(!$period){
	$code=7;$msgy="Select period";
}else{$code=0;$msg=null;$msgy=null;}


// print_r($period);	
if ($station_file && $code==0) {

  $file_url = $_FILES["station-file"]["tmp_name"];
  $upload_dir = WORKSPACE_DIR.'/bias_tmp';
  $file_data = file_get_contents($file_url);
  $filename = basename('file_' . time()). ".txt";
  $uri = $upload_dir . '/' . $filename;
  $res = file_put_contents($uri, $file_data);
  $namefile= $_FILES["station-file"]["name"];
  if ($res) {
    $url = SMARTY_ROOT_URI."bias_tmp/";
    $file = $url.$filename;
  }
	// print_r($delimitator);
    if($delimitator=="space"){
		$sepFile=" ";
	} elseif ($delimitator=="tab"){
		$sepFile="\t";
	}elseif ($delimitator=="puntocoma"){
		$sepFile=";";
	}elseif ($delimitator=="comma"){
		$sepFile=",";
	}
	
	$myfile = file($uri);
	$varlist = array("prec","tmin","tmax","tmean","srad");
	$namescol = array("date","prec","tmin","tmax","tmean","srad");
	// $namescol = array("0"=>"date","1"=>"prec","2"=>"tmin","3"=>"tmax","4"=>"tmean","5"=>"srad");
	// $colnames = explode("\t", substr($myfile[0], 0, -2));
	$colnames = explode($sepFile, trim($myfile[0]));
	$start1 = explode($sepFile, $myfile[1]);
	$start = substr($start1[0], 0, 4)."-".substr($start1[0], 4, 2)."-".substr($start1[0], 6, 2);
	$end1   = explode($sepFile, $myfile[count($myfile)-1]);
	$end   = substr($end1[0], 0, 4)."-".substr($end1[0], 4, 2)."-".substr($end1[0], 6, 2);
	$periodst=substr($start1[0], 0, 4).';'.substr($end1[0], 0, 4);
	
	$yfi=explode(";", $period)[0];
	$yff=explode(";", $period)[1];
	$diff=$yff-$yfi;

	$difh=substr($end1[0], 0, 4)-substr($start1[0], 0, 4);
	 
	function validateDate($date){
		$d = DateTime::createFromFormat('Y-m-d', $date);
		return $d && $d->format('Y-m-d') == $date;
	}
	function dateRange( $first, $last, $step = '+1 day', $format = 'Y-m-d' ) {
		$dates = array();
		$current = strtotime( $first );
		$last = strtotime( $last );

		while( $current <= $last ) {

			$dates[] = date( $format, $current );
			$current = strtotime( $step, $current );
		}
		return $dates;
	}
	
	// $a1=array("0"=>"date","1"=>"prec","2"=>"tmin","3"=>"tmax","4"=>"srad");
	// $a2=array("0"=>"date","1"=>"prec","2"=>"tmin","3"=>"tmax");
	// print_r($a2);
	// print_r(array_intersect($namescol, $colnames));
// Array ( [0] => date [1] => prec [2] => tmin [3] => tmax [4] => tmean ) 
// Array ( [0] => date [1] => prec [2] => tmin [3] => tmax ) 
// Array ( [0] => date [1] => prec [2] => tmin )
	
// $a1=array("0"=>"date","1"=>"prec","2"=>"tmin","3"=>"tmax","4"=>"tmean");
// $a2=array("0"=>"date","1"=>"prec","2"=>"tmin","3"=>"tmax");

// $result=array_intersect($a1,$a2);
// $result=array_intersect($namescol, $colnames);
// print_r('----');
// print_r(var_dump($colnames));
	
	
	if(count($colnames)<2 || count($colnames)>6){
		$code=1;$msg="There is an error in the number of columns";
	}elseif (count(array_intersect ($namescol, $colnames))!=count($colnames)){
		$code=2;$msg="The name columns are not correct (date  prec	tmin	tmax tmean srad)";
	}elseif (validateDate($end)!=1 || validateDate($start)!=1){
		$code=3;$msg="The date format is not correct (YYYYMMDD)";
	}elseif (substr($start1[0], 0, 4)>2004){
		$code=4;$msg="Must have data less of year 2004, because most of the GCMs (historical) have data until 2004.";
	}elseif ($diff!=$difh){
		$code=6;$msgy="Years interval should be equal in historical and future. ( Interv. Hist: ".$difh.", Interv. Fut: ".$diff.' )';
	}else{$code=0;$msg=null;$msgy=null;}
// elseif (count($myfile)-1!= count(dateRange( $start, $end))){
		// $code=5;$msg="There are missing data";
	// }
	$varlistsel=$colnames;
	$deldate=array_search('date', $varlistsel);
	unset($varlistsel[$deldate]);
	$variable=array();
	for ($i = 1; $i <= count($varlistsel); $i++) {
		if($varlistsel[$i]=="prec"){
			array_push($variable, 1);
		}elseif($varlistsel[$i]=="tmax"){
			array_push($variable, 2);
		}elseif($varlistsel[$i]=="tmean"){
			array_push($variable, 3);
		}elseif($varlistsel[$i]=="tmin"){
			array_push($variable, 4);
		}elseif($varlistsel[$i]=="srad"){
			array_push($variable, 5);
		}elseif($varlistsel[$i]=="swind"){
			array_push($variable, 6);
		}elseif($varlistsel[$i]=="hur"){
			array_push($variable, 7);
		}
	}
}


	

// exit();	
if (isset($_REQUEST["email"]) && $_REQUEST["email"] != "" && $_REQUEST["email"] == $_REQUEST["email_ver"]) {

  $vars = $_REQUEST;
  // print_r($vars );
  
  $query = "SELECT id, name, acronym FROM datasets_scenario_bias where id in (" . $_REQUEST["scenarios"] . ")";
  $scenarios = $db->getAll($query);
  $sceAcro = "";
  foreach ($scenarios as $sce) {
    $sceAcro .= $sce['acronym'] . ",";
  }

  $query = "SELECT id, name FROM datasets_observation_bias WHERE id =" . $_REQUEST["observation"];
  $observations = $db->getAll($query);
	
  // if($code==0){
    // $query = "SELECT id, name, acronym FROM datasets_variable_bias WHERE id in (" .implode(",", $variable) . ");";
  // $variables = $db->getAll($query);
// }else{
  $query = "SELECT id, name, acronym FROM datasets_variable_bias WHERE id in (" . $_REQUEST["variables"] . ");";

  $variables = $db->getAll($query);
  

  $varAcro = "";
  foreach ($variables as $var) {
	$varAcro .= $var['acronym'] . ",";
  }	


  
  // $query = "SELECT id, name FROM datasets_correction_method_bias WHERE id in (" . implode(",", $_REQUEST["methods"]) . ")";
  // $methods = $db->getAll($query);
  // $methodAcro = "";
  // foreach ($methods as $var) {
	// $methodAcro .= $var['name'] . ",";
  // }	
  
  $query = "SELECT * FROM datasets_fileset_bias df WHERE id = " . $_REQUEST["fileSet"];
  $fileSets = $db->getAll($query);

  // $query = "SELECT id, name FROM datasets_correction_method_bias WHERE id = " . $_REQUEST["method"];
  // $methods = $db->getAll($query);
  
  $query = "SELECT id, name, acronym FROM datasets_format_bias WHERE id in (" . $_REQUEST["formats"] . ")";
  $formats = $db->getAll($query);
  $formAcro = "";
  foreach ($formats as $form) {
	$formAcro .= $form['name'] . ",";
  }   
  
	$query = "SELECT id, name FROM datasets_correction_method_bias WHERE id in (" . $_REQUEST["methods"]. ")";
	$methods = $db->getAll($query);
	$methodAcro = "";
	foreach ($methods as $meth) {
	$methodAcro .= $meth['name'] . ",";
	}   
  
  $vars['scenarios-acronym'] = substr($sceAcro, 0, -1);
  // $vars['modelid'] = substr($modelid, 0, -1);

  

  $vars['variables-acronym'] = substr($varAcro, 0, -1);

  $vars['formats-name'] = substr($formAcro, 0, -1);

  $vars['fileSet-acronym'] = $fileSets[0]['name'];
  
   // $vars['method-acronym'] = $methods[0]['name'];
   $vars['method-acronym'] =substr($methodAcro, 0, -1);

	// ALTER SEQUENCE datasets_download_bias_id_seq RESTART WITH 1
   $register="INSERT INTO datasets_download_bias(lon, lat, models, scenarios, observation, periodh, periodf, variables, methods, formats,email)VALUES (".$vars['lon'].",".$vars['lat'].",'".$vars['model']."','".$vars['scenarios']."','".$vars['observation-acronym']."','".$vars['periodh']."','".$vars['period']."','".$vars['variables-acronym']."','".$vars['methods']."','".$vars['formats']."','".$vars['email']."');";
	$ret = $db->getAll($register);
   
   $getLastRegister="select id from datasets_download_bias order by id desc limit 1";
   $getID = $db->getAll($getLastRegister);
	$vars['order'] =$getID[0][0];
  $Date_Submitted=date("d-M-Y h:i:s");
  $vars["Date_Submitted"]=$Date_Submitted;
  
 // echo "<pre>".print_r($vars,true)."</pre>";
 // echo $vars;
//  $url = "http://172.22.52.62/correctedTest.php";
// exit();


  // $url = "http://gisweb.ciat.cgiar.org/Bc_Downscale/biasCorrected.php";
  //$url = "http://172.22.52.8/PHPMailer/bias_process.php";
 // $url = "http://maprooms.ciat.cgiar.org/CCAFS-Climate/PHPMailer/bias_process.php";
 $url = "http://backend.ccafs-climate.org/bias_correction.php";
  //$url = "http://172.22.52.8/PHPMailer/example.php";
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HEADER, false);
  curl_setopt($curl, CURLOPT_POST, count($vars));
  // curl_setopt($curl, CURLOPT_POSTFIELDS, $vars);
  curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($vars));
  curl_setopt($curl, CURLOPT_TIMEOUT, 4);
  $data = curl_exec($curl);
  curl_close($curl);
  
  $smarty->display("bias-corrected-requested.tpl");
} else {
  $query = "SELECT id, name, acronym FROM datasets_scenario_bias where id in (" . implode(",", $_REQUEST["scenarios"]) . ")";
  $scenarios = $db->getAll($query);
  $sceAcro = "";
  foreach ($scenarios as $sce) {
    $sceAcro .= $sce['acronym'] . ",";
  }

  $query = "SELECT id, name FROM datasets_observation_bias WHERE id =" . $_REQUEST["observation"];
  $observations = $db->getAll($query);
  if($code==0){
	$variables=implode(",", $variable);
	$query = "SELECT id, name, acronym FROM datasets_variable_bias WHERE id in (" .$variables. ")";
	$variablesq = $db->getAll($query);
	$varAcro = "";
	foreach ($variablesq as $var) {
		$varAcro .= $var['acronym'] . ",";
	}
  }else{
   $variables = isset($_REQUEST["variables"]) ? implode(",", $_REQUEST["variables"]) : null; 
  }
  $query = "SELECT * FROM datasets_fileset_bias df WHERE id = " . $_REQUEST["fileSet"];
  $fileSets = $db->getAll($query);

  // $query = "SELECT id, name FROM datasets_correction_method_bias WHERE id = " . $_REQUEST["method"];

	$query = "SELECT id, name FROM datasets_correction_method_bias WHERE id in (" . implode(",", $_REQUEST["methods"]) . ")";
	$methods = $db->getAll($query);
	$methodAcro = "";
	foreach ($methods as $meth) {
	$methodAcro .= $meth['name'] . ",";
	} 
  
  
  // $query = "SELECT id, name FROM datasets_correction_method_bias WHERE id in (" . implode(",", $_REQUEST["methods"]) . ")";
  // $methods = $db->getAll($query); 
  
  $query = "SELECT id, name, acronym FROM datasets_format_bias WHERE id in (" . implode(",", $_REQUEST["formats"]) . ")";
  $formats = $db->getAll($query);
  $formAcro = "";
  $formName = "";
  foreach ($formats as $form) {
    $formAcro .= $form['acronym'] . ",";
    $formName.= $form['name'] . ",";
  }

  $methods = isset($_REQUEST["methods"]) ? implode(",", $_REQUEST["methods"]) : null;

  $scenarios = isset($_REQUEST["scenarios"]) ? implode(",", $_REQUEST["scenarios"]) : null;
  $modelsall = isset($_REQUEST["model"]) ? $_REQUEST["model"] : null;
  $model = array();
	foreach ($modelsall as &$valor) {
		$valor = explode("-", $valor)[0];
		array_push($model, $valor);
	}  
  $models = isset($model) ? implode(",", $model) : null;
  $formats = isset($_REQUEST["formats"]) ? implode(",", $_REQUEST["formats"]) : null;
  $delimitator = isset($_REQUEST["delimit"]) ? $_REQUEST["delimit"] : '';

	$getLastRegister="select id from datasets_download_bias order by id desc limit 1";
	$getID = $db->getAll($getLastRegister);
	
  $smarty->assign("order", $getID[0][0]+1);
  $smarty->assign("error", $code);
  $smarty->assign("msg", $msg);
  $smarty->assign("msg_p", $msgy);  
  $smarty->assign("fileSets", $fileSet);
  $smarty->assign("fileSetsAcronym", $fileSets[0]['name']);
  $smarty->assign("scenarios", $scenarios);
  $smarty->assign("scenariosAcronym", substr($sceAcro, 0, -1));
  $smarty->assign("models", $models);
  $smarty->assign("observation", $observation);
  $smarty->assign("variables", $variables);
  if($namefile){  
	$smarty->assign("observationAcronym", "station");
	$smarty->assign("variablesAcronym", implode(",", $varlistsel));
	$smarty->assign("periodh", $periodst);
  }else{
    $smarty->assign("observationAcronym", $observations[0]['name']);
	if($code==0){
	 $smarty->assign("variablesAcronym", substr($varAcro, 0, -1));
	}else{$smarty->assign("variablesAcronym",null);}
	$smarty->assign("periodh", $periodh);
  }
  $smarty->assign("methods", $methods);
  // $smarty->assign("methodAcronym", $methods[0]['name']);
  $smarty->assign("methodAcronym", substr($methodAcro, 0, -1));
  $smarty->assign("formats", $formats);
  $smarty->assign("formatsAcronym", substr($formName, 0, -1));
  $smarty->assign("lat", $lat);
  $smarty->assign("lon", $lon);
  $smarty->assign("period", $period);
  
  $smarty->assign("file", $file);
  $smarty->assign("namefile", $namefile);
  $smarty->assign("delimitator", $delimitator);
  $smarty->display("bias-corrected-request.tpl");
}
