class FileController{
    constructor($http, $stateParams, $window){
        'ngInject';

        this.$http = $http;
        this.$stateParams = $stateParams;
        this.$window = $window;
    }

    $onInit(){
        this.$http.get('api/files/' + this.$stateParams.link)
            .then((r) => {
                this.file = r.data.data[0];
            });

    }

    download(){

        this.$window.open('/files/' + this.file.link + '/download', 'Download');
    }
}

export const FileComponent = {
    templateUrl: './views/app/components/file/file.component.html',
    controller: FileController,
    controllerAs: 'vm',
    bindings: {}
}
