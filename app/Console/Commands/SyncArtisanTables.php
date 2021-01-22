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

        $changed_artisans_count = 0;
        $new_artisans_count = 0;

        $this->info(date("F j, Y, g:i a"));
        $this->info('(.....)0000o(=._.=)o0000(.....)');
        $this->info(' Syncing Artisan Tables...');
        $this->info('                 ');

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

            if($update_or_inserted_artisan->wasRecentlyCreated)
                $new_artisans_count++;

            if($update_or_inserted_artisan->wasChanged())
                $changed_artisans_count++;

            foreach ($artisan["sculpts"] as $sculpt)
            {
                $update_or_inserted_artisan_sclupt = Artisan_Sculpt::updateOrCreate([
                    "artisan_id" => $update_or_inserted_artisan->id,
                    "name" => $sculpt["name"],
                    "keycap_archivist_id" => $sculpt["id"]
                ]);

                if($update_or_inserted_artisan_sclupt->wasRecentlyCreated)
                    $new_artisans_count++;

                if($update_or_inserted_artisan_sclupt->wasChanged())
                    $changed_artisans_count++;

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

                    if($update_or_inserted_artisan_colorway->wasRecentlyCreated)
                        $new_artisans_count++;

                        if($update_or_inserted_artisan_colorway->wasChanged())
                        $changed_artisans_count++;
                }
            }
        }

        $this->info('Changed Artisans: '.$changed_artisans_count);
        $this->info('New Artisans: '. $new_artisans_count);
        $this->info('                 ');

        if($changed_artisans_count == 0 && $new_artisans_count == 0)
        {
            $this->info('^^^^^^^^^^^^^^^');
            $this->info('((xx)) x ((xx))');
            $this->info('     (----)     ');
        }
        else
        {
            $this->info('$$$$$$$$$$$$$$$');
            $this->info('(($$)) x (($$))');
            $this->info('     (!!!!)     ');
        }

        $this->info('                 ');

    }

}
