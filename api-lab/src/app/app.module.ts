import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { ReactiveFormsModule } from '@angular/forms';
import { Http, HttpModule, RequestOptions } from '@angular/http';
import { AuthHttp, AuthConfig } from 'angular2-jwt';

import { AppComponent } from './app.component';
import { Routing } from './app.routing';
import { AuthGuard } from './_guard/index';

import { AuthenticationComponent } from './authentication/authentication.component';
import { AuthenticationService } from './authentication/authentication.service';
import { HomepageComponent } from './homepage/homepage.component';

export function authHttpServiceFactory(http: Http, options: RequestOptions) {
    return new AuthHttp( new AuthConfig({}), http, options);
}

@NgModule({
     declarations: [
         AppComponent,
         AuthenticationComponent,
         HomepageComponent
     ],
     imports: [
         BrowserModule,
         ReactiveFormsModule,
         HttpModule,
         Routing
     ],
     providers: [
     {
         provide: AuthHttp,
         useFactory: authHttpServiceFactory,
         deps: [ Http, RequestOptions ]
     },
         AuthGuard,
         AuthenticationService
     ],
     bootstrap: [AppComponent]
})
export class AppModule { }