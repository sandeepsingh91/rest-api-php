# PHP REST API

This repository contains a simple PHP REST API implementation using `Rest.php`, along with a sample `api.php` file that demonstrates basic CRUD operations. The API allows users to perform login functionality as an example, with extensibility for additional endpoints.

## Table of Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Endpoints](#endpoints)
- [Contributing](#contributing)
- [License](#license)

## Features

- **RESTful Handling**: Utilizes `Rest.php` for managing HTTP methods (GET, POST, PUT, DELETE).
- **Database Connectivity**: Connects to a MySQL database for storing and retrieving data (adjust credentials in `api.php`).
- **Login Example**: Includes a sample login endpoint (`api.php`) demonstrating POST method handling and basic authentication.
- **JSON Responses**: Outputs responses in JSON format for interoperability.

## Requirements

To run this project, ensure you have the following installed:

- PHP (version 7.3 or higher)
- MySQL server (for database operations)
- `Rest.php` (included in this repository)

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/sandeepsingh91/rest-api-php.git
   ```
2. Navigate into the project directory:

   ```bash
   cd rest-api-php
   ```
3. Update database credentials in api.php:

   ```php
   const DB_SERVER = "127.0.0.1";
   const DB_USER = "your_db_username";
   const DB_PASSWORD = "your_db_password";
   const DB = "your_database_name";
   ```
4. Start your local PHP server:
   ```bash
   php -S localhost:8000
   ```
   
## Usage

1. Access the API endpoints defined in `api.php` using a REST client or curl commands.

2. Example usage:
   
   - **POST /login**: Authenticate a user by sending a POST request with `username` and `password` parameters.

     ```bash
     curl -X POST -d "username=admin&password=admin123" http://localhost:8000/api.php/login
     ```

   - Replace `localhost:8000` with your server address and port.

  
## Endpoints

- **POST /login**: Authenticate a user with username and password.
  - **Request**: `POST /api.php/login`
  - **Parameters**: `username`, `password`
  - **Example**:
    ```bash
    curl -X POST -d "username=admin&password=admin123" http://localhost:8000/api.php/login
    ```
    Replace `localhost:8000` with your server address and port.

## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvements, please follow these steps:

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/your-feature`)
3. Commit your changes (`git commit -am 'Add some feature'`)
4. Push to the branch (`git push origin feature/your-feature`)
5. Create a new Pull Request

Please ensure your code follows the project's coding standards and is well-documented.

## License

This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).
