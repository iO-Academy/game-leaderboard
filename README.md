# API Docs

### Get Leaderboard scores

HTTP Verb: **GET**
URL: `/scores`
Query Params: `game` - a string of the game to retrieve scores for

#### Request example
`/scores?game=pairs`

#### Responses

**Success:**
```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "game": "pairs",
            "name": "Mike",
            "score": "100",
            "created": "2023-10-11 14:56:54"
        }
    ],
    "message": "Data found."
}
```

**Failures:**

Invalid `game` string:
```json
{
    "success": false,
    "data": [],
    "message": "No data found for game: does not exist"
}
```

Missing `game` param:
```json
{
  "success": false,
  "data": [],
  "message": "Invalid request data"
}
```

Error:
```json
{
    "success": false,
    "data": [],
    "message": "Unexpected Error Occurred"
}
```

### Store new score

HTTP Verb: **POST**
URL: `/score`
JSON Body data (all properties required):
```json
{
    "game": "string",
    "name": "string",
    "score": 100
}
```

#### Request example
`/score`

#### Responses

**Success:**
```json
{
  "success": true,
  "message": "Score stored"
}
```

**Failures:**

Cannot store score (for unknown reason):
```json
{
  "success": false,
  "message": "Unable to store score"
}
```

Invalid `POST` data:
```json
{
  "success": false,
  "message": "Invalid post data"
}
```

Error:
```json
{
    "success": false,
    "message": "Unexpected Error Occurred"
}
```