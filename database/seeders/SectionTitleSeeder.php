<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $section_titles = array(
            array(
                'id'=>1,
                'key'=>'why_choose_us_top_title',
                'value'=>'d1bkjhgfdsf'
            ),
            array(
                'id'=>2,
                'key'=>'why_choose_us_main_title',
                'value'=>'d1bkjhgfdsf'
            ),
            array(
                'id'=>3,
                'key'=>'why_choose_us_sub_title',
                'value'=>'Objectively pontificate quality models before intu...'
            ),
            array(
                'id'=>5,
                'key'=>'dailyoffer_top_title',
                'value'=>'d1bkjhgfdsf'
            ),
            array(
                'id'=>6,
                'key'=>'dailyoffer_main_title',
                'value'=>'d1bkjhgfdsf'
            ),
            array(
                'id'=>7,
                'key'=>'dailyoffer_sub_title',
                'value'=>'d1bkjhgfdsf'
            ),
            array(
                'id'=>8,
                'key'=>'chef_top_title',
                'value'=>'d1bkjhgfdsf'
            ),
            array(
                'id'=>9,
                'key'=>'chef_main_title',
                'value'=>'d1bkjhgfdsf'
            ),
            array(
                'id'=>10,
                'key'=>'chef_sub_title',
                'value'=>'ccccccc'
            ),
            array(
                'id'=>11,
                'key'=>'Testimonial_top_title',
                'value'=>'Testimonial top'
            ),
            array(
                'id'=>12,
                'key'=>'Testimonial_main_title',
                'value'=>'Testimonial main'
            ),
            array(
                'id'=>13,
                'key'=>'Testimonial_sub_title',
                'value'=>'Testimonial sub'
            ),

        );
        \DB::table('section_titles')->insert($section_titles);

    }
}
