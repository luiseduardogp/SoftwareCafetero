<?php
$url = 'https://api.openweathermap.org/data/2.5/weather?q=Santa%20Marta,CO&appid=deb331c4352c2f77059e313c3b4ee450';

// Realiza la solicitud a la API y obtén la respuesta
$response = file_get_contents($url);

// Convierte la respuesta JSON en un objeto PHP
$data = json_decode($response);

// ...
// Accede a los datos del clima
$temperatura_kelvin = $data->main->temp;
$temperatura_minima = ($data->main->temp_min)-273.15;
$temperatura_maxima = ($data->main->temp_max)-273.15;
$descripcion = $data->weather[0]->description;
$humedad = $data->main->humidity;

// Convierte la temperatura de Kelvin a Celsius
$temperatura_celsius = $temperatura_kelvin - 273.15;

// Puedes imprimir los datos del clima
echo "Temperatura: " . $temperatura_celsius . "°C" . PHP_EOL ."<br>"; 
echo "Temperatura Minima: " . $temperatura_minima . "°C" . PHP_EOL ."<br>"; 
echo "Temperatura Maxima: " . $temperatura_maxima . "°C" . PHP_EOL ."<br>"; 
echo "Clima Actual: " . $descripcion . PHP_EOL ."<br>"; 
echo "Humedad: " . $humedad . "%" . PHP_EOL ."<br>"; 
// ...




?>
