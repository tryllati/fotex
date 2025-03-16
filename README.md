# Homework 
Creating a basic rest api based on the desired parameters


## Install
To create the docker environment, issue the `make up` command in the root directory.
(The host files for nginx are available in the `./storage/conf/nginx/default.conf` file)

### Create a host file
Let's add the following redirects to our **hosts** file.

```
127.0.0.1 phpmyadmin.local # if needed
127.0.0.1 fotex.local
```

### Create a migration
o create the database tables, issue the `make migrate` command.

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

**Response:**

- **200 OK**
```json
{
  "projections": [
    {
      "id": 1,
      "date": "2025-12-23 21:00:00",
      "empty_place": 50,
      "movie_id": 1,
      "created_at": "2025-03-16T15:05:52.000000Z",
      "updated_at": "2025-03-16T15:05:52.000000Z"
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

**Request Parameters:**

| Parameter | Type  | Required | Description |
|-----------|------|----------|-------------|
| {field}   | mixed | Yes      | The new value for the specified field. |

**Response:**

- **204 No Content** (Successfully updated)

If the projection does not exist:
```json
null
```

---

### 4. Delete a projection

**Endpoint:**
```
DELETE /projection/delete/{id}
```

**Response:**

- **204 No Content** (Successfully deleted)

If the projection does not exist:
```json
null
```
