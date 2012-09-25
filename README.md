codiad_filegrep
===============

This is a component for codiad that enables you to search unopen files
To install, 
1) install the current version of Codiad from https://github.com/Fluidbyte/Codiad ( Notice it must be version after 9/25/2012 )
2) Create a directory in your [root]/components directory called grepfind
3) put these files in that directory, ( so there should be a [root]/components/grepfind/init.js NOT [root]/components/grepfind/codiad_grepfind/init.js
4) edit your [root]/components/loader.json and add ,"grepfind" befor the ], Mine currently looks like

["keybindings","user","project","filemanager","editor","active","poller","color_picker","grepfind"]

Yours may be different depending on if you have other modules enabled

To Use, Right click on a folder in the filemanager window
goto find
Search for what ever you want to find
click on the item you wish to goto, it will open the file and go to the line

Known Bugs/Upcomming features
- On large files, It does not go to the line
- No visual feedback on it actually searching, so for large projects it may look like it is doing nothing
- No hotkey 