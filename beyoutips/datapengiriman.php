<?php
$ekspedisi = $_POST["ekspedisi"];
$destinasi = $_POST["kota"];
$berat = $_POST["berat"];
$curl = curl_init();


curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "origin=256&destination=" . $destinasi . "&weight=" . $berat . "&courier=" . $ekspedisi,
    CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
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
    $data_paket = $array_response["rajaongkir"]["results"]["0"]["costs"];
    echo $data_paket;
    echo "<option value=''>--Pilih Opsi Pengiriman--</option>";
    foreach ($data_paket as $key => $paket) {
        echo "<option 
        paket='" . $paket["service"] . "'
        ongkir='" . $paket["cost"]["0"]["value"] . "'
        etd='" . $paket["cost"]["0"]["etd"] . "'>";
        echo $paket["service"] . " ";
        echo number_format($paket["cost"]["0"]["value"]) . " ";
        echo $paket["cost"]["0"]["etd"] . " Hari";
        echo "</option>";
    }
}
// CURLOPT_POSTFIELDS => "origin=256&destination=" . $destinasi . "&weight=" . $berat . "&courier=" . $ekspedisi,
// a10a99f1cda197847bad814ef6aca82b