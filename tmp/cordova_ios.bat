
REM Created by App Builder v2016.190
REM More information at https://www.davidesperalta.com/

@ECHO OFF
CLS

REM Add the iOS platform for our app
CALL cordova platform add ios

REM Add the Whitelist plugin for our app
CALL cordova plugin add cordova-plugin-whitelist

REM Pause the script execution, so we can view the script results
PAUSE
