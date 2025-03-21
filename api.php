<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('X-Alien-Defense-Shield: Active');

function getRandomPastTimestamp() {
    $now = time();
    $oneWeekAgo = $now - (7 * 24 * 60 * 60);
    return rand($oneWeekAgo, $now);
}

function getRandomLocation() {
    $locations = [
        'Area 51, Nevada',
        'Pentagon, Washington DC',
        'SETI Institute, California',
        'NASA Headquarters',
        'United Nations Space Command',
        'Global Defense Initiative HQ',
        'International Space Station',
        'Cheyenne Mountain Complex',
        'My Mom\'s Basement',
        'Mars Colony',
    ];
    return $locations[array_rand($locations)];
}

// Default response data
$response = [
    'invaded' => false,
    'message' => 'Nope, Earth is safe',
    'last_checked' => date('Y-m-d H:i:s', getRandomPastTimestamp()),
    'monitoring_station' => getRandomLocation(),
    'status' => 'safe',
    'defense_systems' => [
        'orbital_satellites' => 'online',
        'early_warning_radar' => 'active',
        'global_comms' => 'operational'
    ],
    'threat_level' => 'minimal',
    'ufo_sightings_24h' => 0,
    'metadata' => [
        'api_version' => '1.2.1',
        'ping' => rand(1,100) . 'nanoseconds',
        'uptime' => '13.7 billion years'
    ]
];

// Simulation scenarios
if (isset($_GET['simulate'])) {
    switch ($_GET['simulate']) {
        case 'invasion':
            $response['invaded'] = true;
            $response['message'] = 'ALERT! Alien invasion in progress!';
            $response['status'] = 'danger';
            $response['confidence_level'] = '1000%';
            $response['last_checked'] = date('Y-m-d H:i:s');
            $response['threat_level'] = 'EXTREME';
            $response['defense_systems']['orbital_satellites'] = 'compromised';
            $response['defense_systems']['early_warning_radar'] = 'jammed';
            $response['defense_systems']['global_comms'] = 'failing';
            $response['invasion_hotspots'] = ['New York', 'Tokyo', 'London', 'Moscow', 'Sydney'];
            $response['estimated_survival_chance'] = rand(1, 20) . '%';
            break;
            
        case 'scout':
            $response['invaded'] = false;
            $response['message'] = 'WARNING: Alien scout ships detected in orbit';
            $response['status'] = 'warning';
            $response['threat_level'] = 'elevated';
            $response['defense_systems']['early_warning_radar'] = 'detecting anomalies';
            $response['ufo_sightings_24h'] = rand(10, 30);
            $response['scout_activity'] = [
                'first_detected' => date('Y-m-d H:i:s', time() - rand(1, 24) * 3600),
                'ship_count' => rand(1, 5),
                'behavior' => 'observational'
            ];
            break;
            
        case 'mothership':
            $response['invaded'] = false;
            $response['message'] = 'CRITICAL ALERT: Alien mothership detected approaching Earth!';
            $response['status'] = 'critical';
            $response['threat_level'] = 'severe';
            $response['confidence_level'] = '99.9%';
            $response['estimated_arrival'] = date('Y-m-d H:i:s', time() + rand(12, 48) * 3600);
            $response['mothership_details'] = [
                'size' => rand(50, 200) . ' km diameter',
                'distance' => rand(100000, 500000) . ' km',
                'velocity' => rand(10000, 50000) . ' km/h',
                'energy_signature' => 'unprecedented'
            ];
            break;
    }
}

// Response format options
$format = isset($_GET['format']) ? $_GET['format'] : 'json';

switch ($format) {
    case 'text':
        header('Content-Type: text/plain');
        if ($response['invaded']) {
            echo "YES, ALIENS ARE HERE! RUN!";
        } else if (isset($response['threat_level']) && in_array($response['threat_level'], ['elevated', 'severe'])) {
            echo "NO INVASION YET, BUT STAY ALERT!";
        } else {
            echo "NOPE. EARTH IS SAFE.";
        }
        break;
        
    case 'html':
        header('Content-Type: text/html');
        $color = $response['invaded'] ? 'red' : ($response['threat_level'] == 'severe' ? 'orange' : ($response['threat_level'] == 'elevated' ? 'yellow' : 'green'));
        $message = $response['invaded'] ? 'YES! INVASION IN PROGRESS!' : $response['message'];
        $emoji = $response['invaded'] ? '👽' : ($response['threat_level'] == 'severe' ? '🚨' : ($response['threat_level'] == 'elevated' ? '⚠️' : '✅'));
        
        echo "<!DOCTYPE html><html lang='en'><head><title>Alien Invasion Status</title>";
        echo "<meta charset='UTF-8'><meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<style>";
        echo "body { background-color: {$color}; color: white; text-align: center; font-family: 'Arial', sans-serif; margin: 0; padding: 0; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 100vh; }";
        echo "h1 { font-size: 4rem; margin: 2rem 0; text-shadow: 2px 2px 5px rgba(0,0,0,0.5); }";
        echo ".emoji { font-size: 8rem; margin: 1rem 0; }";
        echo ".status-card { background-color: rgba(0,0,0,0.6); border-radius: 15px; padding: 2rem; width: 80%; max-width: 800px; box-shadow: 0 5px 15px rgba(0,0,0,0.3); }";
        echo ".data-item { margin: 1rem 0; font-size: 1.2rem; }";
        echo ".defense { display: flex; justify-content: space-around; flex-wrap: wrap; margin: 1.5rem 0; }";
        echo ".defense-item { background-color: rgba(0,0,0,0.3); padding: 1rem; border-radius: 10px; margin: 0.5rem; flex: 1 1 200px; }";
        echo "footer { margin-top: 2rem; color: rgba(255,255,255,0.7); font-size: 0.9rem; }";
        echo "</style></head>";
        echo "<body>";
        echo "<div class='emoji'>{$emoji}</div>";
        echo "<h1>{$message}</h1>";
        echo "<div class='status-card'>";
        echo "<div class='data-item'>Last checked: <strong>{$response['last_checked']}</strong></div>";
        echo "<div class='data-item'>Threat level: <strong>{$response['threat_level']}</strong></div>";
        echo "<div class='data-item'>Monitoring station: <strong>{$response['monitoring_station']}</strong></div>";
        
        echo "<div class='defense'>";
        foreach ($response['defense_systems'] as $system => $status) {
            $statusColor = ($status == 'online' || $status == 'active' || $status == 'operational') ? 'green' : 'red';
            echo "<div class='defense-item'>";
            echo "<div>".ucwords(str_replace('_', ' ', $system))."</div>";
            echo "<div style='color:{$statusColor}'>{$status}</div>";
            echo "</div>";
        }
        echo "</div>";
        
        if (isset($response['mothership_details'])) {
            echo "<div style='margin-top:1.5rem;'><strong>⚠️ MOTHERSHIP ALERT ⚠️</strong></div>";
            echo "<div>Size: {$response['mothership_details']['size']}</div>";
            echo "<div>Distance: {$response['mothership_details']['distance']}</div>";
            echo "<div>Estimated arrival: {$response['estimated_arrival']}</div>";
        }
        
        if (isset($response['invasion_hotspots'])) {
            echo "<div style='margin-top:1.5rem;'><strong>⚠️ INVASION HOTSPOTS ⚠️</strong></div>";
            echo "<div>" . implode(", ", $response['invasion_hotspots']) . "</div>";
        }
        
        echo "</div>";
        echo "<footer>API version {$response['metadata']['api_version']} | Refresh rate: {$response['metadata']['ping']} | Uptime: {$response['metadata']['uptime']}</footer>";
        echo "</body></html>";
        break;
    
    default:
        echo json_encode($response, JSON_PRETTY_PRINT);
}
?>