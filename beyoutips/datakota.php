<?php
$pilih_id_provinsi = $_POST["id_provinsi"];
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" . $pilih_id_provinsi,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "key: a10a99f1cda197847bad814ef6aca82b"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $array_response = json_decode($response, true);
    $data_kota = $array_response["rajaongkir"]["results"];
    echo "<option value=''>--Pilih Kota / Kabupaten--</option>";
    foreach ($data_kota as $key => $kota) {
        echo "<option value='' 
        id_kota='" . $kota["city_id"] . "'
        nama_provinsi='" . $kota["province"] . "'
        nama_kota='" . $kota["city_name"] . "' 
        tipe='" . $kota["type"] . "'
        kodepos='" . $kota["postal_code"] . "' >";
        echo $kota["type"] . " ";
        echo $kota["city_name"];
        echo "</option>";
    }
}
