<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RootVendorProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'trxcode21@gmail.com')->first();
        $vendor = new Vendor();

        $vendor->banner = 'uploads/123.jpg';
        $vendor->phone = '123132321';
        $vendor->email = 'trxcode21@gmail.com';
        $vendor->address = 'IND';
        $vendor->description = 'First Shop Description';
        $vendor->user_id = $user->id;

        $vendor->save();
    }
}
