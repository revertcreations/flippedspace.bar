<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;

class SyncArtisanTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:artisan-tables';
    protected $keycap_archvist_url = 'https://raw.githubusercontent.com/keycap-archivist/database/master/db/catalog.json';
                                 //   https://raw.githubusercontent.com/keycap-archivist/database/master/db/catalog.json

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Makes request to keycap_archivist master/db to retrieve json. Updates or Creates any new records in Artisan tables';

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

        $response = Http::get($this->keycap_archvist_url);
        $all_artisans = $response->json();

        // I don't think we ever want to flush?
        // Right now we are just adding artisans to the catalog and incrementing.
        // So just check for the archivist_id, and move on if found

        Redis::flushDb();

        // We need some sort of way to have user submitted id's and checks as well

        $this->info(date("F j, Y, g:i a"));
        $this->info('(.....)0000o(=._.=)o0000(.....)');
        $this->info(' Syncing Artisan Tables...');
        $this->info('                 ');
        // $this->info(var_dump($all_artisans));

        // TODO: a much better sku system??
        // Not sure if incrementing ids are enough
        
        $artisan_id = 1;
        
        foreach ($all_artisans as $artisan)
        {
            foreach ($artisan['sculpts'] as $sculpt)
            {
                foreach ($sculpt['colorways'] as $colorway)
                {

                    $title = $artisan['name'].' '.$sculpt['name'].' '.$colorway['name'];
                    $search_string = strtolower($artisan['name'].' '.$sculpt['name'].' '.$colorway['name']);

                    $collectible = [
                        'id' => $artisan_id,
                        'category' => 'artisans',
                        'artisan_name' => $artisan['name'],
                        'sculpt_name' => $sculpt['name'],
                        'colorway_name' => $colorway['name'],
                        'keycap_archivist_id' => $colorway['id'],
                        'keycap_archivist_img' => $colorway['img'],
                        'keycap_archivist_is_cover' => (isset($colorway['isCover']) ? $colorway['isCover'] : false),
                        'artisan_instagram' => $artisan['instagram'],
                        'instagram' => $artisan['instagram'],
                        'website' => $artisan['website'],
                        'discord' => $artisan['discord'],
                        'search_string' => $search_string,
                        'title' => $title
                    ];

                    $colorway = Redis::hmSet('catalog:artisans:'.$artisan_id, $collectible);
                    Redis::hSet('catalog:artisans', $search_string, $artisan_id);
                    Redis::hSet('catalog', $search_string, 'artisans:'.$artisan_id);

                    $artisan_id++;
                }
            }
        }

            $this->info('^^^^^^^^^^^^^^^');
            $this->info('((xx)) x ((xx))');
            $this->info('     (----)     '.$artisan_id);


        }

}
