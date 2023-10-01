# Note-WebApp
A PHP-based web app for effortless note-taking, with robust organization features and multi-device sync. Enhanced productivity with advanced search and tagging.

## Prerequisites

Before you can run the Notes Web App locally, ensure that your computer meets the following requirements:

- Node.js: [Download and install Node.js](https://nodejs.org/).
- PHP: [Download and install the latest version of PHP](https://www.php.net/downloads.php).
- Database software (e.g., phpMyAdmin, TablePlus) for hosting the database.

## Installation

1. Clone this repository to your local machine:

   ```bash
   git clone https://github.com/WarpDrive2036/Note-WebApp

 1. Navigate to the project directory:
    cd notes-web-app
2. Check the configuration file located at config/config.php. Ensure that it contains the following database settings:
'host' => 'localhost',
'port' => 3306,
'dbname' => 'myapp',
'charset' => 'utf8mb4',
// Add username and password if necessary
'username' => 'your_db_username',
'password' => 'your_db_password',

Update the configuration file with the appropriate values for your local database setup.

Locate the myapp.sql file in the root folder directory of the program.

Use specialized database software like phpMyAdmin or TablePlus to create a new database (e.g., notesdb) and import the notesdb.sql file into it.

Usage
To run the Notes Web App locally, follow these steps:

1. Open a terminal or command prompt.

2. Navigate to the project directory:
  cd notes-web-app

3. Start a local web server to serve the project:
  php -S localhost:8888 -t public
  
4. Open your web browser and access the Notes Web App at http://localhost:8888.




