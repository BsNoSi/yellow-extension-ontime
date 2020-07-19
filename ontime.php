<?php
// OnTime extension, https://github.cmo/bsnosi/yellow-extension-ontime
// Copyright ©2018-now Norbert Simon, https://nosi.de for
// YELLOW Copyright ©2013-now Datenstrom, http://datenstrom.se
// idea based on http://github.com/schulle4u/yellow-plugin-global (version 0.7.5)
// This file may be used and distributed under the terms of the public license.
// requires YELLOW 0.8.13 or higher

class YellowOnTime
{
	const VERSION = '1.2.1';
	const TYPE = "feature";
    public $yellow;         //access to API
	
	// Handle initialisation
	function onLoad($yellow)
	{
		$this->yellow = $yellow;
	}

	// Handle page content parsing of custom block
	public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
		if($name=="ontime"  && ($type=="block" || $type=="inline"))
		{
			list($location, $End, $Start, $mode) = $this->yellow->toolbox->getTextArguments($text);
			
			if(empty($text)) {
					$output = '<b>[ontime (/ontime/)file-url end-of-display start_of_display display_mode(1=more)]</b>';
			}
			else {
				$location = '/ontime/' . $location;
				$page = $this->yellow->content->find($location);
				if(!$page) {
					$output .= '<h3><u><a href="/edit' . $location . '">'.$this->yellow->text->get("ontime_NoLocation") .'</a></u></h3>';
				}
				else {
					$End = $End?:date("Y-m-d");
					$Start = $Start?:date("Y-m-d");
					$currdate = date("Y-m-d");
				
					if (($currdate >= $Start) AND ($currdate <= $End)) {
						if(strempty($mode)) $mode = "0";
						$output .= '<div class="'.$name.'">' . "\n";
							if($mode == '1') {
								$output .= '<h2><a href="'.$page->getLocation(true).'">'.$page->getHtml('title')."</a></h2>\n";
								$output .= $this->yellow->toolbox->createTextDescription($page->getContent(), 0, false, '<!--more-->', ' <a href="'.$page->getLocation(true).'">'.$this->yellow->text->getHtml('blogMore').'</a>');
							} else {
								$output .= $page->getContent();
							}
						$output .= "</div>\n";
					}
				
					else {
						$output = "";
					}
				}
			}
		}	
		
		return $output;
	
	}
}
?>
