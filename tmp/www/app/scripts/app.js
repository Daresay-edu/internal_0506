/*!
 * This file is part of App Builder
 * For licenses information see App Builder help
 * ©2016 App Builder - https://www.davidesperalta.com
 */

window.App = {};

window.App.Plugins = {};

window.App.Utils = (function() {

  var
    lastPlaySound = new Audio();

  return {

    strLen: function(text) {
      return text.length;
    },

    trimStr: function(text) {
      return text.trim();
    },

    strSearch: function(text, query) {
      return text.search(query);
    },

    splitStr: function(text, separator) {
      return text.split(separator);
    },

    subStr: function(text, start, count) {
      return text.substr(start, count);
    },

    strReplace: function(text, from, to) {
      return text.replace(from, to);
    },

    strReplaceAll: function(text, from, to) {
      return text.split(from).join(to);
    },

    playSound: function(mp3Url, oggUrl) {
      if (lastPlaySound.canPlayType('audio/mpeg')) {
        lastPlaySound.src = mp3Url;
        lastPlaySound.type = 'audio/mpeg';
      } else {
        lastPlaySound.src = oggUrl;
        lastPlaySound.type = 'audio/ogg';
      }
      lastPlaySound.play();
    },

    stopSound: function() {
      lastPlaySound.pause();
      lastPlaySound.currentTime = 0.0;
    },

    sleep: function(milliseconds) {
      var
        start = new Date().getTime();
      for (var i = 0; i < 1e7; i++) {
        if ((new Date().getTime() - start) > milliseconds){
          break;
        }
      }
    }
  };
})();

window.App.Modal = (function() {

  var
    stack = [],
    current = 0;

  return {

    insert: function(name) {
      current = stack.length;
      stack[current] = {};
      stack[current].name = name;
      stack[current].instance = null;
      return stack[current];
    },

    removeCurrent: function() {
      stack.slice(current, 1);
      current = current - 1;
      current = (current < 0) ? 0 : current;
    },

    currentInstance: function() {
      if (stack[current]) {
        return stack[current].instance;
      } else {
        return null;
      }
    },

    closeAll: function() {
      for (var i = stack.length-1; i >= 0; i--) {
        stack[i].instance.dismiss();
      }
      stack = [];
      current = 0;
    }
  };
})();

window.App.Debugger = (function() {

  return {

    isRunning: function() {
      return (typeof window.external === 'object')
       && ('hello' in window.external);
    },

    log: function(text, aType, lineNum) {
      if (window.App.Debugger.isRunning()) {
        external.log('' + text, aType || 'info', lineNum || 0);
      } else {
        console.log(text);
      }
    },

    watch: function(varName, newValue, oldValue) {
      if (window.App.Debugger.isRunning()) {
        if (angular.isArray(newValue)) {
          external.watch('', varName, newValue.toString(), 'array');
        } else if (angular.isObject(newValue)) {
          angular.forEach(newValue, function(value, key) {
            if (!angular.isFunction(value)) {
              try {
                external.watch(varName, key, value.toString(), typeof value);
              } catch(exception) {}
            }
          });
        } else if (angular.isString(newValue) || angular.isNumber(newValue)) {
          external.watch('', varName, newValue.toString(), typeof newValue);
        }
      }
    }
  };
})();

window.App.Module = angular.module
(
  'AppModule',
  [
    'ngRoute',
    'ngTouch',
    'ngSanitize',
    'blockUI',
    'chart.js',
    'ngOnload',
    'ui.bootstrap',
    'angular-canvas-gauge',
    'com.2fdevs.videogular',
    'com.2fdevs.videogular.plugins.controls',
    'AppCtrls'
  ]
);

window.App.Module.run(function() {
  FastClick.attach(document.body);
});

window.App.Module.directive('ngImageLoad',
[
  '$parse',

  function($parse) {
    return {
      restrict: 'A',
      link: function($scope, el, attrs) {
        el.bind('load', function(event) {
          var
            fn = $parse(attrs.ngImageLoad);
          fn($scope, {$event: event});
        });
      }
    }
  }
]);

window.App.Module.directive('ngContextMenu',
[
  '$parse',

  function($parse) {
    return {
      restrict: 'A',
      link: function($scope, el, attrs) {
        el.bind('contextmenu', function(event) {
          var
            fn = $parse(attrs.ngContextMenu);
          fn($scope, {$event: event});
        });
      }
    }
  }
]);

window.App.Module.directive('bindFile',
[
  function() {
    return {
      restrict: 'A',
      require: 'ngModel',
      link: function($scope, el, attrs, ngModel) {
        el.bind('change', function(event) {
          ngModel.$setViewValue(event.target.files[0]);
          $scope.$apply();
        });

        $scope.$watch(function () {
          return ngModel.$viewValue;
        }, function(value) {
          if (!value) {
            el.val('');
          }
        });
      }
    }
  }
]);

window.App.Module.config
([
  '$compileProvider',

  function($compileProvider) {
    $compileProvider.debugInfoEnabled(window.App.Debugger.isRunning());
    $compileProvider.imgSrcSanitizationWhitelist
     (/^\s*(https?|blob|ftp|mailto|file|tel|app|data:image|moz-extension|chrome-extension|ms-appx-web):/);
  }
]);

window.App.Module.config
([
  '$httpProvider',

  function($httpProvider) {
    if (!$httpProvider.defaults.headers.get) {
      $httpProvider.defaults.headers.get = {};
    }
    if (!$httpProvider.defaults.headers.post) {
      $httpProvider.defaults.headers.post = {};
    }
    $httpProvider.defaults.headers.get['Pragma'] = 'no-cache';
    $httpProvider.defaults.headers.get['Cache-Control'] = 'no-cache';
    $httpProvider.defaults.headers.get['If-Modified-Since'] = 'Mon, 26 Jul 1997 05:00:00 GMT';
    $httpProvider.defaults.headers.post['Content-Type'] = undefined;
    $httpProvider.defaults.transformRequest.unshift(function(data) {
      var
        frmData = new FormData();
      angular.forEach(data, function(value, key) {
        frmData.append(key, value);
      });
      return frmData;
    });
}]);

window.App.Module.config
([
  '$provide',

  function($provide) {
    $provide.decorator('$exceptionHandler',
    ['$injector',
      function($injector) {
        return function(exception, cause) {
          var
            $rs = $injector.get('$rootScope');

          if (!angular.isUndefined(cause)) {
            exception.message += ' (caused by "'+cause+'")';
          }

          $rs.App.LastError = exception.message;
          $rs.OnAppError();
          $rs.App.LastError = '';

          if (window.App.Debugger.isRunning()) {
            throw exception;
          } else {
            if (window.console) {
              window.console.error(exception);
            }
          }
        };
      }
    ]);
  }
]);

window.App.Module.config
([
  'blockUIConfig',

  function(blockUIConfig) {
    blockUIConfig.delay = 0;
    blockUIConfig.autoBlock = false;
    blockUIConfig.resetOnException = true;
    blockUIConfig.message = 'Please wait';
    blockUIConfig.autoInjectBodyBlock = false;
    blockUIConfig.blockBrowserNavigation = true;
  }
]);

window.App.Module.config
([
  '$routeProvider',

  function($routeProvider) {
    $routeProvider.otherwise({redirectTo: "/Calculator"})
    .when("/Calculator", {controller: "CalculatorCtrl", templateUrl: "app/views/Calculator.html"})
    .when("/About", {controller: "AboutCtrl", templateUrl: "app/views/About.html"})
    .when("/Comments", {controller: "CommentsCtrl", templateUrl: "app/views/Comments.html"});
  }
]);

window.App.Module.service
(
  'AppEventsService',

  ['$rootScope',

  function($rootScope) {

    function setAppHideEvent() {
      window.document.addEventListener('visibilitychange', function(event) {
        if (window.document.hidden) {
          window.App.Event = event;
          $rootScope.OnAppHide();
          $rootScope.$apply();
        }
      }, false);
    }
    
    function setAppShowEvent() {
      window.document.addEventListener('visibilitychange', function(event) {
        if (!window.document.hidden) {
          window.App.Event = event;
          $rootScope.OnAppShow();
          $rootScope.$apply();
        }
      }, false);
    }    

    function setAppOnlineEvent() {
      window.addEventListener('online', function(event) {
        window.App.Event = event;
        $rootScope.OnAppOnline();
      }, false);
    }

    function setAppOfflineEvent() {
      window.addEventListener('offline', function(event) {
        window.App.Event = event;
        $rootScope.OnAppOffline();
      }, false);
    }

    function setAppResizeEvent() {
      window.addEventListener('resize', function(event) {
        window.App.Event = event;
        $rootScope.OnAppResize();
      }, false);
    }

    function setAppPauseEvent() {
      if (!window.App.Cordova) {
        document.addEventListener('pause', function(event) {
          window.App.Event = event;
          $rootScope.OnAppPause();
          $rootScope.$apply();
        }, false);
      }
    }

    function setAppReadyEvent() {
      if (window.App.Cordova) {
        angular.element(window.document).ready(function(event) {
          window.App.Event = event;
          $rootScope.OnAppReady();
        });
      } else {
        document.addEventListener('deviceready', function(event) {
          window.App.Event = event;
          $rootScope.OnAppReady();
        }, false);
      }
    }

    function setAppResumeEvent() {
      if (!window.App.Cordova) {
        document.addEventListener('resume', function(event) {
          window.App.Event = event;
          $rootScope.OnAppResume();
          $rootScope.$apply();
        }, false);
      }
    }

    function setAppBackButtonEvent() {
      if (!window.App.Cordova) {
        document.addEventListener('backbutton', function(event) {
          window.App.Event = event;
          $rootScope.OnAppBackButton();
        }, false);
      }
    }

    function setAppMenuButtonEvent() {
      if (!window.App.Cordova) {
        document.addEventListener('deviceready', function(event) {
          // http://stackoverflow.com/q/30309354
          navigator.app.overrideButton('menubutton', true);
          document.addEventListener('menubutton', function(event) {
            window.App.Event = event;
            $rootScope.OnAppMenuButton();
          }, false);
        }, false);
      }
    }

    function setAppOrientationEvent() {
      window.addEventListener('orientationchange', function(event) {
        window.App.Event = event;
        $rootScope.OnAppOrientation();
      }, false);
    }

    function setAppVolumeUpEvent() {
      if (!window.App.Cordova) {
        document.addEventListener('volumeupbutton', function(event) {
          window.App.Event = event;
          $rootScope.OnAppVolumeUpButton();
        }, false);
      }
    }

    function setAppVolumeDownEvent() {
      if (!window.App.Cordova) {
        document.addEventListener('volumedownbutton', function(event) {
          window.App.Event = event;
          $rootScope.OnAppVolumeDownButton();
        }, false);
      }
    }

    function setAppKeyUpEvent() {
      document.addEventListener('keyup', function(event) {
        window.App.Event = event;
        $rootScope.OnAppKeyUp();
      }, false);
    }

    function setAppKeyDownEvent() {
      document.addEventListener('keydown', function(event) {
        window.App.Event = event;
        $rootScope.OnAppKeyDown();
      }, false);
    }

    function setAppMouseUpEvent() {
      document.addEventListener('mouseup', function(event) {
        window.App.Event = event;
        $rootScope.OnAppMouseUp();
      }, false);
    }

    function setAppMouseDownEvent() {
      document.addEventListener('mousedown', function(event) {
        window.App.Event = event;
        $rootScope.OnAppMouseDown();
      }, false);
    }

    function setAppViewChangeEvent() {
      angular.element(window.document).ready(function(event) {
        $rootScope.$on('$locationChangeStart', function(event, next, current) {
          window.App.Event = event;
          $rootScope.App.NextView = next.substring(next.lastIndexOf('/') + 1);
          $rootScope.App.CurrentView = current.substring(current.lastIndexOf('/') + 1);
          $rootScope.OnAppViewChange();
        });
      });
    }
    
    function setAppWebExtMsgEvent() {
      if (window.chrome) {
        window.chrome.runtime.onMessage.addListener(function (message, sender, responseFunc) {
          $rootScope.App.WebExtMessage = message;
          $rootScope.OnAppWebExtensionMsg();
        });
      }    
    }    

    return {
      init : function() {
        //setAppHideEvent();
        //setAppShowEvent();
        setAppReadyEvent();
        //setAppPauseEvent();
        //setAppKeyUpEvent();
        //setAppResumeEvent();
        //setAppResizeEvent();
        //setAppOnlineEvent();
        //setAppKeyDownEvent();
        //setAppMouseUpEvent();
        //setAppOfflineEvent();
        //setAppVolumeUpEvent();
        //setAppMouseDownEvent();
        //setAppVolumeDownEvent();
        //setAppBackButtonEvent();
        //setAppMenuButtonEvent();
        //setAppViewChangeEvent();
        //setAppOrientationEvent();
        //setAppWebExtMsgEvent();
      }
    };
  }
]);

window.App.Module.service
(
  'AppGlobalsService',

  ['$rootScope', '$filter',

  function($rootScope, $filter) {

    var setGlobals = function() {
      $rootScope.App = {};
      var s = function(name, method) {
        Object.defineProperty($rootScope.App, name, { get: method });
      };
      s('Online', function() { return navigator.onLine; });
      s('WeekDay', function() { return new Date().getDay(); });
      s('Event', function() { return window.App.Event || ''; });
      s('OuterWidth', function() { return window.outerWidth; });
      s('InnerWidth', function() { return window.innerWidth; });
      s('InnerHeight', function() { return window.innerHeight; });
      s('OuterHeight', function() { return window.outerHeight; });
      s('Timestamp', function() { return new Date().getTime(); });
      s('Day', function() { return $filter('date')(new Date(), 'dd'); });
      s('Fullscreen', function() { return BigScreen.element !== null; });
      s('Hour', function() { return $filter('date')(new Date(), 'hh'); });
      s('Week', function() { return $filter('date')(new Date(), 'ww'); });
      s('Month', function() { return $filter('date')(new Date(), 'MM'); });
      s('Year', function() { return $filter('date')(new Date(), 'yyyy'); });
      s('Hour24', function() { return $filter('date')(new Date(), 'HH'); });
      s('Minutes', function() { return $filter('date')(new Date(), 'mm'); });
      s('Seconds', function() { return $filter('date')(new Date(), 'ss'); });
      s('DayShort', function() { return $filter('date')(new Date(), 'd'); });
      s('WeekShort', function() { return $filter('date')(new Date(), 'w'); });
      s('HourShort', function() { return $filter('date')(new Date(), 'h'); });
      s('YearShort', function() { return $filter('date')(new Date(), 'yy'); });
      s('MonthShort', function() { return $filter('date')(new Date(), 'M'); });
      s('Hour24Short', function() { return $filter('date')(new Date(), 'H'); });
      s('MinutesShort', function() { return $filter('date')(new Date(), 'm'); });
      s('SecondsShort', function() { return $filter('date')(new Date(), 's'); });
      s('Milliseconds', function() { return $filter('date')(new Date(), 'sss'); });
      s('Cordova', function() {  return angular.isUndefined(window.App.Cordova) ? 'true' : 'false' });
      s('Orientation', function() { return window.innerWidth >= window.innerHeight ? 'landscape' : 'portrait'; });
      s('ActiveControl', function() { return (window.document.activeElement !== null) ? window.document.activeElement.id : '' });

      
$rootScope.App.IdleIsIdling = "false";
$rootScope.App.IdleIsRunning = "false";
$rootScope.App.ID = "com.appbuilder.calculator";
$rootScope.App.Name = "Calculator";
$rootScope.App.Version = "1.0.0";
$rootScope.App.Description = "Another App Builder app";
$rootScope.App.AuthorName = "App Builder";
$rootScope.App.AuthorEmail = "info@davidesperalta.com";
$rootScope.App.AuthorUrl = "https://www.davidesperalta.com/";
$rootScope.App.LanguageCode = "en";
$rootScope.App.TextDirection = "ltr";
$rootScope.App.Scaled = "scaled";
$rootScope.App.Theme = "Default";
$rootScope.App.Themes = ["Cerulean", "Default", "Lumen", "Paper", "Readable", "Simplex", "Spacelab", "Superhero", "United", "Yeti"];
if ($rootScope.App.Themes.indexOf("Default") == -1) { $rootScope.App.Themes.push("Default"); }
    };

    return {
      init : function() {
        setGlobals();
      }
    };
  }
]);

window.App.Module.service
(
  'AppControlsService',

  ['$rootScope', '$http', '$sce',

  function($rootScope, $http, $sce) {

    var setControlVars = function() {
      

$rootScope.Button1 = {};
$rootScope.Button1.ABRole = 2001;
$rootScope.Button1.Hidden = "";
$rootScope.Button1.Title = "";
$rootScope.Button1.TabIndex = -1;
$rootScope.Button1.TooltipText = "";
$rootScope.Button1.TooltipPos = "top";
$rootScope.Button1.PopoverText = "";
$rootScope.Button1.PopoverTitle = "";
$rootScope.Button1.PopoverEvent = "mouseenter";
$rootScope.Button1.PopoverPos = "top";
$rootScope.Button1.Badge = "";
$rootScope.Button1.Icon = "";
$rootScope.Button1.Text = "7";
$rootScope.Button1.Class = "btn btn-default btn-lg ";
$rootScope.Button1.Disabled = "";

$rootScope.Button2 = {};
$rootScope.Button2.ABRole = 2001;
$rootScope.Button2.Hidden = "";
$rootScope.Button2.Title = "";
$rootScope.Button2.TabIndex = -1;
$rootScope.Button2.TooltipText = "";
$rootScope.Button2.TooltipPos = "top";
$rootScope.Button2.PopoverText = "";
$rootScope.Button2.PopoverTitle = "";
$rootScope.Button2.PopoverEvent = "mouseenter";
$rootScope.Button2.PopoverPos = "top";
$rootScope.Button2.Badge = "";
$rootScope.Button2.Icon = "";
$rootScope.Button2.Text = "8";
$rootScope.Button2.Class = "btn btn-default btn-lg ";
$rootScope.Button2.Disabled = "";

$rootScope.Button3 = {};
$rootScope.Button3.ABRole = 2001;
$rootScope.Button3.Hidden = "";
$rootScope.Button3.Title = "";
$rootScope.Button3.TabIndex = -1;
$rootScope.Button3.TooltipText = "";
$rootScope.Button3.TooltipPos = "top";
$rootScope.Button3.PopoverText = "";
$rootScope.Button3.PopoverTitle = "";
$rootScope.Button3.PopoverEvent = "mouseenter";
$rootScope.Button3.PopoverPos = "top";
$rootScope.Button3.Badge = "";
$rootScope.Button3.Icon = "";
$rootScope.Button3.Text = "9";
$rootScope.Button3.Class = "btn btn-default btn-lg ";
$rootScope.Button3.Disabled = "";

$rootScope.Button4 = {};
$rootScope.Button4.ABRole = 2001;
$rootScope.Button4.Hidden = "";
$rootScope.Button4.Title = "";
$rootScope.Button4.TabIndex = -1;
$rootScope.Button4.TooltipText = "";
$rootScope.Button4.TooltipPos = "top";
$rootScope.Button4.PopoverText = "";
$rootScope.Button4.PopoverTitle = "";
$rootScope.Button4.PopoverEvent = "mouseenter";
$rootScope.Button4.PopoverPos = "top";
$rootScope.Button4.Badge = "";
$rootScope.Button4.Icon = "";
$rootScope.Button4.Text = "4";
$rootScope.Button4.Class = "btn btn-default btn-lg ";
$rootScope.Button4.Disabled = "";

$rootScope.Button5 = {};
$rootScope.Button5.ABRole = 2001;
$rootScope.Button5.Hidden = "";
$rootScope.Button5.Title = "";
$rootScope.Button5.TabIndex = -1;
$rootScope.Button5.TooltipText = "";
$rootScope.Button5.TooltipPos = "top";
$rootScope.Button5.PopoverText = "";
$rootScope.Button5.PopoverTitle = "";
$rootScope.Button5.PopoverEvent = "mouseenter";
$rootScope.Button5.PopoverPos = "top";
$rootScope.Button5.Badge = "";
$rootScope.Button5.Icon = "";
$rootScope.Button5.Text = "5";
$rootScope.Button5.Class = "btn btn-default btn-lg ";
$rootScope.Button5.Disabled = "";

$rootScope.Button6 = {};
$rootScope.Button6.ABRole = 2001;
$rootScope.Button6.Hidden = "";
$rootScope.Button6.Title = "";
$rootScope.Button6.TabIndex = -1;
$rootScope.Button6.TooltipText = "";
$rootScope.Button6.TooltipPos = "top";
$rootScope.Button6.PopoverText = "";
$rootScope.Button6.PopoverTitle = "";
$rootScope.Button6.PopoverEvent = "mouseenter";
$rootScope.Button6.PopoverPos = "top";
$rootScope.Button6.Badge = "";
$rootScope.Button6.Icon = "";
$rootScope.Button6.Text = "6";
$rootScope.Button6.Class = "btn btn-default btn-lg ";
$rootScope.Button6.Disabled = "";

$rootScope.Button7 = {};
$rootScope.Button7.ABRole = 2001;
$rootScope.Button7.Hidden = "";
$rootScope.Button7.Title = "";
$rootScope.Button7.TabIndex = -1;
$rootScope.Button7.TooltipText = "";
$rootScope.Button7.TooltipPos = "top";
$rootScope.Button7.PopoverText = "";
$rootScope.Button7.PopoverTitle = "";
$rootScope.Button7.PopoverEvent = "mouseenter";
$rootScope.Button7.PopoverPos = "top";
$rootScope.Button7.Badge = "";
$rootScope.Button7.Icon = "";
$rootScope.Button7.Text = "1";
$rootScope.Button7.Class = "btn btn-default btn-lg ";
$rootScope.Button7.Disabled = "";

$rootScope.Button8 = {};
$rootScope.Button8.ABRole = 2001;
$rootScope.Button8.Hidden = "";
$rootScope.Button8.Title = "";
$rootScope.Button8.TabIndex = -1;
$rootScope.Button8.TooltipText = "";
$rootScope.Button8.TooltipPos = "top";
$rootScope.Button8.PopoverText = "";
$rootScope.Button8.PopoverTitle = "";
$rootScope.Button8.PopoverEvent = "mouseenter";
$rootScope.Button8.PopoverPos = "top";
$rootScope.Button8.Badge = "";
$rootScope.Button8.Icon = "";
$rootScope.Button8.Text = "2";
$rootScope.Button8.Class = "btn btn-default btn-lg ";
$rootScope.Button8.Disabled = "";

$rootScope.Button9 = {};
$rootScope.Button9.ABRole = 2001;
$rootScope.Button9.Hidden = "";
$rootScope.Button9.Title = "";
$rootScope.Button9.TabIndex = -1;
$rootScope.Button9.TooltipText = "";
$rootScope.Button9.TooltipPos = "top";
$rootScope.Button9.PopoverText = "";
$rootScope.Button9.PopoverTitle = "";
$rootScope.Button9.PopoverEvent = "mouseenter";
$rootScope.Button9.PopoverPos = "top";
$rootScope.Button9.Badge = "";
$rootScope.Button9.Icon = "";
$rootScope.Button9.Text = "3";
$rootScope.Button9.Class = "btn btn-default btn-lg ";
$rootScope.Button9.Disabled = "";

$rootScope.Button10 = {};
$rootScope.Button10.ABRole = 2001;
$rootScope.Button10.Hidden = "";
$rootScope.Button10.Title = "";
$rootScope.Button10.TabIndex = -1;
$rootScope.Button10.TooltipText = "";
$rootScope.Button10.TooltipPos = "top";
$rootScope.Button10.PopoverText = "";
$rootScope.Button10.PopoverTitle = "";
$rootScope.Button10.PopoverEvent = "mouseenter";
$rootScope.Button10.PopoverPos = "top";
$rootScope.Button10.Badge = "";
$rootScope.Button10.Icon = "";
$rootScope.Button10.Text = "0";
$rootScope.Button10.Class = "btn btn-default btn-lg ";
$rootScope.Button10.Disabled = "";

$rootScope.Button11 = {};
$rootScope.Button11.ABRole = 2001;
$rootScope.Button11.Hidden = "";
$rootScope.Button11.Title = "";
$rootScope.Button11.TabIndex = -1;
$rootScope.Button11.TooltipText = "";
$rootScope.Button11.TooltipPos = "top";
$rootScope.Button11.PopoverText = "";
$rootScope.Button11.PopoverTitle = "";
$rootScope.Button11.PopoverEvent = "mouseenter";
$rootScope.Button11.PopoverPos = "top";
$rootScope.Button11.Badge = "";
$rootScope.Button11.Icon = "";
$rootScope.Button11.Text = ".";
$rootScope.Button11.Class = "btn btn-default btn-lg ";
$rootScope.Button11.Disabled = "";

$rootScope.Button12 = {};
$rootScope.Button12.ABRole = 2001;
$rootScope.Button12.Hidden = "";
$rootScope.Button12.Title = "";
$rootScope.Button12.TabIndex = -1;
$rootScope.Button12.TooltipText = "";
$rootScope.Button12.TooltipPos = "top";
$rootScope.Button12.PopoverText = "";
$rootScope.Button12.PopoverTitle = "";
$rootScope.Button12.PopoverEvent = "mouseenter";
$rootScope.Button12.PopoverPos = "top";
$rootScope.Button12.Badge = "";
$rootScope.Button12.Icon = "glyphicon glyphicon-arrow-left";
$rootScope.Button12.Text = "";
$rootScope.Button12.Class = "btn btn-warning btn-md ";
$rootScope.Button12.Disabled = "";

$rootScope.Button13 = {};
$rootScope.Button13.ABRole = 2001;
$rootScope.Button13.Hidden = "";
$rootScope.Button13.Title = "";
$rootScope.Button13.TabIndex = -1;
$rootScope.Button13.TooltipText = "";
$rootScope.Button13.TooltipPos = "top";
$rootScope.Button13.PopoverText = "";
$rootScope.Button13.PopoverTitle = "";
$rootScope.Button13.PopoverEvent = "mouseenter";
$rootScope.Button13.PopoverPos = "top";
$rootScope.Button13.Badge = "";
$rootScope.Button13.Icon = "";
$rootScope.Button13.Text = "C";
$rootScope.Button13.Class = "btn btn-danger btn-lg ";
$rootScope.Button13.Disabled = "";

$rootScope.Button14 = {};
$rootScope.Button14.ABRole = 2001;
$rootScope.Button14.Hidden = "";
$rootScope.Button14.Title = "";
$rootScope.Button14.TabIndex = -1;
$rootScope.Button14.TooltipText = "";
$rootScope.Button14.TooltipPos = "top";
$rootScope.Button14.PopoverText = "";
$rootScope.Button14.PopoverTitle = "";
$rootScope.Button14.PopoverEvent = "mouseenter";
$rootScope.Button14.PopoverPos = "top";
$rootScope.Button14.Badge = "";
$rootScope.Button14.Icon = "glyphicon glyphicon-plus";
$rootScope.Button14.Text = "";
$rootScope.Button14.Class = "btn btn-primary btn-xs ";
$rootScope.Button14.Disabled = "";

$rootScope.Button15 = {};
$rootScope.Button15.ABRole = 2001;
$rootScope.Button15.Hidden = "";
$rootScope.Button15.Title = "";
$rootScope.Button15.TabIndex = -1;
$rootScope.Button15.TooltipText = "";
$rootScope.Button15.TooltipPos = "top";
$rootScope.Button15.PopoverText = "";
$rootScope.Button15.PopoverTitle = "";
$rootScope.Button15.PopoverEvent = "mouseenter";
$rootScope.Button15.PopoverPos = "top";
$rootScope.Button15.Badge = "";
$rootScope.Button15.Icon = "";
$rootScope.Button15.Text = "=";
$rootScope.Button15.Class = "btn btn-success btn-lg ";
$rootScope.Button15.Disabled = "";

$rootScope.Button16 = {};
$rootScope.Button16.ABRole = 2001;
$rootScope.Button16.Hidden = "";
$rootScope.Button16.Title = "";
$rootScope.Button16.TabIndex = -1;
$rootScope.Button16.TooltipText = "";
$rootScope.Button16.TooltipPos = "top";
$rootScope.Button16.PopoverText = "";
$rootScope.Button16.PopoverTitle = "";
$rootScope.Button16.PopoverEvent = "mouseenter";
$rootScope.Button16.PopoverPos = "top";
$rootScope.Button16.Badge = "";
$rootScope.Button16.Icon = "glyphicon glyphicon-minus";
$rootScope.Button16.Text = "";
$rootScope.Button16.Class = "btn btn-primary btn-xs ";
$rootScope.Button16.Disabled = "";

$rootScope.Button17 = {};
$rootScope.Button17.ABRole = 2001;
$rootScope.Button17.Hidden = "";
$rootScope.Button17.Title = "";
$rootScope.Button17.TabIndex = -1;
$rootScope.Button17.TooltipText = "";
$rootScope.Button17.TooltipPos = "top";
$rootScope.Button17.PopoverText = "";
$rootScope.Button17.PopoverTitle = "";
$rootScope.Button17.PopoverEvent = "mouseenter";
$rootScope.Button17.PopoverPos = "top";
$rootScope.Button17.Badge = "";
$rootScope.Button17.Icon = "glyphicon glyphicon-remove";
$rootScope.Button17.Text = "";
$rootScope.Button17.Class = "btn btn-primary btn-xs ";
$rootScope.Button17.Disabled = "";

$rootScope.Button18 = {};
$rootScope.Button18.ABRole = 2001;
$rootScope.Button18.Hidden = "";
$rootScope.Button18.Title = "";
$rootScope.Button18.TabIndex = -1;
$rootScope.Button18.TooltipText = "";
$rootScope.Button18.TooltipPos = "top";
$rootScope.Button18.PopoverText = "";
$rootScope.Button18.PopoverTitle = "";
$rootScope.Button18.PopoverEvent = "mouseenter";
$rootScope.Button18.PopoverPos = "top";
$rootScope.Button18.Badge = "";
$rootScope.Button18.Icon = "";
$rootScope.Button18.Text = "/";
$rootScope.Button18.Class = "btn btn-primary btn-lg ";
$rootScope.Button18.Disabled = "";

$rootScope.ResultInput = {};
$rootScope.ResultInput.ABRole = 3001;
$rootScope.ResultInput.Hidden = "";
$rootScope.ResultInput.Value = "0";
$rootScope.ResultInput.Title = "";
$rootScope.ResultInput.TabIndex = -1;
$rootScope.ResultInput.TooltipText = "";
$rootScope.ResultInput.TooltipPos = "top";
$rootScope.ResultInput.PopoverText = "";
$rootScope.ResultInput.PopoverEvent = "mouseenter";
$rootScope.ResultInput.PopoverTitle = "";
$rootScope.ResultInput.PopoverPos = "top";
$rootScope.ResultInput.PlaceHolder = "";
$rootScope.ResultInput.Class = "form-control input-lg text-right";
$rootScope.ResultInput.Disabled = "";
$rootScope.ResultInput.Required = "";
$rootScope.ResultInput.ReadOnly = "";

$rootScope.HistoryTextarea = {};
$rootScope.HistoryTextarea.ABRole = 9001;
$rootScope.HistoryTextarea.Hidden = "";
$rootScope.HistoryTextarea.Value = "";
$rootScope.HistoryTextarea.Title = "";
$rootScope.HistoryTextarea.TabIndex = -1;
$rootScope.HistoryTextarea.TooltipText = "";
$rootScope.HistoryTextarea.TooltipPos = "top";
$rootScope.HistoryTextarea.PopoverText = "";
$rootScope.HistoryTextarea.PopoverEvent = "mouseenter";
$rootScope.HistoryTextarea.PopoverTitle = "";
$rootScope.HistoryTextarea.PopoverPos = "top";
$rootScope.HistoryTextarea.PlaceHolder = "";
$rootScope.HistoryTextarea.Class = "form-control input-sm ";
$rootScope.HistoryTextarea.Disabled = "";
$rootScope.HistoryTextarea.Required = "";
$rootScope.HistoryTextarea.ReadOnly = "true";

$rootScope.Button19 = {};
$rootScope.Button19.ABRole = 2001;
$rootScope.Button19.Hidden = "";
$rootScope.Button19.Title = "Clear the historial";
$rootScope.Button19.TabIndex = -1;
$rootScope.Button19.TooltipText = "";
$rootScope.Button19.TooltipPos = "top";
$rootScope.Button19.PopoverText = "";
$rootScope.Button19.PopoverTitle = "";
$rootScope.Button19.PopoverEvent = "mouseenter";
$rootScope.Button19.PopoverPos = "top";
$rootScope.Button19.Badge = "";
$rootScope.Button19.Icon = "glyphicon glyphicon-trash";
$rootScope.Button19.Text = "Clear";
$rootScope.Button19.Class = "btn btn-link btn-xs ";
$rootScope.Button19.Disabled = "";

$rootScope.Button22 = {};
$rootScope.Button22.ABRole = 2001;
$rootScope.Button22.Hidden = "";
$rootScope.Button22.Title = "";
$rootScope.Button22.TabIndex = -1;
$rootScope.Button22.TooltipText = "";
$rootScope.Button22.TooltipPos = "top";
$rootScope.Button22.PopoverText = "";
$rootScope.Button22.PopoverTitle = "";
$rootScope.Button22.PopoverEvent = "mouseenter";
$rootScope.Button22.PopoverPos = "top";
$rootScope.Button22.Badge = "";
$rootScope.Button22.Icon = "";
$rootScope.Button22.Text = "©2016 David Esperalta\x27s App Builder";
$rootScope.Button22.Class = "btn btn-link btn-xs ";
$rootScope.Button22.Disabled = "";

$rootScope.Button23 = {};
$rootScope.Button23.ABRole = 2001;
$rootScope.Button23.Hidden = "";
$rootScope.Button23.Title = "";
$rootScope.Button23.TabIndex = -1;
$rootScope.Button23.TooltipText = "";
$rootScope.Button23.TooltipPos = "top";
$rootScope.Button23.PopoverText = "";
$rootScope.Button23.PopoverTitle = "";
$rootScope.Button23.PopoverEvent = "mouseenter";
$rootScope.Button23.PopoverPos = "top";
$rootScope.Button23.Badge = "";
$rootScope.Button23.Icon = "glyphicon glyphicon-ok";
$rootScope.Button23.Text = "Ok";
$rootScope.Button23.Class = "btn btn-success btn-md ";
$rootScope.Button23.Disabled = "";

$rootScope.Image1 = {};
$rootScope.Image1.ABRole = 8001;
$rootScope.Image1.Hidden = "";
$rootScope.Image1.Image = "Images\abicon.png";
$rootScope.Image1.Class = "";
$rootScope.Image1.Title = "";
$rootScope.Image1.TooltipText = "";
$rootScope.Image1.TooltipPos = "top";
$rootScope.Image1.PopoverText = "";
$rootScope.Image1.PopoverEvent = "mouseenter";
$rootScope.Image1.PopoverTitle = "";
$rootScope.Image1.PopoverPos = "top";

$rootScope.AppAbout = {};
$rootScope.AppAbout.ABRole = 6001;
$rootScope.AppAbout.Hidden = "";
$rootScope.AppAbout.Class = "";
$rootScope.AppAbout.Title = "";
$rootScope.AppAbout.TooltipText = "";
$rootScope.AppAbout.TooltipPos = "top";
$rootScope.AppAbout.PopoverText = "";
$rootScope.AppAbout.PopoverEvent = "mouseenter";
$rootScope.AppAbout.PopoverTitle = "";
$rootScope.AppAbout.PopoverPos = "top";

$rootScope.Button24 = {};
$rootScope.Button24.ABRole = 2001;
$rootScope.Button24.Hidden = "";
$rootScope.Button24.Title = "";
$rootScope.Button24.TabIndex = -1;
$rootScope.Button24.TooltipText = "";
$rootScope.Button24.TooltipPos = "top";
$rootScope.Button24.PopoverText = "";
$rootScope.Button24.PopoverTitle = "";
$rootScope.Button24.PopoverEvent = "mouseenter";
$rootScope.Button24.PopoverPos = "top";
$rootScope.Button24.Badge = "";
$rootScope.Button24.Icon = "glyphicon glyphicon-send";
$rootScope.Button24.Text = "Feedback";
$rootScope.Button24.Class = "btn btn-warning btn-md ";
$rootScope.Button24.Disabled = "";

$rootScope.ThemesSelect = {};
$rootScope.ThemesSelect.ABRole = 20004;
$rootScope.ThemesSelect.Hidden = "";
$rootScope.ThemesSelect.Items = [];
$rootScope.ThemesSelect.ItemIndex = 0;
$rootScope.ThemesSelect.Title = "";
$rootScope.ThemesSelect.TabIndex = -1;
$rootScope.ThemesSelect.TooltipText = "";
$rootScope.ThemesSelect.TooltipPos = "top";
$rootScope.ThemesSelect.PopoverText = "";
$rootScope.ThemesSelect.PopoverEvent = "mouseenter";
$rootScope.ThemesSelect.PopoverTitle = "";
$rootScope.ThemesSelect.PopoverPos = "top";
$rootScope.ThemesSelect.Class = "form-control input-sm ";
$rootScope.ThemesSelect.Disabled = "";
$rootScope.ThemesSelect.Required = "";

$rootScope.NameInput = {};
$rootScope.NameInput.ABRole = 3001;
$rootScope.NameInput.Hidden = "";
$rootScope.NameInput.Value = "";
$rootScope.NameInput.Title = "";
$rootScope.NameInput.TabIndex = 1;
$rootScope.NameInput.TooltipText = "";
$rootScope.NameInput.TooltipPos = "top";
$rootScope.NameInput.PopoverText = "";
$rootScope.NameInput.PopoverEvent = "mouseenter";
$rootScope.NameInput.PopoverTitle = "";
$rootScope.NameInput.PopoverPos = "top";
$rootScope.NameInput.PlaceHolder = "Write your name here";
$rootScope.NameInput.Class = "form-control input-sm ";
$rootScope.NameInput.Disabled = "";
$rootScope.NameInput.Required = "";
$rootScope.NameInput.ReadOnly = "";

$rootScope.EmailInput = {};
$rootScope.EmailInput.ABRole = 3005;
$rootScope.EmailInput.Hidden = "";
$rootScope.EmailInput.Value = "";
$rootScope.EmailInput.Title = "";
$rootScope.EmailInput.TabIndex = 2;
$rootScope.EmailInput.TooltipText = "";
$rootScope.EmailInput.TooltipPos = "top";
$rootScope.EmailInput.PopoverText = "";
$rootScope.EmailInput.PopoverEvent = "mouseenter";
$rootScope.EmailInput.PopoverTitle = "";
$rootScope.EmailInput.PopoverPos = "top";
$rootScope.EmailInput.PlaceHolder = "Write your email here";
$rootScope.EmailInput.Class = "form-control input-sm ";
$rootScope.EmailInput.Disabled = "";
$rootScope.EmailInput.Required = "";
$rootScope.EmailInput.ReadOnly = "";

$rootScope.CommentsTextarea = {};
$rootScope.CommentsTextarea.ABRole = 9001;
$rootScope.CommentsTextarea.Hidden = "";
$rootScope.CommentsTextarea.Value = "";
$rootScope.CommentsTextarea.Title = "";
$rootScope.CommentsTextarea.TabIndex = 3;
$rootScope.CommentsTextarea.TooltipText = "";
$rootScope.CommentsTextarea.TooltipPos = "top";
$rootScope.CommentsTextarea.PopoverText = "";
$rootScope.CommentsTextarea.PopoverEvent = "mouseenter";
$rootScope.CommentsTextarea.PopoverTitle = "";
$rootScope.CommentsTextarea.PopoverPos = "top";
$rootScope.CommentsTextarea.PlaceHolder = "Write your comments here";
$rootScope.CommentsTextarea.Class = "form-control input-sm ";
$rootScope.CommentsTextarea.Disabled = "";
$rootScope.CommentsTextarea.Required = "";
$rootScope.CommentsTextarea.ReadOnly = "";

$rootScope.SendButton = {};
$rootScope.SendButton.ABRole = 2001;
$rootScope.SendButton.Hidden = "";
$rootScope.SendButton.Title = "";
$rootScope.SendButton.TabIndex = 4;
$rootScope.SendButton.TooltipText = "";
$rootScope.SendButton.TooltipPos = "top";
$rootScope.SendButton.PopoverText = "";
$rootScope.SendButton.PopoverTitle = "";
$rootScope.SendButton.PopoverEvent = "mouseenter";
$rootScope.SendButton.PopoverPos = "top";
$rootScope.SendButton.Badge = "";
$rootScope.SendButton.Icon = "glyphicon glyphicon-send";
$rootScope.SendButton.Text = "Send";
$rootScope.SendButton.Class = "btn btn-success btn-md ";
$rootScope.SendButton.Disabled = "";

$rootScope.CancelButton = {};
$rootScope.CancelButton.ABRole = 2001;
$rootScope.CancelButton.Hidden = "";
$rootScope.CancelButton.Title = "";
$rootScope.CancelButton.TabIndex = 5;
$rootScope.CancelButton.TooltipText = "";
$rootScope.CancelButton.TooltipPos = "top";
$rootScope.CancelButton.PopoverText = "";
$rootScope.CancelButton.PopoverTitle = "";
$rootScope.CancelButton.PopoverEvent = "mouseenter";
$rootScope.CancelButton.PopoverPos = "top";
$rootScope.CancelButton.Badge = "";
$rootScope.CancelButton.Icon = "glyphicon glyphicon-arrow-left";
$rootScope.CancelButton.Text = "Cancel";
$rootScope.CancelButton.Class = "btn btn-warning btn-md ";
$rootScope.CancelButton.Disabled = "";

$rootScope.Progressbar = {};
$rootScope.Progressbar.ABRole = 5001;
$rootScope.Progressbar.Hidden = "true";
$rootScope.Progressbar.Title = "";
$rootScope.Progressbar.TooltipText = "";
$rootScope.Progressbar.TooltipPos = "top";
$rootScope.Progressbar.PopoverText = "";
$rootScope.Progressbar.PopoverEvent = "mouseenter";
$rootScope.Progressbar.PopoverTitle = "";
$rootScope.Progressbar.PopoverPos = "top";
$rootScope.Progressbar.Class = "progress-bar progress-bar-info progress-bar-striped active ";
$rootScope.Progressbar.Percentage = 100;

$rootScope.HttpClient = {};
$rootScope.HttpClient.ABRole = 30001;
$rootScope.HttpClient.Status = 0;
$rootScope.HttpClient.StatusText = "";
$rootScope.HttpClient.Response = "";
$rootScope.HttpClient.Request = {};
$rootScope.HttpClient.Request.data = {};
$rootScope.HttpClient.Request.headers = {};
$rootScope.HttpClient.Request.url = "https://www.davidesperalta.com/Humm/Sites/Main/Views/Data/AppBuilder/Samples/Calculator/feedback.php";
$rootScope.HttpClient.Request.method = "POST";
$rootScope.HttpClient.Transform = "data";
    };

    return {
      init : function() {
        setControlVars();
      }
    };
  }
]);

window.App.Module.service
(
  'AppPluginsService',

  ['$rootScope',

  function($rootScope) {

    var setupPlugins = function() {
      Object.keys(window.App.Plugins).forEach(function(plugin) {
        if (angular.isFunction(window.App.Plugins[plugin])) {
          plugin = window.App.Plugins[plugin].call();
          if (angular.isFunction(plugin.PluginSetupEvent)) {
            plugin.PluginSetupEvent();
          }
          if (angular.isFunction(plugin.PluginDocumentReadyEvent)) {
            angular.element(window.document).ready(
             plugin.PluginDocumentReadyEvent);
          }
          if (angular.isUndefined(window.App.Cordova) &&
           angular.isFunction(plugin.PluginAppReadyEvent)) {
             document.addEventListener('deviceready',
              plugin.PluginAppReadyEvent, false);
          }
        }
      });
    };

    return {
      init : function() {
        setupPlugins();
      }
    };
  }
]);

window.App.Ctrls = angular.module('AppCtrls', []);

window.App.Ctrls.controller
(
  'AppCtrl',

  ['$scope', '$rootScope', '$location', '$uibModal', '$http', '$sce', '$window', '$document', 'blockUI', '$uibPosition',
    'AppEventsService', 'AppGlobalsService', 'AppControlsService', 'AppPluginsService',

  function($scope, $rootScope, $location, $uibModal, $http, $sce, $window, $document, blockUI, $uibPosition,
   AppEventsService, AppGlobalsService, AppControlsService, AppPluginsService) {

    window.App.Scope = $scope;
    window.App.RootScope = $rootScope;

    AppEventsService.init();
    AppGlobalsService.init();
    AppControlsService.init();
    AppPluginsService.init();

    $scope.showView = function(viewName) {
      window.App.Modal.closeAll();
      $rootScope.App.DialogView = '';
      $location.path(viewName);
    };

    $scope.replaceView = function(viewName) {
      window.App.Modal.closeAll();
      $rootScope.App.DialogView = '';
      $location.path(viewName).replace();
    };

    $scope.showModalView = function(viewName, callback) {
      var
        execCallback = null,
        modal = window.App.Modal.insert(viewName);

      $rootScope.App.DialogView = viewName;

      modal.instance = $uibModal.open
      ({
        size: 'lg',
        scope: $scope,
        keyboard: false,
        backdrop: 'static',
        windowClass: 'dialogView',
        controller: viewName + 'Ctrl',
        templateUrl: 'app/views/' + viewName + '.html'
      });
      execCallback = function(modalResult) {
        window.App.Modal.removeCurrent();
        if (angular.isFunction(callback)) {
          callback(modalResult);
        }
      };
      modal.instance.result.then(
        function(modalResult){execCallback(modalResult);},
        function(modalResult){execCallback(modalResult);}
      );
    };

    $scope.closeModalView = function(modalResult) {
      var
        modal = window.App.Modal.currentInstance();

      $rootScope.App.DialogView = '';

      if (modal !== null) {
        window.App.Modal.currentInstance().close(modalResult);
        window.App.Modal.removeCurrent();
      }
    };

    $scope.loadVariables = function(text) {

      var
        setVar = function(name, value) {
          var
            newName = '',
            dotPos = name.indexOf('.');

          if (dotPos != -1) {
            newName = name.split('.');
            if (newName.length === 2) {
              $rootScope[newName[0].trim()][newName[1].trim()] = value;
            } else if (newName.length === 3) {
              // We support up to 3 levels here
              $rootScope[newName[0].trim()][newName[1].trim()][newName[2].trim()] = value;
            }
          } else {
            $rootScope[name] = value;
          }
        };

      var
        lineLen = 0,
        varName = '',
        varValue = '',
        isArray = false,
        text = text || '',
        separatorPos = -1;

      angular.forEach(text.split('\n'), function(value, key) {
        separatorPos = value.indexOf('=');
        if (separatorPos != -1) {
          varName = value.substr(0, separatorPos).trim();
          if (varName != '') {
            varValue = value.substr(separatorPos + 1, value.length).trim();
            isArray = varValue.substr(0, 1) == '|';
            if (!isArray) {
              setVar(varName, varValue);
            } else {
              setVar(varName, varValue.substr(1, varValue.length).split('|'));
            }
          }
        }
      });
    };

    $scope.alertBox = function(content, type) {
      var
        aType = type || 'info',
        modal = window.App.Modal.insert('builder/views/alertBox.html');

      modal.instance = $uibModal.open
      ({
        size: 'sm',
        scope: $scope,
        keyboard: true,
        controller: 'AppDialogsCtrl',
        templateUrl: 'builder/views/alertBox.html',
        resolve: {
          properties: function() {
            return {
              Type: aType,
              Content: content
            };
          }
        }
      });
      modal.instance.result.then(null, function() {
        window.App.Modal.removeCurrent();
      });
    };

    $scope.inputBox = function(header, buttons,
     inputVar, defaultVal, type, callback) {
      var
        execCallback = null,
        aType = type || 'info',
        aButtons = buttons || 'Ok|Cancel',
        modal = window.App.Modal.insert('builder/views/inputBox.html');

      $rootScope[inputVar] = defaultVal;

      modal.instance = $uibModal.open
      ({
        size: 'md',
        scope: $scope,
        keyboard: false,
        backdrop: 'static',
        controller: 'AppDialogsCtrl',
        templateUrl: 'builder/views/inputBox.html',
        resolve: {
          properties: function() {
            return {
              Type: aType,
              Header: header,
              Buttons: aButtons.split('|'),
              InputVar: $rootScope.inputVar
            };
          }
        }
      });
      execCallback = function(modalResult) {
        window.App.Modal.removeCurrent();
        if (angular.isFunction(callback)) {
          callback(modalResult, $rootScope[inputVar]);
        }
      };
      modal.instance.result.then(
        function(modalResult){execCallback(modalResult);},
        function(modalResult){execCallback(modalResult);}
      );
    };

    $scope.messageBox = function(header,
     content, buttons, type, callback) {
      var
        execCallback = null,
        aType = type || 'info',
        aButtons = buttons || 'Ok',
        modal = window.App.Modal.insert('builder/views/messageBox.html');

      modal.instance = $uibModal.open
      ({
        size: 'md',
        scope: $scope,
        keyboard: false,
        backdrop: 'static',
        controller: 'AppDialogsCtrl',
        templateUrl: 'builder/views/messageBox.html',
        resolve: {
          properties: function() {
            return {
              Type: aType,
              Header: header,
              Content: content,
              Buttons: aButtons.split('|')
            };
          }
        }
      });
      execCallback = function(modalResult) {
        window.App.Modal.removeCurrent();
        if (angular.isFunction(callback)) {
          callback(modalResult);
        }
      };
      modal.instance.result.then(
        function(modalResult){execCallback(modalResult);},
        function(modalResult){execCallback(modalResult);}
      );
    };

    $scope.alert = function(title, text) {
      if (window.App.Cordova) {
        window.alert(text);
      } else {
        navigator.notification.alert(
         text, null, title, null);
      }
    };

    $scope.confirm = function(title, text, callback) {
      if (window.App.Cordova) {
        callback(window.confirm(text));
      } else {
        navigator.notification.confirm
        (
          text,
          function(btnIndex) {
            callback(btnIndex === 1);
          },
          title,
          null
        );
      }
    };

    $scope.prompt = function(title, text, defaultVal, callback) {
      if (window.App.Cordova) {
        var
          result = window.prompt(text, defaultVal);
        callback(result !== null, result);
      } else {
        navigator.notification.prompt(
          text,
          function(result) {
            callback(result.buttonIndex === 1, result.input1);
          },
          title,
          null,
          defaultVal
        );
      }
    };

    $scope.beep = function(times) {
      if (window.App.Cordova) {
        window.App.Utils.playSound
        (
          'builder/sounds/beep/beep.mp3',
          'builder/sounds/beep/beep.ogg'
        );
      } else {
        navigator.notification.beep(times);
      }
    };

    $scope.vibrate = function(milliseconds) {
      if (window.App.Cordova) {
        var
          body = angular.element(document.body);
        body.addClass('animated shake');
        setTimeout(function() {
          body.removeClass('animated shake');
        }, milliseconds);
      } else {
        navigator.vibrate(milliseconds);
      }
    };

    $scope.setLocalOption = function(key, value) {
      window.localStorage.setItem(key, value);
    };

    $scope.getLocalOption = function(key) {
      return window.localStorage.getItem(key) || '';
    };

    $scope.removeLocalOption = function(key) {
      window.localStorage.removeItem(key);
    };

    $scope.clearLocalOptions = function() {
      window.localStorage.clear();
    };

    $scope.log = function(text, lineNum) {
      window.App.Debugger.log(text, lineNum);
    };

    $window.TriggerAppOrientationEvent = function() {
      $rootScope.OnAppOrientation();
      $rootScope.$apply();
    };

    $scope.idleStart = function(seconds) {

      $scope.idleStop();
      $rootScope.App.IdleIsIdling = false;

      if($rootScope.App._IdleSeconds != seconds) {
        $rootScope.App._IdleSeconds = seconds;
      }

      $document.on('mousemove mousedown mousewheel keydown scroll touchstart touchmove DOMMouseScroll', $scope._resetIdle);

      $rootScope.App.IdleIsRunning = true;

      $rootScope.App._IdleTimer = setTimeout(function() {
        $rootScope.App.IdleIsIdling = true;
        $rootScope.OnAppIdleStart();
        $scope.$apply();
      }, $rootScope.App._IdleSeconds * 1000);
    };

    $scope._resetIdle = function() {
      if($rootScope.App.IdleIsIdling) {
        $rootScope.OnAppIdleEnd();
        $rootScope.App.IdleIsIdling = false;
        $scope.$apply();
      }
      $scope.idleStart($rootScope.App._IdleSeconds);
    };

    $scope.idleStop = function() {
      $document.off('mousemove mousedown mousewheel keydown scroll touchstart touchmove DOMMouseScroll', $scope._resetIdle);
      clearTimeout($rootScope.App._IdleTimer);
      $rootScope.App.IdleIsRunning = false;
    };

    $scope.trustSrc = function(src) {
      return $sce.trustAsResourceUrl(src);
    };

    $scope.openWindow = function(url, showLocation) {
      var
        options = 'location=';

      if (showLocation) {
        options += 'yes';
      } else {
        options += 'no';
      }

      if (window.App.Cordova) {
        options += ', width=500, height=500, resizable=yes, scrollbars=yes';
      }

      return window.open(encodeURI(url), '_blank', options);
    };

    $scope.closeWindow = function(winRef) {
      if (angular.isObject(winRef) && angular.isFunction(winRef.close)) {
        winRef.close();
      }
    };    

   
$scope.InsertNumber = function(Number)
{

if (""+$rootScope.Operator+"" == "") {

$rootScope.FirstNumber = ""+$rootScope.FirstNumber+""+Number+"";

$rootScope.ResultInput.Value = $rootScope.FirstNumber;

} else {

$rootScope.SecondNumber = ""+$rootScope.SecondNumber+""+Number+"";

$rootScope.ResultInput.Value = $rootScope.SecondNumber;

}
};

$scope.SetOperator = function(AOperator)
{

$rootScope.Operator = AOperator;

if ($rootScope.FirstNumber == "") {

$rootScope.FirstNumber = $rootScope.ResultInput.Value;

} else if ($rootScope.SecondNumber != "") {

$scope.Calculate();

}
};

$scope.Calculate = function()
{

if(($rootScope.FirstNumber != '') && ($rootScope.SecondNumber != '') && ($rootScope.Operator != '')) {

$rootScope.Expression = ""+$rootScope.FirstNumber+" "+$rootScope.Operator+" "+$rootScope.SecondNumber+"";

$rootScope.ResultInput.Value = Parser.parse($rootScope.Expression).evaluate();

$scope.AddHistory($rootScope.Expression, $rootScope.ResultInput.Value);

$scope.InitVariables();

}
};

$scope.InitVariables = function()
{

$rootScope.Operator = "";

$rootScope.FirstNumber = "";

$rootScope.SecondNumber = "";

$rootScope.HistoryTextarea.Value = $scope.getLocalOption("Historial");
};

$scope.AddHistory = function(Expression, Result)
{

if ($rootScope.HistoryTextarea.Value == "") {

$rootScope.HistoryTextarea.Value = ""+Expression+" = "+Result+"\n";

} else {

$rootScope.HistoryTextarea.Value = ""+Expression+" = "+Result+"\n"+$rootScope.HistoryTextarea.Value+"";

}

$scope.setLocalOption("Historial", $rootScope.HistoryTextarea.Value);
};

$scope.PrepareAppTheme = function()
{

$rootScope.ThemesSelect.Items = $rootScope.App.Themes.concat($rootScope.ThemesSelect.Items);

$rootScope.Theme = $scope.getLocalOption("SavedTheme");

if(($rootScope.Theme != '') && ($rootScope.Theme != $rootScope.App.Theme)) {

angular.element(document.getElementById("appTheme")).attr("href", "builder/styles/" + angular.lowercase($rootScope.Theme) + ".css");
angular.element(document.querySelector("body")).removeClass($rootScope.App.Theme.toLowerCase());
$rootScope.App.Theme = $rootScope.Theme;
angular.element(document.querySelector("body")).addClass($rootScope.App.Theme.toLowerCase());

}

if ($rootScope.Theme == "") {

$rootScope.Theme = "Default";

}

$rootScope.ItemIndex = $rootScope.ThemesSelect.Items.indexOf($rootScope.Theme);

$rootScope.ThemesSelect.ItemIndex = parseFloat($rootScope.ItemIndex);
};

$scope.SaveAppTheme = function()
{

$rootScope.Theme = $rootScope.ThemesSelect.Items[$rootScope.ThemesSelect.ItemIndex];

angular.element(document.getElementById("appTheme")).attr("href", "builder/styles/" + angular.lowercase($rootScope.Theme) + ".css");
angular.element(document.querySelector("body")).removeClass($rootScope.App.Theme.toLowerCase());
$rootScope.App.Theme = $rootScope.Theme;
angular.element(document.querySelector("body")).addClass($rootScope.App.Theme.toLowerCase());

$scope.setLocalOption("SavedTheme", $rootScope.Theme);
};

}]);

window.App.Ctrls.controller
(
  'AppDialogsCtrl',

  ['$scope', 'properties',

  function($scope, properties) {
    $scope.Properties = properties;
  }
]);

window.App.Ctrls.controller
(
  'AppEventsCtrl',

  ['$scope', '$rootScope', '$location', '$uibModal', '$http', '$sce', '$window', '$document', 'blockUI', '$uibPosition',

  function($scope, $rootScope, $location, $uibModal, $http, $sce, $window, $document, blockUI, $uibPosition) {

    $rootScope.OnAppHide = function() {
      //__APP_HIDE_EVENT
    };
    
    $rootScope.OnAppShow = function() {
      //__APP_SHOW_EVENT
    };    

    $rootScope.OnAppReady = function() {
      
$scope.InitVariables();

$scope.PrepareAppTheme();

    };

    $rootScope.OnAppPause = function() {
      //__APP_PAUSE_EVENT
    };

    $rootScope.OnAppKeyUp = function() {
      //__APP_KEY_UP_EVENT
    };

    $rootScope.OnAppKeyDown = function() {
      //__APP_KEY_DOWN_EVENT
    };

    $rootScope.OnAppMouseUp = function() {
      //__APP_MOUSE_UP_EVENT
    };

    $rootScope.OnAppMouseDown = function() {
      //__APP_MOUSE_DOWN_EVENT
    };

    $rootScope.OnAppError = function() {
      //__APP_ERROR_EVENT
    };

    $rootScope.OnAppResize = function() {
      //__APP_RESIZE_EVENT
    };

    $rootScope.OnAppResume = function() {
      //__APP_RESUME_EVENT
    };

    $rootScope.OnAppOnline = function() {
      //__APP_ONLINE_EVENT
    };

    $rootScope.OnAppOffline = function() {
      //__APP_OFFLINE_EVENT
    };

    $rootScope.OnAppIdleEnd = function() {
      //__APP_IDLE_END_EVENT
    };

    $rootScope.OnAppIdleStart = function() {
      //__APP_IDLE_START_EVENT
    };

    $rootScope.OnAppBackButton = function() {
      //__APP_BACK_BUTTON_EVENT
    };

    $rootScope.OnAppMenuButton = function() {
      //__APP_MENU_BUTTON_EVENT
    };

    $rootScope.OnAppViewChange = function() {
      //__APP_VIEW_CHANGE_EVENT
    };

    $rootScope.OnAppOrientation = function() {
      //__APP_ORIENTATION_EVENT
    };

    $rootScope.OnAppVolumeUpButton = function() {
      //__APP_VOLUME_UP_EVENT
    };

    $rootScope.OnAppVolumeDownButton = function() {
      //__APP_VOLUME_DOWN_EVENT
    };
    
    $rootScope.OnAppWebExtensionMsg = function() {
      //__APP_WEBEXTENSION_MSG_EVENT
    };    
  }
]);

angular.element(window.document).ready(function() {
  angular.bootstrap(window.document, ['AppModule']);
});

window.App.Ctrls.controller("CalculatorCtrl", ["$scope", "$rootScope", "$sce", "$interval", "$http", "$uibPosition", "blockUI",

function($scope, $rootScope, $sce, $interval, $http, $position, blockUI) {

$rootScope.Calculator = {};
$rootScope.Calculator.ABView = true;
$rootScope.App.CurrentView = "Calculator";

window.App.Calculator = {};
window.App.Calculator.Scope = $scope;

angular.element(window.document).ready(function(event){
angular.element(document.querySelector("body")).addClass($rootScope.App.Theme.toLowerCase());
});

$scope.Button1Click = function($event) {
$rootScope.Button1.Event = $event;

$scope.InsertNumber(7);

};

$scope.Button2Click = function($event) {
$rootScope.Button2.Event = $event;

$scope.InsertNumber(8);

};

$scope.Button3Click = function($event) {
$rootScope.Button3.Event = $event;

$scope.InsertNumber(9);

};

$scope.Button4Click = function($event) {
$rootScope.Button4.Event = $event;

$scope.InsertNumber(4);

};

$scope.Button5Click = function($event) {
$rootScope.Button5.Event = $event;

$scope.InsertNumber(5);

};

$scope.Button6Click = function($event) {
$rootScope.Button6.Event = $event;

$scope.InsertNumber(6);

};

$scope.Button7Click = function($event) {
$rootScope.Button7.Event = $event;

$scope.InsertNumber(1);

};

$scope.Button8Click = function($event) {
$rootScope.Button8.Event = $event;

$scope.InsertNumber(2);

};

$scope.Button9Click = function($event) {
$rootScope.Button9.Event = $event;

$scope.InsertNumber(3);

};

$scope.Button10Click = function($event) {
$rootScope.Button10.Event = $event;

$scope.InsertNumber(0);

};

$scope.Button11Click = function($event) {
$rootScope.Button11.Event = $event;

$rootScope.Pos = window.App.Utils.strSearch($rootScope.ResultInput.Value, "\\.");

if ($rootScope.Pos == -1) {

$scope.InsertNumber(".");

}

};

$scope.Button12Click = function($event) {
$rootScope.Button12.Event = $event;

if ($rootScope.ResultInput.Value != "") {

$rootScope.InputLen = window.App.Utils.strLen($rootScope.ResultInput.Value);

$rootScope.ResultInput.Value = window.App.Utils.subStr($rootScope.ResultInput.Value, 0, $rootScope.InputLen+-1);

}

if ($rootScope.ResultInput.Value == "") {

$scope.InitVariables();

$rootScope.ResultInput.Value = "0";

}

if (""+$rootScope.Operator+"" == "") {

$rootScope.FirstNumber = $rootScope.ResultInput.Value;

} else {

$rootScope.SecondNumber = $rootScope.ResultInput.Value;

}

};

$scope.Button13Click = function($event) {
$rootScope.Button13.Event = $event;

$scope.InitVariables();

$rootScope.ResultInput.Value = 0;

};

$scope.Button14Click = function($event) {
$rootScope.Button14.Event = $event;

$scope.SetOperator("+");

};

$scope.Button15Click = function($event) {
$rootScope.Button15.Event = $event;

$scope.Calculate();

};

$scope.Button16Click = function($event) {
$rootScope.Button16.Event = $event;

$scope.SetOperator("-");

};

$scope.Button17Click = function($event) {
$rootScope.Button17.Event = $event;

$scope.SetOperator("*");

};

$scope.Button18Click = function($event) {
$rootScope.Button18.Event = $event;

$scope.SetOperator("/");

};

$scope.Button19Click = function($event) {
$rootScope.Button19.Event = $event;

$scope.removeLocalOption("Historial");

$rootScope.HistoryTextarea.Value = "";

};

$scope.Button22Click = function($event) {
$rootScope.Button22.Event = $event;

$scope.replaceView("About");

};

}]);

window.App.Ctrls.controller("AboutCtrl", ["$scope", "$rootScope", "$sce", "$interval", "$http", "$uibPosition", "blockUI",

function($scope, $rootScope, $sce, $interval, $http, $position, blockUI) {

$rootScope.About = {};
$rootScope.About.ABView = true;
$rootScope.App.CurrentView = "About";

window.App.About = {};
window.App.About.Scope = $scope;

$scope.Button23Click = function($event) {
$rootScope.Button23.Event = $event;

$scope.replaceView("Calculator");

};

$scope.Button24Click = function($event) {
$rootScope.Button24.Event = $event;

$scope.replaceView("Comments");

};

$scope.ThemesSelectChange = function($event) {
$rootScope.ThemesSelect.Event = $event;

$scope.SaveAppTheme();

};

}]);

window.App.Ctrls.controller("CommentsCtrl", ["$scope", "$rootScope", "$sce", "$interval", "$http", "$uibPosition", "blockUI",

function($scope, $rootScope, $sce, $interval, $http, $position, blockUI) {

$rootScope.Comments = {};
$rootScope.Comments.ABView = true;
$rootScope.App.CurrentView = "Comments";

window.App.Comments = {};
window.App.Comments.Scope = $scope;

$scope.SendButtonClick = function($event) {
$rootScope.SendButton.Event = $event;

if(($rootScope.NameInput.Value == '') || ($rootScope.EmailInput.Value == '') || ($rootScope.CommentsTextarea.Value == '')) {

$scope.alertBox("Please, provide all the feedback information", "warning");

} else {

$rootScope.Progressbar.Hidden = "";

$rootScope.HttpClient.Request.data = {};

$rootScope.HttpClient.Request.data["name"] = $rootScope.NameInput.Value;

$rootScope.HttpClient.Request.data["email"] = $rootScope.EmailInput.Value;

$rootScope.HttpClient.Request.data["comments"] = $rootScope.CommentsTextarea.Value;


$rootScope.HttpClient.Execute();

}

};

$scope.CancelButtonClick = function($event) {
$rootScope.CancelButton.Event = $event;

$scope.replaceView("About");

};

$rootScope.HttpClient.Execute = function() {
  if ($rootScope.HttpClient.Transform == "json") {
    $rootScope.HttpClient.Request.transformRequest = function(data) {return JSON.stringify(data)};
  } else if ($rootScope.HttpClient.Transform == "data") {
    $rootScope.HttpClient.Request.transformRequest = function(data) {var frmData = new FormData(); angular.forEach(data, function(value, key) { frmData.append(key, value); }); return frmData;};
  }
  $http($rootScope.HttpClient.Request)
  .then(function(response) {
    $rootScope.HttpClient.Status = response.status;
    $rootScope.HttpClient.Response = response.data;
    $rootScope.HttpClient.StatusText = response.statusText;

$rootScope.Progressbar.Hidden = "true";

$scope.alert("Thanks!", "I will contact you if needed. Thanks again!");

$scope.replaceView("About");

  },
  function(response) {
    $rootScope.HttpClient.Status = response.status;
    $rootScope.HttpClient.Response = response.data;
    $rootScope.HttpClient.StatusText = response.statusText;

$rootScope.Progressbar.Hidden = "true";

if ($rootScope.HttpClient.Status == 406) {

$scope.alertBox("Please, be sure the feedback information is valid.", "warning");

} else if ($rootScope.HttpClient.Status == 500) {

$scope.alertBox("Sorry, a server error occur and the feedback cannot be send. Try again in a couple of minutes!", "warning");

} else {

$scope.alertBox("Sorry, an unknow error occur. Status: "+$rootScope.HttpClient.Status+" - Status text: "+$rootScope.HttpClient.StatusText+"", "warning");

}

document.getElementById("NameInput").focus();

  });
};

}]);
