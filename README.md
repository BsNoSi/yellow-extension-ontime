# Yellow Extension OnTime 

> Tested with Yellow 0.815

### V 1.2.2

OnTime shows external file content for a dedicated time period.

## The Idea Behind

There are messages with a defined "life time", for example christmas greetings. With this plugin you can set a start and end date where such messages are shown and hidden again.


## Install

1. Download and install [Datenstrom Yellow CMS](https://github.com/datenstrom/yellow/).
2. Download [OnTime extension](https://github.com/BsNoSi/yellow-extension-ontime/archive/master.zip ).  If you are using Safari, right click and select 'Download file as'.
3. Copy the `yellow-plugin-ontime-master.zip` into the `system/plugins` folder.
 
To uninstall simply delete the [extension files](extension.ini).

## Usage

      [ontime file-url end_of_display start_of_display display_mode]

All but the first parameter is optional. Without start and end message will be shown instantly and with no expiration.

`file_url`: ontime creates by default a folder `/content/ontime` where all files dealed by ontime are expected. Be aware that you have to name the file equally to the title or titleslug.

`end_of_display`: The default is a "hide message" situation, showing it directly after creating. 

`start_of_display`: If a message shall reveal in the future you can set a beginning date.

`display_mode`: Set to `1` the file is not embedded into the page but shown as a teaser (up to `[--more--]`) including title and `read more` link.

You can use only start or end or both together. Format for both is `yyyy-mm-dd`. The beginning or ending date is included which means `start_of_display` starts at midmight of the given date, `end_of_date` hides the message at midnight of given date.


## Examples

Display external content

      [ontime file-url]
	
Display external content up to and including an end date:   

      [ontime file-url end_of_display]

Displays external content from a specific date:     

     [ontime file-url - start_of_display]

Show external content from a start date to an end date:     

     [ontime flie-url end_of_display start_of_display]

Show teaser from external file with a beginning and ending date:

     [ontime flie-url end_of_display start_of_display 1]



> [ontime] without any parameter shows a bold parameter list in preview. If not bold you should check if imgpop is correctly installed.

#### Hints

- You can create the `ontimer` entry and use the `preview` function of the editor to show the link. If you open this link in another tab of your browser YELLOW offers creation of this file (if logged in).
- There is *no* default file. If no file is given you will find an huge warning.

## Examples

      [ontime /externals/holidays  2018-09-22  2018-08-30]

Shows *content* of file between 2018-08-30 and 2018-09-22.

      [ontime /externals/holidays  -  2018-08-30]

Shows *content* starting at 2018-08-30.

      [ontime /externals/holidays  -  2018-08-30 1]

Shows *teaser* starting at 2018-08-30.

      [ontime /externals/holidays  2018-08-30 - 1]

Shows *teaser* ending at 2018-08-30.

## History

2020-10-13: Code revised and tested with version 0.8.15 of YELLOW. Improvement of description (this file). Split of language into language files.

2020-07-19: Alignments to new API (0.8.13 ar higher), simplfication fo langauge file (combined into one, French added)

## Developer

[Norbert Simon](https://nosi.de) 
