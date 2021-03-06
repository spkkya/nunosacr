<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;


class Artist extends Model
{	
	// Use column deleted_at from database instead of fully deleting item
	use SoftDeletes;
	use Sluggable;
	// protects against mass assign
	protected $guarded = ['id'];
	// Relatioship

	// sluggable
	public function sluggable()
	{
		return [
            'slug' => [
                'source' => 'name'
            ]
        ];
	}
	
	public function works()
	{
		return $this->hasMany('App\Work', 'artist_id');
	}
    //
	public function getAll() {
		return $this->all();
	}
	public function getAllNames() {
		return $this->pluck('name', 'id');
	}
	public function getOneBySlug($slug)
	{
		return $this->whereSlug($slug)->first();
	}

	//
	public function getOne($id) {
		return $this->find($id);
	}

	public function exhibitions()
	{
		return $this->belongsToMany('App\Exhibition', 'artist_to_exhibition', 'artist_id', 'exhibition_id');
	}
}
