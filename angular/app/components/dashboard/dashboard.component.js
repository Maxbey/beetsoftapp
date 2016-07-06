class DashboardController{
    constructor($http, $window, $state, ToastService){
        'ngInject';

        this.$http = $http;
        this.$window = $window;
        this.$state = $state;
        this.ToastService = ToastService;
    }

    $onInit(){
        this.$http.post('api/im/files', {}).then((r) => {
            this.filesData = r.data.data;
        });
    }

    download(file){

        this.$window.open('/files/' + file.link + '/download', 'Download');
    }

    go(file){
        this.$state.go('app.file_page', {link: file.link});
    }

    deleteFile(file){
        this.$http.delete('api/files/' + file.id).then(() => {
            this.filesData.splice(this.filesData.indexOf(file), 1);
            this.ToastService.show('File successfully deleted');
        });
    }

}

export const DashboardComponent = {
    templateUrl: './views/app/components/dashboard/dashboard.component.html',
    controller: DashboardController,
    controllerAs: 'vm',
    bindings: {}
};
