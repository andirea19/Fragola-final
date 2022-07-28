<?php

namespace App\Console\Commands;
  
  use Illuminate\Console\Command;
  use Illuminate\Support\Facades\Http;
  use App\Models\User;
    
  class DemoCron extends Command
  {
      /**
        *Namen des Cron-Jobs   
       * @var string
       */
      protected $signature = 'demo:cron';
    
      /**Beschreibung des Cron-Jobs
       *
       * @var string
       */
      protected $description = 'Command description';
    
      /**
       * @return void
       */
      public function __construct()
      {
          parent::__construct();
      }
    
      /**
       * @return int
       */
      public function handle()
      {
          info("Cron Job running at ". now());
    
          /*------------------------------------------
          --------------------------------------------
          Write Your Logic Here....
          I am getting users and create new users if not exist....
          --------------------------------------------
          --------------------------------------------*/
          $response = Http::get('https://jsonplaceholder.typicode.com/users');
        
          $users = $response->json();
    
          if (!empty($users)) {
              foreach ($users as $key => $user) {
                  if(!User::where('email', $user['email'])->exists() ){
                      User::create([
                          'name' => $user['name'],
                          'email' => $user['email'],
                          'password' => bcrypt('123456789')
                      ]);
                  }
              }
          }
    
          return 0;
      }
  }