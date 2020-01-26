<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    
    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'publicacao';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'autor', 'titulo', 'conteudo', 'id_category'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function category(){
        return $this->belongsTo('App\Models\Category', 'id_category');
    }

    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function autor(){
        return $this->belongsTo('App\Models\User', 'autor');
    }
}
