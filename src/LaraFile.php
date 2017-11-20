<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaraFile extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'lara-files';

	/**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id'];

	/**
	 * The accessors to append to the model's array form.
	 *
	 * @var array
	 */
	protected $appends = ['url'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'path',
		'hash_name',
		'name',
		'mime',
		'type',
		'larafilesable_type',
		'larafilesable_id',
		'description',
		'public',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'larafilesable_type',
		'larafilesable_id',
		'hash_name',
		'path',
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\MorphTo
	 */
	public function larafilesable() {

		return $this->morphTo();
	}

	/**
	 * Delete the model from the database.
	 *
	 * @return bool|null
	 *
	 * @throws \Exception
	 */
	public function delete() {

		#$fileHandler = new  FileHandler;
		#$fileHandler->removeFile( public_path( $this->path . '/' . $this->hash_name . '.' . $this->mime) );
		return parent::delete();
	}

	/**
	 * Return full url to the file
	 *
	 * @return string
	 */
	public function getUrlAttribute() {

		return url('/') . '/' . $this->attributes['path'] . '/' . $this->attributes['hash_name'] . '.' . $this->attributes['mime'];
	}

}
