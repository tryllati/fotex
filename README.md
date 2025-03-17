# Homework 
Creating a basic rest api based on the desired parameters


## Install
To create the docker environment, issue the `make up` command in the root directory.
(The host files for nginx are available in the `./storage/conf/nginx/default.conf` file)

### Create a host file
Let's add the following redirects to **hosts** file.

```
127.0.0.1 phpmyadmin.local # if needed
127.0.0.1 fotex.local
```

### Create migration
To create the database tables, issue the `make migrate` command.

### Create test data
To create the test data, issue the `make seed` command.


# REST API Documentation
### Base URL
```
http://fotex.local/api
```

---

## Movie

### 1. Get All Movies
**Endpoint:**
```
GET /movies
```
**Description:**
Returns a list of all available movies.

**Response:**
```json
{
  "movies": [
    {
      "id": 1,
      "name": "Inception",
      "description": "A mind-bending thriller.",
      "age_limit": 13,
      "language": "English",
      "cover_image": "inception.jpg",
      "created_at": "2025-03-16T14:27:28.000000Z",
      "updated_at": "2025-03-16T14:27:28.000000Z"
    }
  ]
}
```

---

### 2. Create a Movie
**Endpoint:**
```
POST /movies/create
```
**Description:**
Creates a new movie entry.

**Request Body:**

| Parameter    | Type   | Required | Description                        | Example         |
|-------------|--------|----------|------------------------------------|-----------------|
| name        | string | Yes      | The name of the movie             | "Inception"     |
| description | string | Yes      | The description of the movie      | "A thriller"    |
| age_limit   | int    | Yes      | The age limit for the movie       | 13              |
| language    | string | Yes      | The language of the movie         | "English"       |
| cover_image | file   | Yes      | The cover image file              | (upload file)   |



**Response:**
```json
{
  "message": "Movie created successfully",
  "movie": {
    "id": 1,
    "name": "Inception",
    "description": "A mind-bending thriller.",
    "age_limit": 13,
    "language": "English",
    "cover_image": "inception.jpg"
  }
}
```

---

### 3. Update a Specific Field of a Movie
**Endpoint:**
```
POST /movies/update/{id}/field/{field}
```
**Description:**
Updates a specific field of a movie by its ID.

**Request Parameters:**

| Parameter | Type   | Required | Description                   | Example          |
|-----------|--------|----------|-------------------------------|------------------|
| id        | int    | Yes      | The ID of the movie           | 1                |
| field     | string | Yes      | The field to be updated       | "name"           |
| value     | mixed  | Yes      | The new value for the field   | "New Movie Name" |

**Response:**
```
204 No Content
```

---

### 4. Delete a Movie
**Endpoint:**
```
DELETE /movies/delete/{id}
```
**Description:**
Deletes a movie by its ID.

**Request Parameters:**

| Parameter | Type | Required | Description           | Example |
|-----------|------|----------|-----------------------|---------|
| id        | int  | Yes      | The ID of the movie  | 1       |

**Response:**
```
204 No Content
```

---

## Projection

### 1. Retrieve all projections

**Endpoint:**
```
GET /projections
```

**Description:**
Returns a list of all available movies.

**Response:**

- **200 OK**
```json
{
  "projections": [
    {
      "id": 1,
      "date": "2025-12-23 21:00:00",
      "empty_place": 50,
      "movie_id": 2,
      "created_at": "2025-03-16T15:05:52.000000Z",
      "updated_at": "2025-03-16T15:05:52.000000Z",
      "movie": {
        "id": 2,
        "name": "Captain America: Brave New World",
        "description": "Some time after the events of The Falcon and the Winter Soldier, Sam Wilson has now fully embraced his title as the new Captain America. Now Sam is summoned to the White House as the new president Ross wants to work with him on rebuilding the Avengers. But trouble ensues when Sam's friend Isaiah Bradley uncontrollably tries to assassinate the president and is framed for the attempt.",
        "age_limit": 16,
        "language": "angol",
        "cover_image": "captainamericabravenewworld.jpeg",
        "created_at": "2025-03-17T17:16:59.000000Z",
        "updated_at": "2025-03-17T17:16:59.000000Z"
      }  
    }
  ]
}
```

If no projections are found:
```json
{
  "projection": []
}
```

---

### 2. Create a new projection

**Endpoint:**
```
POST /projection/create
```

**Description:**
Create a new projection

**Request Parameters:**

| Parameter   | Type    | Required | Description |
|------------|---------|----------|-------------|
| date       | string  | Yes      | The date and time of the projection in `Y-m-d H:i:s` format. Example: `2025-12-23 21:00:00` |
| empty_place | integer | Yes      | The number of available seats. Example: `50` |
| movie_id   | integer | Yes      | The ID of the related movie. Example: `1` |

**Response:**

- **201 Created**
```json
{
  "message": "Projection created successfully",
  "projection": {
    "id": 1,
    "date": "2025-12-23 21:00:00",
    "empty_place": 50,
    "movie_id": 1
  }
}
```

- **422 Unprocessable Entity** (Validation errors)
```json
{
  "date": ["The date field is required."],
  "empty_place": ["The empty place field is required."],
  "movie_id": ["The selected movie_id is invalid."]
}
```

---

### 3. Update a specific field of a projection

**Endpoint:**
```
POST /projection/update/{id}/field/{field}
```
**Description:**
Updates a specific field of a projection by its ID.

**Request Parameters:**

| Parameter | Type  | Required | Description | Example       |
|-----------|------|----------|-------------|---------------|
| id        | int    | Yes      | The ID of the projection           | 1             |
| field     | string | Yes      | The field to be updated       | "empty_place" |
| {field}   | mixed | Yes      | The new value for the specified field. | 12            |

**Response:**
```
204 No Content
```

---

### 4. Delete a projection
**Endpoint:**
```
DELETE /projection/delete/{id}
```
**Description:**
Deletes a projection by its ID.

**Request Parameters:**

| Parameter | Type | Required | Description           | Example |
|-----------|------|----------|-----------------------|---------|
| id        | int  | Yes      | The ID of the projection  | 1       |

**Response:**
```
204 No Content
```


