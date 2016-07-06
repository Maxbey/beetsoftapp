class FileController{
    constructor($http, $state){
        'ngInject';

        this.$http = $http;
        this.$state = $state;
    }

    $onInit(){


    }
}

export const FileComponent = {
    templateUrl: './views/app/components/file/file.component.html',
    controller: FileController,
    controllerAs: 'vm',
    bindings: {}
}
