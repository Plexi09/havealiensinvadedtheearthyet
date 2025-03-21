# Have Aliens Invaded Earth Yet ?

## Overview

The HAIEY (Have Aliens Invaded Earth Yet) API provides real-time monitoring of Earth's extraterrestrial threat levels. It delivers JSON, plain text, or HTML responses.

## Base URL

```plaintext
https://havealiensinvadedearthyet.com
```

## Endpoints

### Check Earth Status

```plaintext
GET /api
```

#### Parameters

| Parameter | Type   | Description |
|-----------|--------|-------------|
| `format`  | string | Response format: `json` (default), `text`, or `html` |
| `simulate` | string | Simulate a scenario: `invasion`, `scout`, or `mothership` |

#### Example Request

```plaintext
GET /api?format=json
```

#### Example Response (JSON)

```json
{
  "invaded": false,
  "message": "Nope, Earth is safe",
  "last_checked": "2025-03-21 12:34:56",
  "monitoring_station": "Area 51, Nevada",
  "status": "safe",
  "defense_systems": {
    "orbital_satellites": "online",
    "early_warning_radar": "active",
    "global_comms": "operational"
  },
  "threat_level": "minimal",
  "ufo_sightings_24h": 0,
  "metadata": {
    "api_version": "1.2.1",
    "ping": "42 nanoseconds",
    "uptime": "13.7 billion years"
  }
}
```

## Simulation Modes

You can simulate different scenarios by using the `simulate` parameter.

### Invasion

```plaintext
GET /api?simulate=invasion
```

- Returns an active invasion alert with threat details and survival chances.

### Scout Ships Detected

```plaintext
GET /api?simulate=scout
```

- Reports alien scout activity and ship count.

### Mothership Approaching

```plaintext
GET /api?simulate=mothership
```

- Warns of an incoming alien mothership with estimated arrival time.

## Response Formats

### JSON (Default)

```plaintext
GET /api?format=json
```

- Returns structured JSON data.

### Plain Text

```plaintext
GET /api?format=text
```

- Returns a short message like `NOPE. EARTH IS SAFE.`

### HTML (For Web UI)

```plaintext
GET /api?format=html
```

- Returns a styled HTML response with visual indicators. More graphicaly advanced than the index page.

## Headers

| Header | Description |
|--------|-------------|
| `Content-Type` | `application/json`, `text/plain`, or `text/html` |
| `Access-Control-Allow-Origin` | `*` (CORS enabled) |
| `X-Alien-Defense-Shield` | Always `Active` |

## License

This API is provided as-is, with no guarantees of actual alien invasions.
