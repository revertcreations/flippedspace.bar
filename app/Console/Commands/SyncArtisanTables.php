<?php

namespace App\Console\Commands;

use App\Models\Artisan;
use App\Models\ArtisanColorway;
use App\Models\ArtisanSculpt;
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
        Redis::flushDb();

        $this->info(date("F j, Y, g:i a"));
        $this->info('(.....)0000o(=._.=)o0000(.....)');
        $this->info(' Syncing Artisan Tables...');
        $this->info('                 ');

        $artisan_id = 0;
        foreach ($all_artisans as $artisan)
        {
            foreach ($artisan["sculpts"] as $sculpt)
            {
                foreach ($sculpt["colorways"] as $colorway)
                {

                    // $sku = strtolower(substr($artisan['name'],0,1)).strtolower(substr($sculpt['name'],0,1)).strtolower(substr($colorway['name'],0,1)).'-'.$artisan_id;

                    Redis::hSet('catalog:artisans:'.$artisan_id, 'id', $artisan_id);
                    Redis::hSet('catalog:artisans:'.$artisan_id, 'artisan_name', $artisan['name']);
                    Redis::hSet('catalog:artisans:'.$artisan_id, 'sculpt_name', $sculpt['name']);
                    Redis::hSet('catalog:artisans:'.$artisan_id, 'colorway_name', $colorway['name']);
                    Redis::hSet('catalog:artisans:'.$artisan_id, 'keycap_archivist_id', $colorway['id']);
                    Redis::hSet('catalog:artisans:'.$artisan_id, 'keycap_archivist_img', $colorway['img']);
                    Redis::hSet('catalog:artisans:'.$artisan_id, 'keycap_archivist_is_cover', (isset($colorway['isCover']) ? $colorway['isCover'] : false));
                    Redis::hSet('catalog:artisans:'.$artisan_id, 'artisan_instagram', $artisan['instagram']);
                    Redis::hSet('catalog:artisans:'.$artisan_id, 'instagram', $artisan['instagram']);
                    Redis::hSet('catalog:artisans:'.$artisan_id, 'website', $artisan['website']);
                    Redis::hSet('catalog:artisans:'.$artisan_id, 'discord', $artisan['discord']);

                    Redis::hSet('catalog:artisans:search', strtolower($artisan['name'].' '.$sculpt['name'].' '.$colorway['name']), $artisan_id);
                    Redis::hSet('catalog:search', strtolower($artisan['name'].' '.$sculpt['name'].' '.$colorway['name']), 'artisans:'.$artisan_id);
                    $artisan_id++;
                }
            }
        }

            $this->info('^^^^^^^^^^^^^^^');
            $this->info('((xx)) x ((xx))');
            $this->info('     (----)     ');

    }

}
