<!doctype html>
<html ng-app="plunker">
  <head>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.0.8/angular.js"></script>
    <script src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.6.0.js"></script>
    <script src="js/app-vendas.js"></script>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
  </head>
  <body>

<div class='container-fluid' ng-controller="TypeaheadCtrl">
    <pre>Model: {{selected.abbreviation| json}}</pre>
    <input type="text" ng-model="selected" value="{{selected.abbreviation}}" typeahead="state as state.name for state in states | filter:$viewValue | limitTo:8">
</div>
 
 {{$scope.states}}
  </body>
</html>
