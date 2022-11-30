<?php

namespace App\Helper;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederHelper extends Seeder
{
    public function saveOrUpdate($table, $attributes)
    {


        foreach ($attributes as $attr) {
            $record = null;

            if(isset($attr['id'])) {
                $record = DB::table($table)->find($attr['id']);
            }

            if ($record != null) {
                $attr['updated_at'] = Carbon::now();
                if ($record->created_at == null) {
                    $attr['created_at'] = Carbon::now();
                }

                $insertedOrUpdated = DB::table($table)->updateOrInsert(['id' => $attr['id']], $attr);

            } else {
                $attr['created_at'] = Carbon::now();

                $inserted = DB::table($table)->insert( $attr);

            }
        }
    }
}