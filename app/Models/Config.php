<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'logo',
        'favicon',
        'all_rights_reserved_text',
        'address_line_1',
        'address_line_2',
        'district',
        'local_government',
        'state',
        'postal_code',
        'country',
        'primary_phone_number',
        'secondary_phone_number',
        'email',
        'website',
        'description',
        'sub_title',
        'mobile_number',
        'twitter_url',
        'facebook_url',
        'instagram_url',
        'linkedin_url',
        'top_donors_text',
        'keywords',
        'bank_name',
        'bank_account_number',
        'bank_account_name',
        'bank_qr'
    ];
}
