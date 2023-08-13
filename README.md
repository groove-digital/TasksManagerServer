# Backend - Task Manager Application

Welcome to the backend of the Task Manager application! This backend is built with Laravel and serves as the API for managing tasks. The application utilizes MongoDB as the database for storing tasks and features user authentication using JWT tokens.

## Installation Instructions

Follow the steps below to set up and run the backend on your local machine.

1. Clone this repository to your local machine.
2. Navigate to the backend project directory: `cd TasksManagerServer`
3. Install Composer dependencies: `composer install`
4. Configure your MongoDB database settings in `config/database.php` by modifying the `mongodb` configuration:  
  
    'mongodb' => [  
        'driver' => 'mongodb',  
        'dsn' => env('DB_URI', 'mongodb+srv://username:password@cluster.mongodb.net/?retryWrites=true&w=majority'),  
        'database' => 'taskmanager',  
    ],
     
    Replace `username`, `password`, and `cluster.mongodb.net` with your MongoDB Atlas credentials.
      
#### Alternatively, you can use my MongoDB Atlas cluster link for quick setup that has already been configured.

5. Start the backend server: `php artisan serve`
6. The API will be available at http://localhost:8000


## Features

- User Registration: Users can register with their email and password.
- User Login: Registered users can log in to access their task management panel.
- Task API Endpoints: Manage tasks through API endpoints.
  - `GET /api/tasks`: Retrieve a list of tasks.
  - `POST /api/tasks`: Add a new task.
  - `PUT /api/tasks/{taskId}`: Update a task's completion status.
  - `DELETE /api/tasks/{taskId}`: Delete a task.

- Secure Authentication: JWT tokens are used for user authentication.
- MongoDB Database: Tasks are stored in a MongoDB database (MongoDB Atlas).

## Usage

1. Register an account or log in if you already have one.
2. Once logged in, you can use API endpoints to manage tasks.
3. Use API clients like Postman or your preferred tool to interact with the API.

Enjoy using the backend of the Task Manager application!
