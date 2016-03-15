<?php namespace App\Library;

class Bspaginator {

	/* Base URL  */
	var $base_url = '';

	/* Table Headers */
	var $headers = array();

	/* Pagination */
	var $per_page = 5;
	var $cur_page =  1;
	var $total_rows	= 0;
	var $offset = 0;

	public function config($options = array()){
		if (count($options) > 0) {
			foreach ($options as $key => $val) {
				if (isset($this->$key)) {
					$this->$key = $val;
				}
			}
		}

		$this->offset = ($this->cur_page - 1) * $this->per_page;
	}

	public function pagination_links(){

		if($this->total_rows < $this->per_page){
			return "
				<ul class='pagination'>
					<li class='active'><a href='#'>First</a></li>
					".$this->generate_link(1, '1')."
					<li class='active'><a href='#'>Last</a></li>
				</ul>";
		}

		$total_pages = ceil($this->total_rows / $this->per_page) + 1;

		$show_first = ($this->cur_page > 2);
		$show_prev = ($this->cur_page > 1 && $total_pages > 2);
		$show_next = ($this->cur_page < ($total_pages - 1)  && $total_pages > 3);
		$show_last = $this->cur_page < (($total_pages - 1) - 1);

		$html = "";

		$html .= "<ul class='pagination'>";

		if($show_first){
			$html .= $this->generate_link(1, 'First');
		}

		if($show_prev){
			$prev = $this->cur_page - 1;
			$html .= $this->generate_link($prev, 'Prev');
		}

		$start = ($this->cur_page > 2) ? ($this->cur_page - 2) : 1 ;
		$end = ($this->cur_page < ($total_pages - 2)) ? ($this->cur_page + 3) : $total_pages;

		for($i = $start; $i < $end; $i++){
			if($this->cur_page == $i){
				$html .= $this->generate_link($i, $i, 1);
			} else{
				$html .= $this->generate_link($i, $i);
			}
		}

		if($show_next){
			$next = $this->cur_page + 1;
			$html .= $this->generate_link($next, 'Next');
		}

		if($show_last){
			$html .= $this->generate_link($total_pages - 1, 'Last');
		}

		$html .= "</ul>";
		$html .= "";

		return $html;
	}

	private function generate_link($page_num, $link_text = null, $active = false){

		if(is_null($link_text)){
			$link_text = $page_num;
		}

		$link = "<li>";
		if($active){
			$link = "<li class='active'>";
		}

		$url = $this->base_url."?page=".$page_num;

		$link .= "<a href='".$url."'>".$link_text."</a>";
		$link .= "</li>";

		return $link;
	}
}
