#### Before running this program, Please do the following:
#### install composer
`composer install`
#### Copy Env File 
`cp .env.example .env`
#### Generate Api key 
`php artisan key:generate`

#### Seed the database with the following cmd
`php artisan migrate`

`php artisan db:seed --class=DoctorSeeder`,

`php artisan db:seed --class=AppointmentSeeder`,

`php artisan db:seed --class=TreatmentSeeder`,

`php artisan db:seed --class=ServiceSeeder`

#### For Production
`npm run dev`
`php artisan serve`


