// /database/migrations/seeds/ProjectsTableSeeder.php
<?php
 
use Illuminate\Database\Seeder;
 
class UserTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('user')->delete();
 
        $projects = array(
            ['id' => 1, 'fbId' => '1', 'firstName' => 'Prashant', 'lastName' => 'Thapa', 'cellPhone' => '703-973-3770', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'fbId' => '2', 'firstName' => 'Avi', 'lastName' => 'Shah', 'cellPhone' => '646-515-7366', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
 
        // Uncomment the below to run the seeder
        DB::table('user')->insert($projects);
    }
 
}
 
?>
