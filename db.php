<?php
$client = new MongoDB\Driver\Manager("mongodb://localhost:27017");
//variable name = table name
$database = 'Tables';
$regions = 'regions';
$cruise_line = 'cruise_lines';
$all_departure_ports = 'all_departure_ports';
// $cruise_ship = 'cruise_ships';
$total_night = 'number_of_nights';
$placeVisit = 'places_to_visit';
$TopCruiseLine = 'TopCruiseLine';
$popularCruiseDest = 'popularCruiseDest';
$bestDepartPorts = 'bestDepartPorts';
$findbestcruise = 'findbestcruise';
$cruiselineData = 'cruiselineData';

$query = new MongoDB\Driver\Query([]);

$regions_a = $client->executeQuery("$database.$regions", $query);
$cruise_a = $client->executeQuery("$database.$cruise_line", $query);
$all_departure_ports_a = $client->executeQuery("$database.$all_departure_ports", $query);
// $cruiseShip_a = $client->executeQuery("$database.$cruise_ship", $query);
$totalNight_a = $client->executeQuery("$database.$total_night", $query);
$visitPlace_a = $client->executeQuery("$database.$placeVisit", $query);
$TopCruiseLine_a = $client->executeQuery("$database.$TopCruiseLine", $query);
$popularCruiseDest_a = $client->executeQuery("$database.$popularCruiseDest", $query);
$bestDepartPorts_a = $client->executeQuery("$database.$bestDepartPorts", $query);
$findbestcruise_a = $client->executeQuery("$database.$findbestcruise", $query);
$cruiselineData_a = $client->executeQuery("$database.$cruiselineData", $query)->toArray();


$results = [];
foreach ($regions_a as $document) {
    $results['region'] = $document;
}
foreach ($cruise_a as $document) {
    $results['cruise'] = $document;
}
foreach ($all_departure_ports_a as $document) {
    $results['departure_ports'] = $document;
}
// foreach ($cruiseShip_a as $document) {
//     $results['cruiseShip'] = $document;
// }

$cruiselinenames = [];
$results['cruiseshipLineData'] = [];
// var_dump($cruiselineData_a);
$results['cruiseshipLineData'] = $cruiselineData_a;
// foreach($results['cruiseshipLineData'] as $cruiseshipLineData){
//     var_dump($cruiseshipLineData);
//     $results['cruiseshipLineData'] = $cruiseshipLineData->cruisename;
// }
// var_dump($results['cruiseshipLineData']);
foreach ($totalNight_a as $document) {
    $results['TotalNights'] = $document;
}
foreach ($visitPlace_a as $document) {
    $results['visitPlace'] = $document;
}
// foreach($TopCruiseLine_a as $document){
$results['cruiseLine'] = $TopCruiseLine_a->toArray();
$results['popularCruiseLine'] = $popularCruiseDest_a->toArray();
$results['bestDepartPortsLine'] = $bestDepartPorts_a->toArray();
$results['findbest'] = $findbestcruise_a->toArray();
// }



$regionsData = $results['region']->region;
$cruiseData = $results['cruise']->cruiselines;
$departurePorts = $results['departure_ports']->alldepartureports;
// $cruiseShipData = $results['cruiseShip']->cruiseships;
$nightsData = $results['TotalNights']->numberofnights;
$visitPlaceData = $results['visitPlace']->placestovisit;
$topcruiseData = isset($results['cruiseLine']->topcruiseline);
// $popularCruiseData = isset($results['popularCruiseLine']->popularcruise);
// $bestDepartPortsData = isset($results['bestDepartPortsLine']->bestDepartsports);
// var_dump($bestDepartPortsData)
?>