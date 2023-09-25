# Todo Management System

## Overview

The Todo Management System is a web application designed to help users organize and manage their tasks effectively. It provides features for creating todos, setting start dates, defining repetition patterns, and grouping tasks into categories. This system is built using Laravel, Livewire, and Tailwind CSS.

## Features

- **Create Todos**: Users can create tasks that need to be completed. Each task can be assigned a start date and a repetition pattern.

- **Repetition Patterns**: Tasks can be set to repeat on specific schedules, such as daily, weekly, or monthly. This allows users to automate the creation of recurring tasks.

- **Iteration Duration**: Users can define the duration for which a task should repeat, either by specifying a start and end date or by setting the number of iterations.

- **Task Grouping**: Tasks can be organized into groups. Each group can have a name and description, and tasks can be assigned to specific groups.

- **Task Listing**: The application displays a list of pending tasks, organized by date. Tasks are grouped into categories like "Tasks Today," "Tasks Tomorrow," and so on.

- **Mark as Completed**: Users can mark tasks as completed once they are finished.

## Getting Started

To run the Todo Management System locally, follow these steps:

1. Clone the repository to your local machine.
2. Install the necessary dependencies using `composer install` and `npm install`.
3. Set up the database configuration in the `.env` file and run the migrations using `php artisan migrate`.
4. Start the development server using `php artisan serve`.
5. Visit `http://localhost:8000` in your web browser.

## Dummy Data and Tests

- Seeders have been created to provide dummy data for testing and development. Run the following commands to seed the database:
    - `php artisan db:seed --class=TaskFrequencySeeder`
    - `php artisan db:seed --class=GroupsSeeder`
    - `php artisan db:seed --class=TasksSeeder`
- Alternatively, you can run `php artisan db:seed` to run all the seeders at once.
- The application has been tested using Laravel Pest. Run the following command to run the tests: `php artisan test`.

## Usage

1. **Create a Task**: Log in to the system and navigate to the "Create Task" section. Fill in the details such as task name, start date, and repetition pattern.

2. **Manage Repetition**: For tasks that need to repeat, define the repetition pattern and iteration duration. This will automate the creation of recurring tasks.

3. **Group Tasks**: Create task groups and assign tasks to specific groups. This helps in organizing tasks based on categories or projects.

4. **View Pending Tasks**: The main dashboard displays pending tasks categorized by date. This provides a clear overview of tasks that need attention.

5. **Mark as Completed**: Once a task is finished, mark it as completed. The task will be moved to the completed tasks section.

## Contributing

If you'd like to contribute to the development of this project, please follow these guidelines:

1. Fork the repository and create a new branch for your feature or bug fix.
2. Make your changes and ensure the code follows the project's coding standards.
3. Write tests to cover your code changes.
4. Submit a pull request, explaining the changes and why they are necessary.

## License

This project is licensed under the [MIT License](LICENSE).
