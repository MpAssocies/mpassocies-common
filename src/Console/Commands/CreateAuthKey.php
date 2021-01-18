<?php


namespace MpAssocies\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use MpAssocies\Models\Auth\Module\AuthKey;

class CreateAuthKey extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'key:application';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create app key';

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
     * @return int
     */
    public function handle()
    {
        $this->info("Create new App access");
        $secret = Str::random(32);;
        $authKey = new AuthKey();
        $authKey->key = Str::random(32);
        $authKey->secret = Hash::make($secret);
        $authKey->description = $this->ask("Description de l'utilisateur de la clé");
        $authKey->save();

        $this->info('Key created successfully: ' . $authKey->key);
        $this->info('Secret created successfully: ' . $secret);
        return 0;
    }
}