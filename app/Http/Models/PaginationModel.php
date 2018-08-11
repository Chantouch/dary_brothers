<?php namespace App\Http\Models;

class PaginationModel {

	public $nProductToShowPerPage = 12;
	public $nPage = 0;
	public $hasMore = false;

	public function __construct($itemCount) {
		if ($itemCount > $this->nProductToShowPerPage) {
			$this->hasMore = true;
			$this->nPage = ceil($itemCount/$this->nProductToShowPerPage);
		}
	}

}