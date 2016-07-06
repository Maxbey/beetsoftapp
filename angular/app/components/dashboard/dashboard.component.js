class DashboardController{
    constructor($http, $window){
        'ngInject';

        this.$http = $http;
        this.$window = $window;
    }

    $onInit(){
        this.$http.post('api/im/files', {}).then((r) => {
            this.filesData = r.data.data;
        });
    }

    download(file){

        this.$window.open('/files/' + file.link + '/download', 'Download');
    }
}

export const DashboardComponent = {
    templateUrl: './views/app/components/dashboard/dashboard.component.html',
    controller: DashboardController,
    controllerAs: 'vm',
    bindings: {}
};
