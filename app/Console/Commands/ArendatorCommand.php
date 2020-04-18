<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Arendator;
use App\ArendatorViolation;
use PHPUnit\Framework\StaticAnalysis\HappyPath\AssertNotInstanceOf\A;

class ArendatorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'arendator';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $arendators = Arendator::all();

        foreach ($arendators as $arendator){
            ArendatorViolation::create([
                'user_id'=>6,
                'arendator_id'=>$arendator->id,
                'date'=>date('Y-m-d H:m:s'),
                'status'=>rand(0,1),
                'description'=> $this->generateRandomString(3)
                    .' '.$this->generateRandomString(6)
                    .' '.$this->generateRandomString(2)
                    .' '.$this->generateRandomString(4)
                    .' '.$this->generateRandomString(7)
            ]);
        }
    }

    public function generateRandomString($length = 3)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
