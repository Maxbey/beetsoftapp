import {DashboardComponent} from './app/components/dashboard/dashboard.component';
import {UploadFormComponent} from './app/components/upload-form/upload-form.component';
import {LoginFormComponent} from './app/components/login-form/login-form.component';
import {RegisterFormComponent} from './app/components/register-form/register-form.component';

angular.module('app.components')
	.component('dashboard', DashboardComponent)
	.component('uploadForm', UploadFormComponent)
	.component('loginForm', LoginFormComponent)
	.component('registerForm', RegisterFormComponent);

