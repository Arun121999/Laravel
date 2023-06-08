/******************************************
 * Project Description
 ******************************************/

Project: Data Insertion through URL and JSON


PHP Version: 7.4 or higher
Laravel Version: 8.x

Usage:
1. Clone the repository to your local machine.
2. Navigate to the project directory.
3. Install project dependencies using Composer.
4. Copy the `.env.example` file to `.env` and configure the necessary environment variables.
5. Generate a unique application key.
6. Set up the database connection in the `.env` file.
7. We are using queue to inset the records in table. So, Run this command php artisan queue:table
8. Migrate the database.

Before dispatching the job run the below queue command for the background process.
 Artisan Commands:
- `php artisan queue:work`: Starts the Laravel queue worker to process jobs.

9. After that run this command : 
-php artisan coingecko:fetch-data (This command will dispatch the jobs in the database. Here we are using array_chunk method to divide the json small groups. Currently we are making the group of 1000.)