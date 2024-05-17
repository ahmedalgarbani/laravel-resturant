<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class menuBuilderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_menus = array(
          array(
            "id"=>1,
            "name"=>"main_menu",

          ),
            array(
                "id"=>2,
                "name"=>"menu_footer_one",

            ),
            array(
                "id"=>3,
                "name"=>"menu_footer_two",

            ),
            array(
                "id"=>4,
                "name"=>"menu_footer_three",

            ),
        );

        $admin_menu_items = array(
            array(
                "id" => 1,
                "label" => "Home",
                "link" => "/",
                "parent_id" => 0,
                "sort" => 0,
                "class" => null,
                "menu_id" => 2,
                "depth" => 0,

            ),
            array(
                "id" => 2,
                "label" => "About Us",
                "link" => "/about",
                "parent_id" => 0,
                "sort" => 1,
                "class" => null,
                "menu_id" => 2,
                "depth" => 0

            ),
            array(
                "id" => 3,
                "label" => "Contact Us",
                "link" => "/contact",
                "parent_id" => 0,
                "sort" => 2,
                "class" => null,
                "menu_id" => 2,
                "depth" => 0

            ),
            array(
                "id" => 4,
                "label" => "Our Service",
                "link" => "/",
                "parent_id" => 0,
                "sort" => 3,
                "class" => null,
                "menu_id" => 2,
                "depth" => 0,

            ),
            array(
                "id" => 5,
                "label" => "Gallary",
                "link" => "/",
                "parent_id" => 0,
                "sort" => 4,
                "class" => null,
                "menu_id" => 2,
                "depth" => 0,

            ),
            array(
                "id" => 6,
                "label" => "Terms And Conditions",
                "link" => "/terms-condition",
                "parent_id" => 0,
                "sort" => 0,
                "class" => null,
                "menu_id" => 3,
                "depth" => 0,

            ),
            array(
                "id" => 7,
                "label" => "Privacy Policy",
                "link" => "/privacy-policy",
                "parent_id" => 0,
                "sort" => 1,
                "class" => null,
                "menu_id" => 3,
                "depth" => 0,

            ),
            array(
                "id" => 8,
                "label" => "Products",
                "link" => "/products",
                "parent_id" => 0,
                "sort" => 1,
                "class" => null,
                "menu_id" => 3,
                "depth" => 0,

            ),
            array(
                "id" => 9,
                "label" => "Refund Policy",
                "link" => "/privacy-policy",
                "parent_id" => 0,
                "sort" => 2,
                "class" => null,
                "menu_id" => 3,
                "depth" => 0,

            ),
            array(
                "id" => 10,
                "label" => "FAQ",
                "link" => "/",
                "parent_id" => 0,
                "sort" => 3,
                "class" => null,
                "menu_id" => 3,
                "depth" => 0,

            ),
            array(
                "id" => 11,
                "label" => "Contact",
                "link" => "/contact",
                "parent_id" => 0,
                "sort" => 4,
                "class" => null,
                "menu_id" => 3,
                "depth" => 0,

            ),
            array(
                "id" => 12,
                "label" => "FAQs",
                "link" => "/",
                "parent_id" => 0,
                "sort" => 0,
                "class" => null,
                "menu_id" => 4,
                "depth" => 0,
            ),
            array(
                "id" => 13,
                "label" => "Payment",
                "link" => "/payment",
                "parent_id" => 0,
                "sort" => 1,
                "class" => null,
                "menu_id" => 4,
                "depth" => 0,

            ),
            array(
                "id" => 14,
                "label" => "Settings",
                "link" => "/settings",
                "parent_id" => 0,
                "sort" => 2,
                "class" => null,
                "menu_id" => 4,
                "depth" => 0,
            ),
            array(
                "id" => 15,
                "label" => "Privacy Policy",
                "link" => "/privacy-policy",
                "parent_id" => 0,
                "sort" => 3,
                "class" => null,
                "menu_id" => 4,
                "depth" => 0,

            ),
            array(
                "id" => 16,
                "label" => "Home",
                "link" => "/",
                "parent_id" => 0,
                "sort" => 0,
                "class" => null,
                "menu_id" => 1,
                "depth" => 0,

            ),
            array(
                "id" => 17,
                "label" => "About",
                "link" => "/about",
                "parent_id" => 0,
                "sort" => 1,
                "class" => null,
                "menu_id" => 1,
                "depth" => 0,

            ),
            array(
                "id" => 18,
                "label" => "Blog",
                "link" => "/blogs",
                "parent_id" => 0,
                "sort" => 2,
                "class" => null,
                "menu_id" => 1,
                "depth" => 0,

            ),
            array(
                "id" => 19,
                "label" => "Contact",
                "link" => "/contact",
                "parent_id" => 0,
                "sort" => 3,
                "class" => null,
                "menu_id" => 1,
                "depth" => 0,
            ),
            array(
                "id" => 20,
                "label" => "Page",
                "link" => "#",
                "parent_id" => 0,
                "sort" => 4,
                "class" => null,
                "menu_id" => 1,
                "depth" => 0,

            ),
            array(
                "id" => 21,
                "label" => "Chefs",
                "link" => "/chefs",
                "parent_id" => 20,
                "sort" => 5,
                "class" => null,
                "menu_id" => 1,
                "depth" => 1,

            ),
            array(
                "id" => 22,
                "label" => "Testimoials",
                "link" => "/testimoials",
                "parent_id" => 20,
                "sort" => 6,
                "class" => null,
                "menu_id" => 1,
                "depth" => 1

            ),
            array(
                "id" => 23,
                "label" => "Privacy Policy",
                "link" => "/privacy-policy",
                "parent_id" => 20,
                "sort" => 7,
                "class" => null,
                "menu_id" => 1,
                "depth" => 1,

            ),
            array(
                "id" => 24,
                "label" => "Terms And Conditions",
                "link" => "/terms-condition",
                "parent_id" => 20,
                "sort" => 8,
                "class" => null,
                "menu_id" => 1,
                "depth" => 1,

            ),

        );

        DB::table('admin_menus')->insert($admin_menus);
        DB::table('admin_menu_items')->insert($admin_menu_items);
    }
}
