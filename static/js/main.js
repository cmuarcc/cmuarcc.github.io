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
            major: "Information Systems",
            year: "2016",
            pic: "../images/members/annie.jpg",
            description: "I'm a SoCal girl who enjoys cooking, gaming, reading manga, cosplaying, and helping others. I love hanging out with my ARCC family!"
        },
        {
            name: "Louise Zhou",
            position: "Vice President",
            major: " Business Administration",
            year: "2017",
            pic: "../images/members/louise.jpg",
            description: "Louise is from NorCal and believes firmly in Pearl Milk Tea, not Boba, not Bubble Tea. Louise enjoys eating pumpkin pie, watching dramas/anime, reading manga, and listening to k-pop. She is married to EXO's Kai."       
        },
        {
            name: "Lucy Tai",
            position: "Secretary",
            major: "Statistics",
            year: "2017",
            pic: "../images/members/2.png",
            description: ""       
        },
        {
            name: "Michelle Ma",
            position: "Treasurer",
            major: "",
            year: "",
            pic: "../images/members/michellem.jpg",
            description: ""       
        },
        {
            name: "Timothy Gao",
            position: "ONiB Coordinator",
            major: "Neuroscience/Pre-Med",
            year: "2017",
            pic: "../images/members/tim.jpg",
            description: "I love making people laugh because everyone's life is hard enough. Costco is life because they offer the best selection of USDA certified beef. I fangirl about princess movies and basketball. #knickstape"       
        },
        {
            name: "Mercy Soong",
            position: "Performance Chair",
            major: "",
            year: "",
            pic: "../images/members/2.png",
            description: ""       
        },
        {
            name: "Rundong (Andy) Jiang",
            position: "Culture Chair",
            major: "BME",
            year: "2018",
            pic: "../images/members/2.png",
            description: ""       
        },
        {
            name: "Alicia Wu",
            position: "PR Chair",
            major: "Chemistry",
            year: "2017",
            pic: "../images/members/2.png",
            description: ""      
        },
        {
            name: "Clara Kim",
            position: "Design Chair",
            major: "Information Systems",
            year: "2017",
            pic: "../images/members/2.png",
            description: ""       
        },
        {
            name: "Crystal Hou",
            position: "Design Chair",
            major: "Business/Statistics",
            year: "2017",
            pic: "../images/members/crystal.jpg",
            description: ""       
        },
        {
            name: "Elizabeth Zeng",
            position: "Historian",
            major: "",
            year: "",
            pic: "../images/members/2.png",
            description: ""       
        },
        {
            name: "Ivan Wang",
            position: "Webmaster",
            major: "Computer Science",
            year: "2016",
            pic: "../images/members/ivan.jpg",
            description: "Honest and trustable, I joined ARCC to bond with others; indeed, my sincerity is rivaled only by my camaraderie. When not cooperating in a friendly game of Resistance, I enjoy (deceit-free) board games, as well as coding, music, and game design."       
        },
	   {
            name: "Michelle Wong",
            position: "Board Member",
            major: "Business Administration",
            year: "2016",
            pic: "../images/members/michelle.jpg",
            description: ""
        },
	   {
            name: "Anny Ni",
            position: "Board Member",
            major: "ECE",
            year: "2016",
            pic: "../images/members/anny.jpg",
            description: "I love going on the interwebz! I have a strange addiction to watching gamers on Youtube and I also enjoy reading manga/watching anime. Red pandas are amazing."
        },
	   {
            name: "Calvin Chan",
            position: "Board Member",
            major: "",
            year: "",
            pic: "../images/members/calvin.jpg",
            description: ""
        },
	   {
            name: "Maggie Li",                                                                                                                                                                                 
            position: "Board Member",                                                                                                                                                                 
            major: "Information Systems",
            year: "2016",
            pic: "../images/members/maggie.jpg",
            description: ""
        },
        {
            name: "Weikun Liang",                                                                                                                                                                                 
            position: "Board Member",                                                                                                                                                                 
            major: "Information Systems",
            year: "2016",
            pic: "../images/members/weikun.jpg",
            description: ""
        },
        {
            name: "Jamie Zhan",                                                                                                                                                                                 
            position: "Board Member",                                                                                                                                                                 
            major: "Biology/Pre-Med",
            year: "2016",
            pic: "../images/members/jamie.jpg",
            description: "I got into acting because I couldn't play the piano. Oh and I'm from New York."
        },
        {
            name: "Jessica Yang",                                                                                                                                                                                 
            position: "Board Member",                                                                                                                                                                 
            major: "Music/Flute Performance",
            year: "2016",
            pic: "../images/members/jessica.jpg",
            description: "I was born in Beijing and lived most of my life in the Greater Boston Area. Aside from music, I enjoy reading romance novels, baking sweet treats, shopping, and spending time with the ARCC Family!"
        },
        {
            name: "Justin Chiu",                                                                                                                                                                                 
            position: "Board Member",                                                                                                                                                                 
            major: "Language Technology",
            year: "Doctoral",
            pic: "../images/members/justin.jpg",
            description: ""
        },
        {
            name: "Nathan Love",                                                                                                                                                                                 
            position: "Board Member",                                                                                                                                                                 
            major: "ECE",
            year: "2016",
            pic: "../images/members/nathan.jpg",
            description: ""
        },
        {
            name: "Michael Fu",                                                                                                                                                                                 
            position: "Board Member",                                                                                                                                                                 
            major: "Mat Sci & Engineering",
            year: "Masters",
            pic: "../images/members/michael.jpg",
            description: ""
        },
        {
            name: "David Lu",                                                                                                                                                                                 
            position: "Board Member",                                                                                                                                                                 
            major: "Computer Science",
            year: "2016",
            pic: "../images/members/david.jpg",
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
