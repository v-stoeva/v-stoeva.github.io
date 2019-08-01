<?php
//$alert[error,success,info]
function show_alerts($alert=array()){
	$html='';
	if(isset($alert['error']) and strlen($alert['error'])>0){
		$html .= '<div class="alert alert-danger">'.$alert['error'].'</div>';
  unset($alert['error']);
	}
	if(isset($alert['success']) and strlen($alert['success'])>0){
		$html .= '<div class="alert alert-success">'.$alert['success'].'</div>';
  unset($alert['success']);
	}
	if(isset($alert['info']) and strlen($alert['info'])>0){
		$html .= '<div class="alert alert-info">'.$alert['info'].'</div>';
  unset($alert['info']);
	}
	echo $html;
}
?>