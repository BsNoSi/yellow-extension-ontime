<?php
// OnTime plugin, https://github.cmo/bsnosi/yellow-plugin-ontime
// based on http://github.com/schulle4u/yellow-plugin-global (version 0.7.5)
// Copyright (c) 2013-2018 Datenstrom, http://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowOnTime
{
	const VERSION = "1.1";
	var $yellow;			//access to API
	
	// Handle initialisation
	function onLoad($yellow)
	{
		$this->yellow = $yellow;
	}

	// Handle page content parsing of custom block
	function onParseContentBlock($page, $name, $text, $shortcut)
	{
		$output = NULL;
		if($name=="ontime" && $shortcut)
		{
			list($location, $End, $Start, $mode) = $this->yellow->toolbox->getTextArgs($text);
			
			if(empty($location)) {
					$output = "<h1>No file location → add it!</h1>";
				    goto TheEnd;
			}
			
			$page = $this->yellow->pages->find($location);
			if(!$page) {
				$output .= "<h1><a href=\"/edit" . $location . "\">Create missing file!</a></h1>";
				goto TheEnd;
			}	
			
			if (empty($End)) { $End = date("Y-m-d"); }
			if (empty($Start)) { $Start = date("Y-m-d"); }
			
			$currdate = strtotime(date("Y-m-d"));
			
			if (($currdate >= $Start) AND ($currdate <= $End)) {
				if(strempty($mode)) $mode = "0";
				$output .= "<div class=\"".$name."\">\n";
					if($mode == "1") {
						$output .= "<h2><a href=\"".$page->getLocation(true)."\">".$page->getHtml("title")."</a></h2>\n";
						$output .= $this->yellow->toolbox->createTextDescription($page->getContent(), 0, false, "<!--more-->", " <a href=\"".$page->getLocation(true)."\">".$this->yellow->text->getHtml("blogMore")."</a>");
					} else {
						$output .= $page->getContent();
					}
				$output .= "</div>\n";
			}
			else {
				$output = "";
			}
		}
		TheEnd:
		return $output;
	}
}

$yellow->plugins->register("ontime", "YellowOnTime", YellowOnTime::VERSION);
?>
