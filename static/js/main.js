/**
 * AngularJS Tutorial 1
 * @author Nick Kaye <nick.c.kaye@gmail.com>
 */

/**
 * Main AngularJS Web Application
 */
var app = angular.module('cmuARCCWebsite', [
  'ngRoute'
]);

/**
 * Configure the Routes
 */
app.config(['$routeProvider', function ($routeProvider) {
  $routeProvider
    // Home
    .when("/", {templateUrl: "static/partials/home.html", controller: "PageCtrl"})
    // Pages
    .when("/members", {templateUrl: "static/partials/members.html", controller: "MemberCtrl"})
    .when("/events", {templateUrl: "static/partials/events.html", controller: "PageCtrl"})
    .when("/about", {templateUrl: "static/partials/about.html", controller: "PageCtrl"})

    .otherwise("/", {templateUrl: "partials/home.html", controller: "PageCtrl"});
}]);

/**
 * Controls the Blog
 */
app.controller('BlogCtrl', function (/* $scope, $location, $http */) {
  console.log("Blog Controller reporting for duty.");
});

/**
 * Controls the Member Profile Population
 */

app.controller('MemberCtrl', function (/* $scope, $location, $http */) {
  console.log("Member Controlller reporting for duty.");

  // Activates the Carousel
  $('.carousel').carousel({
    interval: 5000
  });

  // Activates Tooltips for Social Links
  $('.tooltip-social').tooltip({
    selector: "a[data-toggle=tooltip]"
  });

  this.members = [
        {
            name: "Annie Chen",
            position: "President",
            major_year: "Information Systems '16",
            description: "I'm a SoCal girl who enjoys cooking, gaming, reading manga, cosplaying, and helping others. I love hanging out with my ARCC family! &#9829;"
        },
        {
            name: "Louise Zhou",
            position: "Vice President",
            major_year: " Business Administration '17",
            description: "Louise is from NorCal and believes firmly in Pearl Milk Tea, not Boba, not Bubble Tea. Louise enjoys eating pumpkin pie, watching dramas/anime, reading manga, and listening to k-pop. She is married to EXO's Kai."       
        },
        {
            name: "Lucy Tai",
            position: "Secretary",
            major_year: "",
            description: ""       
        },
        {
            name: "Michelle Ma",
            position: "Treasurer",
            major_year: "",
            description: ""       
        },
        {
            name: "Timothy Gao",
            position: "ONiB Coordinator",
            major_year: "",
            description: ""       
        },
        {
            name: "Mercy Soong",
            position: "Performance Chair",
            description: ""       
        },
        {
            name: "Rundong Jiang",
            position: "Culture Chair",
            major_year: "",
            description: ""       
        },
        {
            name: "Alicia Wu",
            position: "PR Chair",
            major_year: "",
            description: ""      
        },
        {
            name: "Clara Kim",
            position: "Design Chair",
            major_year: "",
            description: ""       
        },
        {
            name: "Crystal Hou",
            position: "Design Chair",
            major_year: "",
            description: ""       
        },
        {
            name: "Elizabeth Zeng",
            position: "Historian",
            major_year: "",
            description: ""       
        },
        {
            name: "Ivan Wang",
            position: "Webmaster ",
            major_year: "",
            description: ""       
        }
    ];

});

/**
 * Controls all other Pages
 */
app.controller('PageCtrl', function (/* $scope, $location, $http */) {
  console.log("Page Controller reporting for duty.");

  // Activates the Carousel
  $('.carousel').carousel({
    interval: 5000
  });

  // Activates Tooltips for Social Links
  $('.tooltip-social').tooltip({
    selector: "a[data-toggle=tooltip]"
  })
});
