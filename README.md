# CV With Rest API - The API

## Description
The API is created using Laravel and is a my resume. It contains information about the courses I've read, jobs I've had and webistes I've made.

## Endpoints

The public endpoints are;
|  Method | URL | Description |
| --- | --- |---|
|GET|/courses|Get all courses|
|GET|/courses/{id}| Get single course by id|
|GET|/jobs|Get all jobs|
|GET|/jobs/{id}|Get single course by id|
|GET|/websites|Get all websites|
|GET|/websites/{id}|Get single website by id|

The private endpoints, that require authentication, are;
|  Method | URL | Description |
| --- | --- |---|
|POST | /courses| Add a course|
|DELETE| /courses/{id}|Delete course by id|
|PUT|/courses/{id}|Update course by id|
|POST|/logout|Logout & destroy the token|

The private endpoints also has the same functionality for jobs and websites.

## Other
- ~~Live version: https://ojaskivi.se/cv/~~
- ~~API URL: https://ojaskivi.se/cv/public/api/~~
- Github repo for the client: https://github.com/toskivi/rest_cv_client

This project was a school assignment when working towards my WebDev degree @MIUN, Sweden
