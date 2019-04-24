# Yellow Extension OnTime 

### V 1.2.0  (requires YELLOW 0.8.4 or higher)

OnTime shows external file content for a dedicated time period.

## The Idea Behind

I needed a method to hide parts of a website after a certain date, eg to remove a holiday announcement at the end of the absence. The first atempt was [ShowTimer](https://github.com/BsNoSi/yellow-plugin-showtimer). It hides a text area in comments.

Inspired by (and based on) the [Global](https://github.com/schulle4u/yellow-plugin-global) plugin I created *OnTime* with some more options and features (see below).

## How do I Install This?

1. Download and install [Datenstrom Yellow CMS](https://github.com/datenstrom/yellow/).
2. Download [OnTime extension](https://github.com/BsNoSi/yellow-extension-ontime/archive/master.zip ).  If you are using Safari, right click and select 'Download file as'.
3. Copy the `yellow-plugin-ontime-master.zip` into the `system/plugins` folder.
 
To uninstall simply delete the [extension files](update.ini).

## How do I use the ontime plugin?

There are several methods to use `ontime`:

- Display external content
 `[ontime file-url]`
 - Display external content up to and including an end date:   
  `[ontime file-url end_of_display]`
- Displays external content from a specific date:     
 `[ontime file-url - start_of_display]`
 - Show external content from a start date to an end date:     
  `[ontime flie-url end_of_display start_of_display]`

Optionally the `displaymode` can be used to switch between content and teaser display

#### Available Parameters

`[ontime file-url end_of_display start_of_display displaymode]`

**file-url** is the external file. 

> If this file does not exist a link for creation is generated. This link is deliberately eye-catching and ugly.

**end_of_display** (optional) including this date the external file is shown

**start_of_display** (optional) without end date the display starts on the specific date with no end

> Without start or end date the given file is always shown. 

**displaymode** (optional) if `1` the external file is shown as teaser (up to `[--more--]` including title)

> [ontime] without any parameter shows a bold parameter list in preview. If not bold you should check if imgpop is correctly installed.

#### Hints

- You can create the `ontimer` entry and use the `preview` function of the editor to show the link. If you open this link in another tab of your browser YELLOW offers creation of this file (if logged in).
- There is *no* default file or path. If no file is given you will find an huge warning on your page!

## Examples

`[ontime /externals/holidays  2018-09-22  2018-08-30]`

Shows *content* of file between 2018-08-30 and 2018-09-22.

`[ontime /externals/holidays  -  2018-08-30]`

Shows *content* starting at 2018-08-30.

`[ontime /externals/holidays  -  2018-08-30 1]`

Shows *teaser* starting at 2018-08-30.

`[ontime /externals/holidays  2018-08-30 - 1]`

Shows *teaser* ending at 2018-08-30.

## Developer

[Norbert Simon](https://nosi.de) based on [schulle4u yellow-global-plugin](http://github.com/schulle4u/yellow-plugin-global) 
