var nodelleApp = angular.module('nodelleApp', ['nodelle', 'ngDragDrop']);

nodelleApp.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('{%').endSymbol('%}');
});