<?php

namespace App\Console\Commands;

use App\Models\Artisan;
use App\Models\Artisan_Colorway;
use App\Models\Artisan_Sculpt;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SyncArtisanTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:artisan-tables';
    protected $keycap_archvist_url = '';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Will';

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
        $response = Http::get('https://raw.githubusercontent.com/keycap-archivist/database/master/db/catalog.json');
        $all_artisans = $response->json();

        foreach ($all_artisans as $artisan)
        {

            $update_or_inserted_artisan = Artisan::updateOrCreate([
                "name" => $artisan["name"],
                "instagram" => $artisan["instagram"],
                "website" => $artisan["website"],
                "discord" => $artisan["discord"],
                "keycap_archivist_id" => $artisan["id"],
                "keycap_archivist_src" => $artisan["src"],
                "keycap_archivist_self_order" => (isset($artisan["selfOrder"]) ? $artisan["selfOrder"] : false)
            ]);

            foreach ($artisan["sculpts"] as $sculpt)
            {
                $update_or_inserted_artisan_sclupt = Artisan_Sculpt::updateOrCreate([
                    "artisan_id" => $update_or_inserted_artisan->id,
                    "name" => $sculpt["name"],
                    "keycap_archivist_id" => $sculpt["id"]
                ]);

                foreach ($sculpt["colorways"] as $colorway)
                {
                    $update_or_inserted_artisan_colorway = Artisan_Colorway::updateOrCreate([
                        "artisan_id" => $update_or_inserted_artisan->id,
                        "artisan_sculpt_id" => $update_or_inserted_artisan_sclupt->id,
                        "name" => $colorway["name"],
                        "keycap_archivist_id" => $colorway["id"],
                        "keycap_archivist_img" => $colorway["img"],
                        "keycap_archivist_is_cover" => (isset($colorway["isCover"]) ? $colorway["isCover"] : false),
                        "keycap_archivist_note" => (isset($colorway["note"]) ? $colorway["note"] : false)
                    ]);
                }
            }
        }
    }
}
