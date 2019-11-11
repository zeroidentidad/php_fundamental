<?php
require_once './vendor/autoload.php';

$cliente = new nusoap_client("http://wsf.cdyne.com/WeatherWS/Weather.asmx?wsdl", 'wsdl');

$resultado = $cliente->call("GetCityForecastByZIP", array("ZIP" => "90210"));

$ciudad = $resultado["GetCityForecastByZIPResult"]['City'];
$estado = $resultado["GetCityForecastByZIPResult"]['State'];

echo "<h1>Pronostico del tiempo ($ciudad, $estado)</h1>";

$pronosticos = $resultado["GetCityForecastByZIPResult"]['ForecastResult']['Forecast'];

foreach ($pronosticos as $diaPronostico) {
    $fecha = $diaPronostico['Date'];
    $descripcion = $diaPronostico['Description'];

    $minima = $diaPronostico['Temperatures']['MorningLow'];
    $maxima = $diaPronostico['Temperatures']['DaytimeHigh'];

    $fechaAjuste = strtotime($fecha);

    echo '<p>'.date('d/m/Y',$fechaAjuste).'</p><br>';
    echo '<p>'.$descripcion.'</p><br>';
    echo '<p>'.$maxima.'</p><br>';

    if (!empty($minima)) {
        echo '<p>'.$minima.' °F</p><br>';
    }
}

?>