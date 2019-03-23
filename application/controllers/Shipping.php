<?php
/**
 * 
 */
class Shipping extends CI_Controller
{
	private $api_key = '0df6d5bf733214af6c6644eb8717c92c';
	
	public function index(){
		$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/province/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: $this->api_key"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
	return json_decode($response);
}
}

public function get_city($province_id){
    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$province_id",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: $this->api_key"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  return json_decode($response);
}
}

public function get_city_by_province($province_id){
      $city = $this->get_city($province_id);
      $output = '<option value="">- Kota -</option>';
 
      foreach ($city->rajaongkir->results as $cty) {
        $output .='<option value="'.$cty->city_id.'">'.$cty->city_name.'</option>';
      }
 
      echo $output;
    }

public function cek(){
  $data['asal'] = $this->input->post('origin_province');
  $this->load->view('v_tujuan',$data);
}
public function tampil(){
	$data['province'] = $this->index();
	$this->load->view('v_project',$data);
		}
}