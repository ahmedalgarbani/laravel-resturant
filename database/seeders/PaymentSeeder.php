<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payment_getways = array(
            array(
                'id'=>1,
                'key'=>'paypal_logo',
                'value'=>'/uploads/media_6646e17ee0d1b.jpg'
            ),
       array(
                'id'=>2,
                'key'=>'paypal_status',
                'value'=>1
            ),
       array(
                'id'=>3,
                'key'=>'paypal_account_mode',
                'value'=>'sandbox'
            ),
       array(
                'id'=>4,
                'key'=>'paypal_country',
                'value'=>'United States'
            ),
       array(
                'id'=>5,
                'key'=>'paypal_currency',
                'value'=>'USD'
            ),
       array(
                'id'=>6,
                'key'=>'paypal_rate',
                'value'=>1
            ),
       array(
                'id'=>7,
                'key'=>'paypal_api_key',
                'value'=>'AXas_iEaUPdMS4gY5YJ20QZFtsJw2FryzV4R9NQt2u435BZRqZbtVqgb-UPZDT6hoO88CthwueE9r7C_'
            ),
       array(
                'id'=>8,
                'key'=>'paypal_secret_key',
                'value'=>'EKHMFpllrOR9LJhO9aP5AGQHqVlfnLH_0AWqHLn7AR1PtvcDpOsL8XM9uC4SnoSgHdbSFQ102Nv14dNm'
            ),
       array(
                'id'=>9,
                'key'=>'paypal_app_id',
                'value'=>'App Id'
            ),
       array(
                'id'=>10,
                'key'=>'stripe_logo',
                'value'=>'/uploads/media_6648748512cb7.png'
            ),
       array(
                'id'=>11,
                'key'=>'stripe_status',
                'value'=>1
            ),
       array(
                'id'=>12,
                'key'=>'stripe_country',
                'value'=>'United States'
            ),
       array(
                'id'=>13,
                'key'=>'stripe_currency',
                'value'=>'USD'
            ),
       array(
                'id'=>14,
                'key'=>'stripe_rate',
                'value'=>1
            ),
       array(
                'id'=>15,
                'key'=>'stripe_api_key',
                'value'=>'pk_test_51PHje2EbPuC2dopv7DZPQKMkI900Rtrh3g6mWNeQdP56CduSw08yQHJOqaEYwQdSZG9SvPXNN4X0jCEQR8RET8DX00eBeHfqz6'
            ),
            array(
                'id'=>16,
                'key'=>'stripe_secret_key',
                'value'=>'sk_test_51PHje2EbPuC2dopvB16oiTkytx3PaFlv27J0vipx3H7pLAV0wmFxSQBolOZI8a5oe1TBx8OTJBGDrCBf1FbWg7I400YcdUzL13'
            ),
       array(
                'id'=>17,
                'key'=>'razorpay_logo',
                'value'=>'/uploads/media_6648da112612d.jpg'
            ),
       array(
                'id'=>18,
                'key'=>'razorpay_status',
                'value'=>1
            ),
       array(
                'id'=>19,
                'key'=>'razorpay_country',
                'value'=>'United States'
            ),
       array(
                'id'=>20,
                'key'=>'razorpay_currency',
                'value'=>'USD'
            ),
       array(
                'id'=>21,
                'key'=>'razorpay_rate',
                'value'=>1
            ),
       array(
                'id'=>22,
                'key'=>'razorpay_rate',
                'value'=>'rzp_test_K7CipNQYyyMPiS'
            ),
       array(
                'id'=>23,
                'key'=>'razorpay_secret_key',
                'value'=>'zSBmNMorJrirOrnDrbOd1ALO'
            ),

        );
        \DB::table('payment_getways')->insert($payment_getways);
    }
}
