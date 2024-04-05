
## Simple Rick & Morty API Application 
  
### General  
This Laravel application can download data from 'https://rickandmortyapi.com/api/' and upload it into the database. After this process all of the data will appear in a table with several functionality which you can see below.
  
### How to install
1. Clone this repository or download as **.zip**  
2. Create a new database with name **'homan_trans'**
3. Navigate into the cloned or downloaded directory **'homan-trans'** in a terminal
4. Install the dependencies with the following commands:
	* ``` composer install ```
	* ``` npm install ```
5. Inside the **'homan-trans'** directory rename the **'.env.example'** file to **'.env'** (if the composer didn't do it)
6. Generate the **application encryption key** with the following command:
	* ``` php artisan key:generate ```
7. Run the migration process with the following command:
	* ``` php artisan migrate ```
8. Run the application with the following command:
	* ``` php artisan serve ```

> **After the last step, app will run on '127.0.0.1:8000' !**

### Usage
 - First time, to fetch API, click on the **'Download Data'** button on the top right.
 - This process will take about **2 minutes**, so please be patient.
 - After the process finished, the table will appear with all of the data

### Functionality  
- Donwload data from API & upload it to database
- All data are can be browsed in a formatted table with a pagination
- Every row is clickable, in this case a popup window will be appear with the episode character list
- You can sort all of the data by clicking on the column name
- You can filter the data by **'Name'**, **'Air Date'** and **'Created Date'** (from - to)
- To navigate back to Home Page, click on **'Homan-Trans - Laravel Homework'** title on the top left.

### Dependecies I used
 - Sweetalert2 11.10.7

### Technologies:
 - Laravel
 - TailwindCSS
 - jQuery
 - MySQL

### IDE I used
- *Visual Studio Code*
