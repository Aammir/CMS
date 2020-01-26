<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{

   protected $table = 'site';
   protected $fillable = [
    'site_name',
    'logo',
    'favicon',
   'posts_per_page',
   'site_meta_info',
   'email',
   'phone',
   'address',
   'map',
   'show_pinned_post_section',
   'show_tags',
   'show_main_footer',
   'show_footer_bottom',
   'about_section_text',
   'newsletter_section_text',
    'footer_bottom'
   ];
   public $timestamps = false;
}
