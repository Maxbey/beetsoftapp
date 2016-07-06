class UploadFormController {
    constructor(ToastService, $window) {
        'ngInject'

        this.ToastService = ToastService;
        this.$window = $window;
    }

    $onInit() {
        this.dropzoneConfig = {
            parallelUploads: 10,
            maxFileSize: 10,
            url: 'api/files',
            headers: {
                Authorization: 'Bearer ' + this.$window.localStorage.satellizer_token
            }
        };
    }

    dzAddedFile(file) {
        //this.ToastService.show('File successfully uploaded');
    };

    dzError(file, errorMessage) {
        //this.ToastService.show('Error on uploading');
    };

}

export const UploadFormComponent = {
    templateUrl: './views/app/components/upload-form/upload-form.component.html',
    controller: UploadFormController,
    controllerAs: 'vm',
    bindings: {}
};
