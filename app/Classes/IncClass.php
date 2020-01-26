<?php

namespace App\Classes;

class IncClass {
   
    public function incUse() {
        $string = "    use App\Site;"
                . "use App\Page;"
                . "use App\Post;"
                . "use App\Category;"
                . "use App\Tag;"
                . "use App\SocialMedia;"
                . "use Illuminate\Http\Request;";
        echo $string;
    }
}
