<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ver extends Model
{
    // モデル内の情報を設定する

    // テーブル名
    protected $table = 'ver';

    // Carbonインスタンスへの変換対象の設定
    protected $dates = [
        'created_at', 
        'updated_at'
    ];

    // ユーザーの入力値として反映させる値は何か設定する
    protected $fillable = [
        'id',
        'version',
        'min_version'
    ];
}
