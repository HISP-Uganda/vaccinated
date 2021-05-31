<?php

namespace App\Controllers;



class Home extends BaseController
{
	public function index()
	{
		return view('home');
	}

	


	public function generate()
	{
		helper(['form']);
		$data = [
            'validation' => \config\services::validation()
        ];
		return view('forms/generate', $data);
	}

	private function getDataElement($events, $dataElement ){
		$result = array_filter($events, function ($var) use (&$dataElement) {
			return $var['dataElement'] == $dataElement;
		});

		$result = reset($result);
		// print_r($result);

		return (!empty($result)) ? $result['value'] : ''; 
	}

	public function retrieve() {
        // $session = \Config\Services::session();
        helper(['form', 'url', 'text', 'session']);
		$data = [
            'validation' => \config\services::validation()
        ];

		if ($this->request->getMethod() == 'post') {
			$rules = [
                'nin' => 'required'
			];
			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
                // print_r($data);
			}else{
				//Make requests to epivac
				$nin = $this->request->getVar('nin');
				$query = "https://epivac.health.go.ug/api/trackedEntityInstances.json?program=yDuAzyqYABS&programStage=A6TF629IhhR&ouMode=ALL&fields=*&filter=Ewi7FUfcHAD:EQ:".$nin;

				$client = \Config\Services::curlrequest();
				$response = $client->request('GET', $query, [
					'auth' => ['admin', 'District#9', 'basic'], 'verify' => false
				]);

				$tei = json_decode($response->getBody(), true); //String
				

				$attributes = $tei['trackedEntityInstances'][0]['attributes'];

				$message = "This is to certify that";

				// print_r($attributes);
				$display_attributes = [
					'sB1IHYu2xQT', //Client Name
				];

				$client_name = "";
				foreach($attributes as $attribute){
					// print_r($attributes[$attribute]);
					if(in_array($attribute['attribute'], $display_attributes)){
						$client_name = $attribute['value'];
					}
				}

				// echo $client_name;

				$message = $message." ".$client_name;

				$enrollments = $tei['trackedEntityInstances'][0]['enrollments'];

				$events = $enrollments[0]['events'];

				$program_stage = 'a1jCssI2LkW';

				$vaccinations = array_filter($events, function ($var){
					return $var['programStage'] == 'a1jCssI2LkW' && isset($var['eventDate']);
				});

				// print_r($vaccinations);

				$can_print = false;
				if(count($vaccinations) >= 1){
					$can_print = true;
					$orgUnit = $enrollments[0]['orgUnitName'];

					//Batch # Yp1F4txx8tm 
					//Manufacturer rpkH9ZPGJcX 
					//Vaccine bbnyNYD1wgS 
					//Dose LUIsbsm3okG 


					$dose1 = $vaccinations[0]['dataValues'];

					// print_r($dose1);

					$batch_number1 = $this->getDataElement($dose1, 'Yp1F4txx8tm' );
					$manufactuer1 = $this->getDataElement($dose1, 'bbnyNYD1wgS' );
					$vaccine1 = $this->getDataElement($dose1, 'bbnyNYD1wgS' );
					$dose1 = $this->getDataElement($dose1, 'LUIsbsm3okG' );


					$dose2 = $vaccinations[1]['dataValues'];
					// print_r($dose2);

					$batch_number2 = $this->getDataElement($dose2, 'Yp1F4txx8tm' );
					$manufactuer2 = $this->getDataElement($dose2, 'bbnyNYD1wgS' );
					$vaccine2 = $this->getDataElement($dose2, 'bbnyNYD1wgS' );
					$dose2 = $this->getDataElement($dose2, 'LUIsbsm3okG' );

					$vaccinated = [
						'dose1' => [
							'date'=>$vaccinations[0]['eventDate'],
							'batch'=>$batch_number1,
							'manufacturer'=>$manufactuer1,
							'vaccine'=>$vaccine1,
							'dose'=>$dose1,
							'orgUnit'=>$enrollments[0]['orgUnitName']
						],
						'dose2' => [
							'date'=>$vaccinations[1]['eventDate'],
							'batch'=>$batch_number2,
							'manufacturer'=>$manufactuer2,
							'vaccine'=>$vaccine2,
							'dose'=>$dose2,
							'orgUnit'=>$enrollments[0]['orgUnitName']
						]
					];
					
				}



				// $enrollments = $tei->trackedEntityInstances;

				// print_r($enrollments);

				//NO Records - Empty
				// No Enrollments
				// No Events
				// Only One Event
				// Many Events in Different stages
				// many Events in same stage

				$session = session();
                $session->setFlashdata('client', $client_name);
				$session->setFlashdata('nin', $nin);
				$session->setFlashdata('events', $events);
				$session->setFlashdata('vaccinations', $vaccinated);

                return redirect()->to('/public/certificate/printout');
			}

			return view('forms/generate', $data);
		}
	}

	public function certificate()
	{
		return view('certificate/printout');
	}
}
