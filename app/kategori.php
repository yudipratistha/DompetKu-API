<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public function transaksi(){
        return $this->hashMany('App\transaksi');
    }
}
