<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create password column
        Schema::table('records', function (Blueprint $table) {
            $table->text('password')->after('nid');
        });
        //Convert password
        $records = DB::table('records')->get();
        foreach ($records as $record) {
            $raw = json_decode($record->raw);
            $password = Crypt::encrypt($raw->userPW);
            DB::table('records')->where('id', '=', $record->id)->update([
                'password' => $password
            ]);
        }
        //Drop raw column
        Schema::table('records', function (Blueprint $table) {
            $table->dropColumn('raw');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Create raw column
        Schema::table('records', function (Blueprint $table) {
            $table->json('raw')->after('ip');
        });
        //Convert to raw input
        $records = DB::table('records')->get();
        foreach ($records as $record) {
            $password = Crypt::decrypt($record->password);
            $raw = [
                'userID' => $record->nid,
                'userPW' => $password
            ];
            $raw = json_encode($raw);
            DB::table('records')->where('id', '=', $record->id)->update([
                'raw' => $raw
            ]);
        }
        //Drop password column
        Schema::table('records', function (Blueprint $table) {
            $table->dropColumn('password');
        });
    }
}
