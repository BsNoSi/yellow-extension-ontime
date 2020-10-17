# Yellow Extension OnTime 

Version 1.2.3

> Tested with core version 0.8.23

## Application

OnTime displays a message on the page for a settable period of time, optionally with a start and/or end date. This can be only an insertion or a teaser with link to a page with the complete content. This is useful for Christmas greetings, for example, or for the opening hours on public holidays or the display of annual holidays.


## Install

1. Download and install [Datenstrom Yellow CMS](https://github.com/datenstrom/yellow/).
2. Download [OnTime extension](https://github.com/BsNoSi/yellow-extension-ontime/archive/master.zip ).  If you are using Safari, right click and select 'Download file as'.
3. Copy the `yellow-plugin-ontime-master.zip` into the `system/plugins` folder.
 
To uninstall simply delete the [extension files](extension.ini).

## Usage

      [ontime file-url end_of_display start_of_display display_mode]

| Parameter | Function |
| :---:  | :--- |
| file_url | *required*: Ontime creates by default a folder `/content/ontime` where all files dealed by ontime are expected. Be aware that you have to name the file equally to the title or titleslug. |
| end_of_display | *optional*: Last *included* date of display ending at midnight, format "YYYY-MM-DD" |
| start_of_display | *optional*: First *included* date of display starting at 0:00 a.m., format "YYYY-MM-DD" |
| display_mode | *optional*: Set to `1` the file is not embedded into the page but shown as a teaser (up to `[--more--]`) including title and `read more` link. |

- All but the first parameter is optional.
- You can use only start or end or both together.

## Examples

Display external content instantly and eternally:

      [ontime file-url]  
	[ontime /openinghours]
	
Display external content from now on up to and including an end date:   

      [ontime file-url end_of_display] 
	[ontime /oldlocation 2020-10-17]

Displays external content eternally from a future date:     

     [ontime file-url - start_of_display] 
     [onetime /newlocation - 2020-10-18]

Show external content in a given period:     

     [ontime flie-url end_of_display start_of_display] 
     [ontime /holidays 2020-10-30 2020-10-20]

Show teaser from external file in a given period:

     [ontime flie-url end_of_display start_of_display 1] 
     [ontime /holidayreview 2020-11-30 2020-11-01]


## Hints

- You can create the `ontimer` entry and use the `preview` function of the editor to show the link. If you open this link in another tab of your browser YELLOW offers creation of this file (if logged in).
- There is *no* default file. If no file is given you will find an huge warning.


## History

2020-10-17: API changes applied.

2020-10-13: Code revised and tested with version 0.8.15 of YELLOW. Improvement of description (this file). Split of language into language files.

2020-07-19: Alignments to new API (0.8.13 ar higher), simplfication fo langauge file (combined into one, French added)

## Developer

[Norbert Simon](https://nosi.de) 
