<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2019/5/9
 * Time: 21:28
 */




namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Models\CountryModel;
use Stichoza\GoogleTranslate\TranslateClient;

class TranslateCountryName extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translate:country_name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '翻译国家名称';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('开始翻译');
        $countries = CountryModel::all();
        $tr = new TranslateClient('en', 'zh', ['verify' => false]);
        foreach ($countries as $item) {
            try {
                $item->ch_name =  $tr->translate($item->name);
                $item->save();
                $this->info($item->id . ' translate success');
            } catch (\Exception $e) {
                $this->error($e->getMessage());
            }
        }
        $this->info('finish');


    }
}
