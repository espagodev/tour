<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return array
     */
    private function prepareTimeZones()
    {
        $timezones = [];

        $count = 1;
        foreach ($this->generateTimeZones() as $key => $timeZone) {
            $timezones[] = array(
                'tiz_nombre' => $timeZone,
                'tiz_timezone' => $key,
                'is_active' => true,
                'id' => $count,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            );

            $count++;
        }
        return $timezones;
    }

    /**
     * Generate timezones
     * @return array
     */
    private function generateTimeZones()
    {
        static $regions = array(
            \DateTimeZone::AFRICA,
            \DateTimeZone::AMERICA,
            \DateTimeZone::ANTARCTICA,
            \DateTimeZone::ASIA,
            \DateTimeZone::ATLANTIC,
            \DateTimeZone::AUSTRALIA,
            \DateTimeZone::EUROPE,
            \DateTimeZone::INDIAN,
            \DateTimeZone::PACIFIC,
        );

        $timezones = array();
        foreach ($regions as $region) {
            $timezones = array_merge($timezones, \DateTimeZone::listIdentifiers($region));
        }

        $timezone_offsets = array();
        foreach ($timezones as $timezone) {
            $tz = new \DateTimeZone($timezone);
            $timezone_offsets[$timezone] = $tz->getOffset(new \DateTime());
        }

        // sort timezone by offset
        asort($timezone_offsets);

        $timezone_list = array();
        foreach ($timezone_offsets as $timezone => $offset) {
            $offset_prefix = $offset < 0 ? '-' : '+';
            $offset_formatted = gmdate('H:i', abs($offset));

            $pretty_offset = "UTC${offset_prefix}${offset_formatted}";

            $timezone_list[$timezone] = "(${pretty_offset}) $timezone";
        }

        return $timezone_list;
    }

    public function run()
    {
        DB::table('time_zone')->truncate();

        DB::table('time_zone')->insert($this->prepareTimeZones()); 
    }
}
