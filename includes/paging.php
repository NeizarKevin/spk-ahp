<?php

class Paging
{
	function cari_posisi($limit = 1, $page = 1)
	{
		if (empty($page) || $page < 1) {
			$position = 0;
		} else {
			$position = ($page - 1) * $limit;
		}
		return $position;
	}

	function get_total_page($jumrec = 1, $limit = 1)
	{
		$total_page = ceil($jumrec / $limit);
		return $total_page;
	}

	function get_link($attribut = "", $jumrec = 1, $limit = 1, $page = 1)
	{
		$total_page = $this->get_total_page($jumrec, $limit);

		if ($page < 1) {
			$page = 1;
		}
		//create first link
		$page_link = "<li><a href='index.php?" . $attribut . "1' title='Awal'>&laquo;</a></li>";
		//create link paging
		for ($i = 1; $i <= $total_page; $i++) {
			if ($i == $page) {
				$page_link .= "<li class='active'><a href='index.php?" . $attribut . "$i' title='Halaman $i'>$i</a></li>";
			} else {
				$page_link .= "<li><a href='index.php?" . $attribut . "$i' title='Halaman $i'>$i</a></li>";
			}
		}
		//create last link
		$page_link .= "<li><a href='index.php?" . $attribut . $total_page . "' title='Akhir' class='paging_next'>&raquo;</a></li>";

		return $page_link;
	}

	function show($attribut = "", $jumrec = 1, $limit = 1, $page = 1)
	{
		$total_page = $this->get_total_page($jumrec, $limit);
		if ($total_page < 1)
			return false;

		return "<ul class='pagination'>" . $this->get_link($attribut, $jumrec, $limit, $page) . "</ul>";
	}
}
