mainApp.controller("projectController", function ($scope, $http) {

    var api = 'http://localhost:8001/';

    /**
     * Retrieves projects
     */
    $http.get(api + 'project?with=authors').success(function (response) {
        $scope.projects = response.data.data;
        $scope.convertCreatedAtToDate();
    });


    /**
     * Duplicates project
     *
     * @param project
     */
    $scope.duplicate = function (project) {
        $http.post(api + 'project', project).success(function (response) {
            $http.get(api + 'project?with=authors').success(function (response) {
                $scope.projects = response.data.data;
                $scope.convertCreatedAtToDate();
            });
        });
    };

    /**
     * Converts created_at date string to date object
     */
    $scope.convertCreatedAtToDate = function () {
        $scope.projects.filter(function (p) {
            p.created_at = Date.parse(p.created_at);
            return p;
        });
    };

});