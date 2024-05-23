<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = array(
            array(
                'id'=>1,
                'key'=>'mail_driver',
                'value'=>'smtp'
            ),
        array(
                'id'=>2,
                'key'=>'mail_host',
                'value'=>'sandbox.smtp.mailtrap.io'
            ),
        array(
                'id'=>3,
                'key'=>'mail_port',
                'value'=>'587'
            ),
        array(
                'id'=>4,
                'key'=>'mail_username',
                'value'=>'eb1bab21045154'
            ),
        array(
                'id'=>5,
                'key'=>'mail_password',
                'value'=>'d906ae741331e2'
            ),
        array(
                'id'=>6,
                'key'=>'mail_encryption',
                'value'=>'tls'
            ),
        array(
                'id'=>7,
                'key'=>'mail_form_address',
                'value'=>'user@eeeee.com'
            ),
        array(
                'id'=>8,
                'key'=>'mail_receiver',
                'value'=>'support.user@eeeee.com'
            ),
        array(
                'id'=>9,
                'key'=>'site_name',
                'value'=>'Food App'
            ),
        array(
                'id'=>10,
                'key'=>'default_currency',
                'value'=>'USD'
            ),
        array(
                'id'=>11,
                'key'=>'currency_icon',
                'value'=>'$'
            ),
        array(
                'id'=>12,
                'key'=>'currency_Icon_position',
                'value'=>'left'
            ),
        array(
                'id'=>13,
                'key'=>'logo',
                'value'=>'/uploads/media_664276b807944.png'
            ),
            array(
                'id'=>14,
                'key'=>'footer_logo',
                'value'=>'/uploads/media_664276b818716.png'
            ),
        array(
                'id'=>15,
                'key'=>'breadcrumb',
                'value'=>'/uploads/media_664251f9394fc.jpg'
            ),
        array(
                'id'=>16,
                'key'=>'favicon',
                'value'=>'/uploads/media_664251f93a9c1.jpg'
            ),
        array(
                'id'=>17,
                'key'=>'color',
                'value'=>'#440D68'
            ),
        array(
                'id'=>18,
                'key'=>'seo_title',
                'value'=>'Food Park'
            ),
        array(
                'id'=>19,
                'key'=>'seo_description',
                'value'=>'Good res'
            ),
        array(
                'id'=>20,
                'key'=>'seo_keywords',
                'value'=>'food,good,restuarant'
            ),
        array(
                'id'=>21,
                'key'=>'pusher_app_id',
                'value'=>'1805416'
            ),
        array(
                'id'=>22,
                'key'=>'pusher_key',
                'value'=>'787efcbc095488ebff1d'
            ),
        array(
                'id'=>23,
                'key'=>'pusher_secret',
                'value'=>'58268bbdaf865d8898ec'
            ),
        array(
                'id'=>24,
                'key'=>'pusher_cluster',
                'value'=>'mt1'
            ),

        );

        \DB::table('settings')->insert($settings);
    }
}
