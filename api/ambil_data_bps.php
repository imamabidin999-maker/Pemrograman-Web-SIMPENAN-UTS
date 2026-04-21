<?php
header('Content-Type: application/json');

$url = "https://webapi.bps.go.id/v1/api/list/model/data/lang/ind/domain/3300/var/792/th/118/key/17669e2bd304ef3678c4e560a5f3170d";

$response = file_get_contents($url);

if ($response === FALSE) {
    echo json_encode(["error" => "Gagal mengambil data dari BPS"]);
    exit;
}

echo $response;
?>