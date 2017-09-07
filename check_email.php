<?php

	session_start();

	if (isset($_POST['submit'])) {

        if(isset($_POST['message'])){
            $original_message = $_POST['message'];
	
            $words_message=multiexplode(array(' ','.',',','(',')',']','[','{','}','@','/','\\','?','!',':','"',';','-','=','_','%','&','#','$','€',"\n","\t"),$original_message);
			$words=array_filter($words_message);

			$word_freq_count=array();
			for($x=0;$x<48;$x++){
				$word_freq_count[$x]=0;
			}

			foreach($words as $word){
				switch(mb_strtolower($word,'utf-8')){
					case 'make':
						$word_freq_count[0]++;
						break;
					case 'address':
						$word_freq_count[1]++;
						break;
					case 'all':
						$word_freq_count[2]++;
						break;
					case '3d':
						$word_freq_count[3]++;
						break;
					case 'our':
						$word_freq_count[4]++;
						break;
					case 'over':
						$word_freq_count[5]++;
						break;
					case 'remove':
						$word_freq_count[6]++;
						break;
					case 'internet':
						$word_freq_count[7]++;
						break;
					case 'order':
						$word_freq_count[8]++;
						break;
					case 'mail':
						$word_freq_count[9]++;
						break;
					case 'receive':
						$word_freq_count[10]++;
						break;
					case 'will':
						$word_freq_count[11]++;
						break;
					case 'people':
						$word_freq_count[12]++;
						break;
					case 'report':
						$word_freq_count[13]++;
						break;
					case 'addresses':
						$word_freq_count[14]++;
						break;
					case 'free':
						$word_freq_count[15]++;
						break;
					case 'business':
						$word_freq_count[16]++;
						break;
					case 'emial':
						$word_freq_count[17]++;
						break;
					case 'you':
						$word_freq_count[18]++;
						break;
					case 'credit':
						$word_freq_count[19]++;
						break;
					case 'your':
						$word_freq_count[20]++;
						break;
					case 'font':
						$word_freq_count[21]++;
						break;
					case '000':
						$word_freq_count[22]++;
						break;
					case 'money':
						$word_freq_count[23]++;
						break;
					case 'hp':
						$word_freq_count[24]++;
						break;
					case 'hpl':
						$word_freq_count[25]++;
						break;
					case 'george':
						$word_freq_count[26]++;
						break;
					case '650':
						$word_freq_count[27]++;
						break;
					case 'lab':
						$word_freq_count[28]++;
						break;
					case 'labs':
						$word_freq_count[29]++;
						break;
					case 'telnet':
						$word_freq_count[30]++;
						break;
					case '857':
						$word_freq_count[31]++;
						break;
					case 'data':
						$word_freq_count[32]++;
						break;
					case '415':
						$word_freq_count[33]++;
						break;
					case '85':
						$word_freq_count[34]++;
						break;
					case 'technology':
						$word_freq_count[35]++;
						break;
					case '1999':
						$word_freq_count[36]++;
						break;
					case 'parts':
						$word_freq_count[37]++;
						break;
					case 'pm':
						$word_freq_count[38]++;
						break;
					case 'direct':
						$word_freq_count[39]++;
						break;
					case 'cs':
						$word_freq_count[40]++;
						break;
					case 'meeting':
						$word_freq_count[41]++;
						break;
					case 'original':
						$word_freq_count[42]++;
						break;
					case 'project':
						$word_freq_count[43]++;
						break;
					case 're':
						$word_freq_count[44]++;
						break;
					case 'edu':
						$word_freq_count[45]++;
						break;
					case 'table':
						$word_freq_count[46]++;
						break;
					case 'conference':
						$word_freq_count[47]++;
						break;
				}

			}
			
			for($x=0;$x<48;$x++){
				if($word_freq_count[$x]!=0)
				$word_freq_count[$x]=100*$word_freq_count[$x]/count($words);
			}

			$char_freq_count=array();
			$char_freq_count[]=100*substr_count($original_message,';')/strlen($original_message);
			$char_freq_count[]=100*substr_count($original_message,'(')/strlen($original_message);
			$char_freq_count[]=100*substr_count($original_message,'[')/strlen($original_message);
			$char_freq_count[]=100*substr_count($original_message,'!')/strlen($original_message);
			$char_freq_count[]=100*substr_count($original_message,'$')/strlen($original_message);
			$char_freq_count[]=100*substr_count($original_message,'#')/strlen($original_message);
			
			$y=0;
			$new_upper_run=true;
			$upper_lengths=array();
			$upper_lengths[$y]=0;
			foreach($words as $word){
				if(mb_strtoupper($word,'utf-8')==$word){
					if($new_upper_run){
						$upper_lengths[$y]=0;
						$upper_lengths[$y]+=strlen($word);
						$new_upper_run=false;
					}
					else{
						$upper_lengths[$y]+=strlen($word);
					}
				}else{
					if(!$new_upper_run){
						$y++;
						$new_upper_run=true;
					}
				}
			}

			if($upper_lengths)
			$upper_length_average=array_sum($upper_lengths)/count($upper_lengths);
			$upper_length_longest=max($upper_lengths);
			$upper_length_total=array_sum($upper_lengths);
			

			$final_input = array();
			foreach($word_freq_count as $word_freq){
				array_push($final_input,$word_freq);
			}
			foreach($char_freq_count as $char_freq){
				array_push($final_input,$char_freq);
			}
		
			array_push($final_input,$upper_length_average);
			array_push($final_input,$upper_length_longest);
			array_push($final_input,$upper_length_total);
			array_push($final_input,null);


			$data = array(
				'Inputs'=> array(
					'input1'=> array(
						'ColumnNames' => array("Col1","Col2","Col3", "Col4","Col5","Col6","Col7","Col8","Col9","Col10","Col11","Col12","Col13","Col14","Col15","Col16","Col17","Col18","Col19","Col20","Col21","Col22","Col23","Col24","Col25","Col26","Col27","Col28","Col29","Col30","Col31","Col32","Col33","Col34","Col35","Col36","Col37","Col38","Col39","Col40","Col41","Col42","Col43","Col44","Col45","Col46","Col47","Col48","Col49","Col50","Col51","Col52","Col53","Col54","Col55","Col56","Col57","Col58"),
						'Values' => array($final_input)
				)),
				'GlobalParameters'=> null
			);
			
			$body = json_encode($data);
			
			$api_key = "/tmodGRbfXH7AuKcDScBAnfLCuaVw+2cVyiJRUWuy4EmPkMjgzTqS5gwRhfZ+1D2Pu0u2CdMBQPD3TBC6oY64g==";
			
			$url = "https://ussouthcentral.services.azureml.net/workspaces/447b4fe733c4426f99249ed06f93fa0a/services/6e6d3958ee084ecd922b640ce226b886/execute?api-version=2.0&details=true";
			
			$headers = array('Content-Type: application/json', 'Authorization:Bearer ' . $api_key, 'Content-Length: ' . strlen($body));
			
			$curl = curl_init($url); 
			
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLINFO_HEADER_OUT, true);
			curl_setopt_array($curl, array(
				CURLOPT_POST => TRUE,
				CURLOPT_RETURNTRANSFER => TRUE,
				CURLOPT_HTTPHEADER => array(
					'Authorization: Bearer '.$api_key,
					'Content-Length: '.strlen($body),
					'Content-Type: application/json',
					'Accept: application/json'
				)
			));
			curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
			
			$response = curl_exec($curl);
			
			$result = json_decode($response,true);
			
			if ($result == null) {
				echo "Problem with json";
			}
			$spam=(int)$result['Results']['output1']['value']['Values']['0']['58'];
			print_r($spam);
			if($spam==1){
				header("Location: ../spam.html");
			}
			else{
				header("Location: ../not-spam.html");
			}

    	}
	}


   function multiexplode ($delimiters,$string) {
    
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}
/*$word_freq_count[]=100*substr_count(strtolower($word),'make')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'address')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'all')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'3d')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'our')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'over')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'remove')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'internet')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'order')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'mail')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'receive')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'will')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'people')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'report')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'addresses')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'free')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'busuness')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'email')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'you')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'credit')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'your')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'font')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'000')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'money')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'hp')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'hpl')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'george')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'650')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'lab')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'labs')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'telnet')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'857')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'data')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'415')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'85')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'technology')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'1999')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'parts')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'pm')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'direct')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'cs')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'meeting')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'original')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'project')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'re')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'edu')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'table')/count($words);
				$word_freq_count[]=100*substr_count(strtolower($word),'conference')/count($words);*/

	
?>