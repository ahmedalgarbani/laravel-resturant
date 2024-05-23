<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use App\Models\WhyChooseUs;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */


    private $permissions = [
        //Authentication
        'login',
        'register',
        //Role
        'role-list',
        'role-create',
        'role-edit',
        'role-delete',
        //Product
        'product-list',
        'product-create',
        'product-edit',
        'product Option-show',
        'product Size-list',
        'product Variant-list',
        'product Gallary-list',
        'product Size-create',
        'product Variant-create',
        'product Gallary-create',
        'product-delete',
        //Daily Offer
        'Daily Offer-list',
        'Daily Offer-create',
        'Daily Offer-edit',
        'Daily Offer-delete',
        'Daily Offer-show-title',
        'Daily Offer-update-title',
        // Slider Home
        'Slider Home-list',
        'Slider Home-create',
        'Slider Home-edit',
        'Slider Home-delete',
        //Section
        'Section-show',
        //Order
        'Order-show',
        //Page
        'Page-show',
        //Chat
        'Chat-show',
        //Setting
        'Setting-show',
        //Menu Builder
        'Menu Builder-show',
        //Manage Restaurant
        'Manage Restaurant-show',
        //Why Choose Us
        'why-choose-us-list',
        'why-choose-us-create',
        'why-choose-us-edit',
        'why-choose-us-delete',
        'why-choose-us-show-title',
        'why-choose-us-update-title',
        //Testimonial
        'Testimonial-list',
        'Testimonial-create',
        'Testimonial-edit',
        'Testimonial-delete',
        'Testimonial-show-title',
        'Testimonial-update-title',
        //Account Management
        'Account Management-list',
        'Account Management-create',
        'Account Management-edit',
        'Account Management-delete',
        //Bunner Slider
        'Bunner Slider-list',
        'Bunner Slider-create',
        'Bunner Slider-edit',
        'Bunner Slider-delete',
        //Custom Page
        'Custom Page-list',
        'Custom Page-create',
        'Custom Page-edit',
        'Custom Page-delete',
        //Social Link
        'Social Link-list',
        'Social Link-create',
        'Social Link-edit',
        'Social Link-delete',
        //Product Reviews
        'Product Review-list',
        'Product Review-edit',
        'Product Review-delete',
        //Chefs
        'Chef-list',
        'Chef-create',
        'Chef-edit',
        'Chef-delete',
        'Chef-show-title',
        'Chef-update-title',
        //App Download
        'App Download-list',
        'App Download-edit',
        //Counter
        'Counter-list',
        'Counter-edit',
        //Global Setting
        'Global Setting-list',
        'Global Setting-edit',
        //Logo
        'Logo Setting-list',
        'Logo Setting-edit',
        //Email Setting
        'Email Setting-list',
        'Email Setting-edit',
        //Appearance Setting
        'Appearance Setting-list',
        'Appearance Setting-edit',
        //Seo Setting
        'Seo Setting-list',
        'Seo Setting-edit',
        //Notification Setting
        'Notification Setting-list',
        'Notification Setting-edit',
        //Terms Condition
        'Terms Condition-list',
        'Terms Condition-edit',
        //news-letter
        'News Letter-list',
        'News Letter Send Message-list',
        'News Letter Send Message-send',
        //Privacy Policy
        'Privacy Policy-list',
        'Privacy Policy-edit',
        //Footer Information
        'Footer Information-list',
        'Footer Information-edit',
        //About
        'About-list',
        'About-edit',
        //Contact Us
        'Contact Us-list',
        'Contact Us-edit',
        //Order
        'All Order-list',
        'In Process Order-list',
        'Pending Order-list',
        'Delivered Order-list',
        'Declined Order-list',
        'Order-delete',
        'Order Detaile-list',
        'Order Update-list',
        'Order Payment Status-list',
        'Order Status-list',
        'Order Status-update',
        //Category
        'Category-list',
        'Category-create',
        'Category-edit',
        'Category-delete',
        //Coupon
        'Coupon-list',
        'Coupon-create',
        'Coupon-edit',
        'Coupon-delete',
        //Delivery
        'Delivery-list',
        'Delivery-create',
        'Delivery-edit',
        'Delivery-delete',
        //Payment Getway
        'Payment Getway-list',
        'Paypal-list',
        'Paypal-edit',
        'Stripe-list',
        'Stripe-edit',
        'RazorPay-list',
        'RazorPay-edit',

    ];




    public function run(): void
    {

        /** Permission Seed */
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create admin User and assign the role to him.
        $user = User::create([
            'name' => 'Prevail Ejimadu',
            'email' => 'test2@example.com',
            'password' => Hash::make('password')
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);


    }
}
