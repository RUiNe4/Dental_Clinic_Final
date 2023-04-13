Before running this program, Please do the following:
Run composer install.
Run cp .env.example .env.
Run php artisan key:generate.
Run php artisan migrate.

- Seed all the necessary contents (
 php artisan db:seed --class=DoctorSeeder,
 php artisan db:seed --class=AppointmentSeeder,
 php artisan db:seed --class=TreatmentSeeder,
 php artisan db:seed --class=ServiceSeeder,
)

