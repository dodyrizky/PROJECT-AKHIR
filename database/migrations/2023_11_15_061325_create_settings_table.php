<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->increments('id_setting');
            $table->string('nama_instansi');
            $table->string('alamat');
            $table->string('logo');
            $table->string('tentang_kami');
            $table->string('instagram');
            $table->string('facebook');
            $table->string('email');
            $table->string('no_hp');
            $table->string('nomor_rekening');
            $table->string('nama_rekening');
            $table->string('bank');
            $table->text('maps');
            $table->timestamps();
        });

        DB::table('setting')->insert([
            'nama_instansi' => 'Masukan Nama Instansi',
            'alamat' => 'Masukan Alamat',
            'logo' => 'logo.jpg',
            'tentang_kami' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In tempore blanditiis molestiae cupiditate ipsam, reiciendis ducimus sapiente aliquam facilis quas debitis, corrupti, ipsum obcaecati officiis dignissimos sit sed repellendus magnam?',
            'instagram' => 'Masukan instagram',
            'facebook' => 'Masukan facebook',
            'email' => 'Masukan email',
            'no_hp' => 'Masukan nomor hp',
            'nomor_rekening' => 'Masukan nomor rekening',
            'nama_rekening' => 'Masukan nama rekening',
            'bank' => 'Masukan nama Bank',
            'maps' => 'embed?pb=!1m18!1m12!1m3!1d3982.131020847008!2d126.86254867351988!3d-3.5572773423225588!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d72f68176deeff1%3A0xed33e464fd9050a5!2sPanti%20Asuhan%20Huke%20Ina!5e0!3m2!1sid!2sid!4v1727571315953!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting');
    }
};
