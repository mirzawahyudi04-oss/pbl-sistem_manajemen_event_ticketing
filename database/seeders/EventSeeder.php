<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Tiket;
use App\Models\Organizer;
use App\Models\User;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'user'      => ['name' => 'Jazz Fest',    'email' => 'jazzfest@gmail.com'],
                'organizer' => ['nama_organizer' => 'Jazz Fest',    'kontak' => '08111111111'],
                'event'     => ['nama_event' => 'Java Jazz Festival',         'deskripsi' => 'Festival jazz terbesar di Indonesia',     'tanggal' => '2026-05-25', 'lokasi' => 'Jakarta'],
                'tiket'     => ['nama_tiket' => 'Regular', 'harga' => 250000,   'kuota' => 100],
            ],
            [
                'user'      => ['name' => 'Ismaya Live',  'email' => 'ismaya@gmail.com'],
                'organizer' => ['nama_organizer' => 'Ismaya Live',  'kontak' => '08222222222'],
                'event'     => ['nama_event' => 'We The Fest',                'deskripsi' => 'Festival musik terbesar se-Asia Tenggara', 'tanggal' => '2026-07-20', 'lokasi' => 'Jakarta'],
                'tiket'     => ['nama_tiket' => 'Regular', 'harga' => 500000,   'kuota' => 200],
            ],
            [
                'user'      => ['name' => 'Music Asia',   'email' => 'musicasia@gmail.com'],
                'organizer' => ['nama_organizer' => 'Music Asia',   'kontak' => '08333333333'],
                'event'     => ['nama_event' => 'Coldplay Live',              'deskripsi' => 'Konser Coldplay di Jakarta',               'tanggal' => '2026-09-10', 'lokasi' => 'Jakarta'],
                'tiket'     => ['nama_tiket' => 'Regular', 'harga' => 1500000, 'kuota' => 500],
            ],
            [
                'user'      => ['name' => 'DWP',          'email' => 'dwp@gmail.com'],
                'organizer' => ['nama_organizer' => 'DWP',          'kontak' => '08444444444'],
                'event'     => ['nama_event' => 'Djakarta Warehouse Project', 'deskripsi' => 'Festival musik elektronik terbesar',       'tanggal' => '2026-12-12', 'lokasi' => 'Jakarta'],
                'tiket'     => ['nama_tiket' => 'Regular', 'harga' => 750000,  'kuota' => 300],
            ],
            [
                'user'      => ['name' => 'PSSI',         'email' => 'pssi@gmail.com'],
                'organizer' => ['nama_organizer' => 'PSSI',         'kontak' => '08555555555'],
                'event'     => ['nama_event' => 'Liga 1 Indonesia',           'deskripsi' => 'Pertandingan Liga 1 Indonesia',            'tanggal' => '2026-05-05', 'lokasi' => 'Bandung'],
                'tiket'     => ['nama_tiket' => 'Tribun',  'harga' => 100000,  'kuota' => 1000],
            ],
            [
                'user'      => ['name' => 'GoRun',        'email' => 'gorun@gmail.com'],
                'organizer' => ['nama_organizer' => 'GoRun',        'kontak' => '08666666666'],
                'event'     => ['nama_event' => 'Fun Run Batam 5K',           'deskripsi' => 'Lari santai 5K di Batam',                  'tanggal' => '2026-05-30', 'lokasi' => 'Batam'],
                'tiket'     => ['nama_tiket' => 'Regular', 'harga' => 75000,   'kuota' => 500],
            ],
            [
                'user'      => ['name' => 'TechTalk',     'email' => 'techtalk@gmail.com'],
                'organizer' => ['nama_organizer' => 'TechTalk',     'kontak' => '08777777777'],
                'event'     => ['nama_event' => 'Seminar Nasional IT',        'deskripsi' => 'Seminar teknologi informasi nasional',      'tanggal' => '2026-06-15', 'lokasi' => 'Surabaya'],
                'tiket'     => ['nama_tiket' => 'Regular', 'harga' => 50000,   'kuota' => 200],
            ],
            [
                'user'      => ['name' => 'Code Academy', 'email' => 'codeacademy@gmail.com'],
                'organizer' => ['nama_organizer' => 'Code Academy', 'kontak' => '08888888888'],
                'event'     => ['nama_event' => 'Bootcamp Coding',            'deskripsi' => 'Bootcamp coding online intensif',           'tanggal' => '2026-06-18', 'lokasi' => 'Online'],
                'tiket'     => ['nama_tiket' => 'Regular', 'harga' => 150000,  'kuota' => 100],
            ],
            [
                'user'      => ['name' => 'Comic ID',     'email' => 'comicid@gmail.com'],
                'organizer' => ['nama_organizer' => 'Comic ID',     'kontak' => '08999999999'],
                'event'     => ['nama_event' => 'Indonesia Comic Con',        'deskripsi' => 'Pameran komik dan budaya pop Indonesia',    'tanggal' => '2026-07-01', 'lokasi' => 'Jakarta'],
                'tiket'     => ['nama_tiket' => 'Regular', 'harga' => 120000,  'kuota' => 300],
            ],
            [
                'user'      => ['name' => 'ArtStage',     'email' => 'artstage@gmail.com'],
                'organizer' => ['nama_organizer' => 'ArtStage',     'kontak' => '08101010101'],
                'event'     => ['nama_event' => 'Pentas Drama Musikal',       'deskripsi' => 'Pertunjukan drama musikal',                 'tanggal' => '2026-06-22', 'lokasi' => 'Yogyakarta'],
                'tiket'     => ['nama_tiket' => 'Regular', 'harga' => 80000,   'kuota' => 150],
            ],
            [
                'user'      => ['name' => 'ArtSpace',     'email' => 'artspace@gmail.com'],
                'organizer' => ['nama_organizer' => 'ArtSpace',     'kontak' => '08121212121'],
                'event'     => ['nama_event' => 'Art Exhibition 2026',        'deskripsi' => 'Pameran seni rupa internasional',           'tanggal' => '2026-06-28', 'lokasi' => 'Bali'],
                'tiket'     => ['nama_tiket' => 'Regular', 'harga' => 60000,   'kuota' => 200],
            ],
            [
                'user'      => ['name' => 'E-Sport ID',   'email' => 'esportid@gmail.com'],
                'organizer' => ['nama_organizer' => 'E-Sport ID',   'kontak' => '08131313131'],
                'event'     => ['nama_event' => 'Turnamen E-Sport MLBB',      'deskripsi' => 'Turnamen Mobile Legends Bang Bang',         'tanggal' => '2026-07-10', 'lokasi' => 'Online'],
                'tiket'     => ['nama_tiket' => 'Gratis',  'harga' => 0,       'kuota' => 1000],
            ],
        ];

        foreach ($data as $d) {
            $user = User::create([
                'name'     => $d['user']['name'],
                'email'    => $d['user']['email'],
                'password' => bcrypt('password'),
                'role'     => 'organizer',
            ]);

            $organizer = Organizer::create([
                'id_user'        => $user->id,
                'nama_organizer' => $d['organizer']['nama_organizer'],
                'kontak'         => $d['organizer']['kontak'],
            ]);

            $event = Event::create([
                'id_organizer' => $organizer->id_organizer,
                'nama_event'   => $d['event']['nama_event'],
                'deskripsi'    => $d['event']['deskripsi'],
                'tanggal'      => $d['event']['tanggal'],
                'lokasi'       => $d['event']['lokasi'],
            ]);

            Tiket::create([
                'id_event'   => $event->id_event,
                'nama_tiket' => $d['tiket']['nama_tiket'],
                'harga'      => $d['tiket']['harga'],
                'kuota'      => $d['tiket']['kuota'],
            ]);
        }
    }
}